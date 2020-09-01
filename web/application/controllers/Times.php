<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Times extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        //REQUIRES\\
        require_once(APPPATH . 'libraries/model/ModalidadeModel.php');
        require_once(APPPATH . 'libraries/model/TimeModel.php');

        //LOADS\\
        $this->load->model('dao/ModalidadeDAO', 'modalidadeDAO');
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

            $timeOptions = array(
                'where' => array(
                    'id' => $timeId
                ),
                'return' => 'row'
            );

            //verificar se o time existe
            $time = $this->timeDAO->getTime($timeOptions);
            if(!$time) {$this->template->show('errors/custom/error_message', array('mensagem' => 'Time não encontrado')); return false;}
            
            //verificar se o usuário logado é o admin do time
            $isAdmin = false;
            if($this->session->userdata('logged')){
                $time['usuarioId'] == $this->session->userdata('id') ? $isAdmin = true : $isAdmin = false;
            }

            //carregar view passando o conteudo gerado
            $content = array(
                'time' => $time,
                'isAdmin' => $isAdmin,
            );
            $this->template->show('time.php', $content);
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
}