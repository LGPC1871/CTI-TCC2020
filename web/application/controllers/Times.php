<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Times extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        //REQUIRES\\
        require_once(APPPATH . 'libraries/model/ModalidadeModel.php');
        require_once(APPPATH . 'libraries/model/TimeModel.php');
        require_once(APPPATH . 'libraries/model/UsuarioTimeModel.php');

        //LOADS\\
        $this->load->model('dao/ModalidadeDAO', 'modalidadeDAO');
        $this->load->model('dao/UsuarioTimeDAO', 'usuarioTimeDAO');
        $this->load->model('dao/TimeDAO', 'timeDAO');

        $this->load->library('Util', 'util');
    }
    /*
    |--------------------------------------------------------------------------
    | View
    |--------------------------------------------------------------------------
    | Funções da classe que chamam views
    */
        /**
         * Exibe a view de criar um time
         * @return View
         */
        public function exibirFormCriarTime(){
            if(!$this->session->userdata("logged")) redirect('user/login');

            $options = array(
                'select' => array('id', 'nome'),
                'return' => 'multiple',
            );

            $modalidades = $this->modalidadeDAO->getModalidades($options);

            $content = array(
                'modalidades' => $modalidades,
                'styles' => array('form.css'),
                'scripts' => array('criarTime.js', 'form.js'),
            );

            $this->template->show("cadastrar_time.php", $content);
        }

        /**
         * Exibe a view do time
         * faz a verificacao do usuario, se for o criador do time, exibe
         * o restrict
         * @param GET
         * @
         */
        public function exibirTime(){
            $timeId = $this->input->get('id');
            if(!$timeId) redirect('home');

            //verificar se o time existe
            $timeOptions = array(
                'where' => array(
                    'id' => $timeId
                ),
                'return' => 'row'
            );
            $time = $this->timeDAO->getTime($timeOptions);
            if(!$time) {$this->template->show('errors/custom/error_message', array('mensagem' => 'Time não encontrado')); return false;}
            
            //recolher a modalidade do time
            $modalidadeOptions = array(
                'where' => array(
                    'id' => $time->getModalidadeId(),
                ),
                'return' => 'row',
            );
            $modalidade = $this->modalidadeDAO->getModalidades($modalidadeOptions);
            if(!$modalidade) {$this->template->show('errors/custom/error_message', array('mensagem' => 'Erro ao carregar')); return false;}
            
            //verificar se o usuário logado é o admin do time
            $isAdmin = false;
            if($this->session->userdata('logged')){
                $time->getUsuarioId() == $this->session->userdata('id') ? $isAdmin = true: null;
            }
            
            //recolher participantes do time
            $membros = $this->usuarioTimeDAO->getUsuariosTime($timeId);
            if(!$membros) {$this->template->show('errors/custom/error_message', array('mensagem' => 'Erro ao carregar')); return false;}

            //verificar se o usuario logado é jogador do time
            $isPlayer = false;
            if($this->session->userdata("logged")){
                foreach($membros as $membro){
                    if($membro->getColumn('id') == $this->session->userdata('id')){
                        $isPlayer = true;
                        break;
                    }
                }
            }

            //decidir privilegio
            // |admin| |membro| |visitante|
            $privilegio = "visitante";
            if($isAdmin) $privilegio = "admin";
            else if($isPlayer) $privilegio = "jogador";

            //carregar view passando o conteudo gerado
            $content = array(
                'time' => $time,
                'privilegio' => $privilegio,
                'modalidade' => $modalidade,
                'membros' => $membros,
                'scripts' => array('form.js'),
            );
            if($isAdmin)array_push($content['scripts'], 'timeConfig.js');
            $this->template->show('time.php', $content);
        }

        /**
         * Exibe a view dos times, contendo uma tabela
         * com todos os times cadastrados
         * @param null
         * @return View
         */
        public function exibirTimes(){
            $content = array(
                'times' => $this->timeDAO->getTimesTable(array('return' => 'multiple')),
                'scripts' => array('times.js'),
            );
            $this->template->show('times.php', $content);
        }

    /*
    |--------------------------------------------------------------------------
    | Private
    |--------------------------------------------------------------------------
    | Funções da classe
    */
        /**
         * Função novoTime
         * faz a verificação do novo time e insere no banco de dados
         * |invalid_name| = nome inválido, somente letras e numeros permitidos
         * |already_exist| = nome já está em uso
         * |invalid_modalidade| = modalidade inexistente
         * |database| = exibir erro genérico
         * @param array informacoes do time
         * @return array log de erro:
         */
        private function novoTime($inputArray){
            $response = array();
            
            //verificar nome, se já existe, etc...
            $pattern = '/[^ A-Za-z0-9]+/';
            $nome = $inputArray['nome'];
            if($this->util->validateInputRegex($pattern, array("nome" => $nome))){ $response['error_type'] = "invalid_name";return $response; }
            
            $options = array(
                'where' => array(
                    'nome' => $nome
                ),
                'return' => 'row'
            );

            if($this->timeDAO->getTime($options)) {$response['error_type'] = "already_exist"; return $response;}

            //verificar se modalidade é valida
            $options = array(
                'select' => array('id'),
                'like' => array(
                    'nome' => $inputArray['modalidade'],
                ),
                'return' => 'row'
            );
            $modalidadeId = $this->modalidadeDAO->getModalidades($options);
            
            if(!$modalidadeId) {$response['error_type'] = "invalid_modalidade"; return $response;}

            $usuarioId = $inputArray['usuario_id'];

            //criar model do time
            $novoTime = new TimeModel();
            $novoTime->setNome($nome);
            $novoTime->setModalidadeId($modalidadeId->getId());
            $novoTime->setUsuarioId($usuarioId);

            $input = array(
                'timeModel' => $novoTime
            );
            $timeId = $this->timeDAO->addTime($input);

            //adicionar na tabela usuario_time
            $usuarioTime = new UsuarioTimeModel();
            $usuarioTime->setUsuarioId($usuarioId);
            $usuarioTime->setTimeId($timeId);
            $usuarioTime->setAtivo(true);

            $usuarioTimeOptions = array(
                'UsuarioTimeModel' => $usuarioTime,
            );
            $this->usuarioTimeDAO->addUsuarioTime($usuarioTimeOptions);
            if(!$timeId){$response['error_type'] = "database"; return $response;}
            
            return $timeId;
        }

        /**
         * Funcao setTimeAvatar
         * faz upload da imagem no diretorio especificado
         */
        private function setTimeAvatar($timeId, $image){
            //echo var_dump("fui chamado");
            $result = array();
            if(!$this->session->userdata('logged')){
                $result['error_type'] = 'access';
                return $result;
            }
            $timeOptions = array(
                'return' => 'row',
                'select' => array(
                    'id',
                    'modalidade_id',
                    'usuario_id'
                ),
                'where' => array(
                    'id' => $timeId
                ),
            );
            $time = $this->timeDAO->getTime($timeOptions);
            if($this->session->userdata('id') != $time->getUsuarioId()){
                $result['error_type'] = 'access';
                return $result;
            }
            
            $modalidadeOptions = array(
                'return' => 'row',
                'select' => array(
                    'modalidade.nome'
                ),
                'where' => array(
                    'id' => $time->getModalidadeId()
                ),
            );
            $modalidade = $this->modalidadeDAO->getModalidades($modalidadeOptions);
            
            $userRa = $time->getUsuarioId();
            $userSubRa = substr($userRa, 0, 2);
            $dir = 'src/data/times/avatar/'. $modalidade->getNome(). "/" . $userSubRa;
            
            //verificar diretorio
            if(!is_dir($dir)){
                mkdir($dir, 0777, true);
            }
            
            //preparando classe upload
            $config['upload_path'] = $dir;
            $config['allowed_types'] = 'jpg|png';
            $config['file_name'] = $time->getId() . '.jpg';
            $config['overwrite'] = true;
            
            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('avatar'))  
            {  
                echo $this->upload->display_errors();  
            }  
            else  
            {  
                return true;
            } 
        }

        /**
         * Funcao setTimeNome
         * altera o nome do time
         * @param $input = array('nome', 'timeId')
         */
        private function setTimeNome($input){
            //echo var_dump("teste");
            $retorno = array(
                'error' => false,
            );
            if(!$this->session->userdata("logged")){
                $retorno['error'] = true;
                $retorno['error_type'] = "user_not_logged_in";
                return $retorno;
            }
            
            $novoNome = $input['nome'];
            $timeId = $input['timeId'];

            $timeOptions = array(
                "select" => array(
                    'id',
                    'usuario_id',
                ),
                "return" => "row",
                "where" => array(
                    'id' => $timeId,
                ),
            );
            $time = $this->timeDAO->getTime($timeOptions);

            if($time->getUsuarioId() != $this->session->userdata('id')){
                $retorno['error'] = true;
                $retorno['error_type'] = "access";
                return $retorno;
            }
            $alterTimeOptions = array(
                'where' => array(
                    'id' => $timeId,
                ),
                'values' => array(
                    'nome' => $novoNome,
                ),
            );
            $result = $this->timeDAO->alterTime($alterTimeOptions);
            if(!$result){
                $retorno['error'] = true;
                $retorno['error_type'] = "database";
                return $retorno;
            }

            return $retorno;
        }
    
    /*
    |--------------------------------------------------------------------------
    | AJAX
    |--------------------------------------------------------------------------
    | Requisicoes Ajax
    */

        /**
         * Novo time, essa requisicao da acesso a funcao
         * de criar um novo time
         * @param Ajax.serialize
         * @return JSON
         */
        public function ajaxNovoTime(){
            if (!$this->input->is_ajax_request() || !$this->session->userdata("logged")) exit("Nenhum acesso de script direto permitido");

            $inputArray = array(
                'nome' => $this->input->post('nome'),
                'usuario_id' => $this->session->userdata("id"),
                'modalidade' => $this->input->post('modalidade'),
            );
            $result = $this->novoTime($inputArray);

            echo json_encode($result);
        }

        /**
         * Alterar Avatar do time
         */
        public function ajaxAlterarAvatarTime(){
            if (!$this->input->is_ajax_request()) {
                exit("Nenhum acesso de script direto permitido!");
            }
            if(isset($_FILES["avatar"]["name"])){
                $timeId = $this->input->post("time_id");
                $result = $this->setTimeAvatar($timeId, $_FILES["avatar"]);
                echo var_dump($result);
            }else{
                $result = array(
                    "error_type" => "no_file"
                );                
            }
            echo json_encode($result);
        }
        /**
         * Alterar nome do time
         */
        public function ajaxAlterarNomeTime(){
            if (!$this->input->is_ajax_request()) {
                exit("Nenhum acesso de script direto permitido!");
            }
            $input = array(
                'timeId' => $this->input->post('time_id'),
                'nome' => $this->input->post("nome"),
            );

            $result = $this->setTimeNome($input);

            echo json_encode($result);
        }
}