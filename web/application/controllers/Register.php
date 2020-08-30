<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller{
    
    public function __construct(){
        parent::__construct();

        //REQUIRES\\
        require_once(APPPATH . 'libraries/model/UsuarioModel.php');
        require_once(APPPATH . 'libraries/model/SexoModel.php');
        require_once(APPPATH . 'libraries/model/SenhaModel.php');
        
        //LOADS\\
        $this->load->model('dao/UsuarioDAO', 'usuarioDAO');
        $this->load->model('dao/SexoDAO', 'sexoDAO');
        $this->load->model('dao/SenhaDAO', 'senhaDAO');

        $this->load->library('Util', 'util');
    }

    public function index(){
        if(!$this->session->userdata("logged")){
            $this->loadPage();
        }else{
            redirect('user');
        }
    }
    /*
    |--------------------------------------------------------------------------
    | Private
    |--------------------------------------------------------------------------
    | Funções da classe
    */
        /**
         * Carregar o conteúdo específico da página
         * @param null
         * @return View
         */
        private function loadPage(){
            if(!$this->session->userdata("logged")){
                //no campo "genero" do formulario
                $generos = $this->sexoDAO->carregarGeneros();
                $content = array(
                    "styles" => array("form.css"),
                    "scripts" => array("form.js", "register.js"),
                    "generos" => $generos,
                );

                $this->template->show('register.php', $content);

            }else{
                redirect('index');
            }
        }

        /**
         * Função registra um novo usuario e
         * valida as informações necessárias para cadastrar um novo usuário
         * @param array
         * @return true
         * @return array $string[error_type]
         */
        private function userRegister($input = array()){
            
            //empty
            $hasEmpty = $this->util->checkInputEmpty($input);   //deve retornar FALSE    
            if($hasEmpty){
                $hasEmpty["error_type"] = "empty";
                return $hasEmpty;
            }

            //email
            $input["email"] = filter_var($input["email"], FILTER_SANITIZE_EMAIL);
            $options = array(
                'select' => array(
                    'id'
                ),
                'where' => array(
                    'email' => $input['email']
                ),
            );
            $userExist = $this->usuarioDAO->getUser($options);

            if(!filter_var($input["email"], FILTER_VALIDATE_EMAIL) || $userExist){
                $response = array("error_type" => "email", "error_list" => array("email"));
                return $response;
            }

            //ra
            $pattern = '/^[0-9]*$/';

            $validRa = $this->util->validateInputRegex($pattern, array("ra"=>$input["ra"]));
            if(!$validRa){
                $validRa["error_type"] = "user_invalid";
                $validRa["error_list"] = array("ra");
                return $validRa;
            }
            $options = array(
                'select' => array(
                    'id'
                ),
                'where' => array(
                    'ra' => $input['ra']
                ),
            );
            $userExist = $this->usuarioDAO->getUser($options);
            if($userExist){
                $validRa["error_type"] = "user_exist";
                $validRa["error_list"] = array("ra");
                return $validRa;
            }

            //nome e sobrenome
            $pattern = '/[^a-zA-Z ]/';
            $invalidName = $this->util->validateInputRegex($pattern, array("nome"=>$input["nome"], "sobrenome"=>$input["sobrenome"]));
            if($invalidName){
                $invalidName["error_type"] = "name";
                return $invalidName;
            }

            //sexo
            $sexoModel = $this->sexoDAO->getSexo(array("where" => array("nome" => $input["sexo"])));
            if(!$sexoModel){
                $validSex["error_type"] = "invalid_sex";
                $validSex["error_list"] = array("ra");
                return $validSex;
            }
            //cadastrar
            $usuario = new UsuarioModel();

            $usuario->setRA($input["ra"]);
            $usuario->setEmail($input["email"]);
            $usuario->setNome($input["nome"]);
            $usuario->setSexo($sexoModel->getId());
            $usuario->setSobrenome($input["sobrenome"]);
            
            $result = $this->usuarioDAO->addUser(array('usuarioModel' => $usuario));
            
            if(!$result){
                $response = array();
                $response["error_type"] = "database";
                return $response;
            }
        
            return $result;
        }

        /**
         * Funcao insertPassword
         * insere uma senha para o usuário
         * @param array
         * @return bool
         */
        private function insertPassword($userId, $input){
            //senha
            if($input["senha"] == $input["senhaConfirma"]){
                $senhaHash = password_hash($input["senha"], PASSWORD_DEFAULT);
                $input["senha"] = null;
                $input["senhaConfirma"] = null;
            }else{
                $response["error_type"] = "password";
                $response["error_list"] = array("senha", "senhaConfirma");
                $where = array(
                    'id' => $userId
                );
                $options = array(
                    'where' => $where
                );
                $this->usuarioDAO->removeUser($options);
                return $response;
            }
            
            if(!$this->senhaDAO->addPassword($userId, $senhaHash)){
                $where = array(
                    'id' => $userId
                );
                $options = array(
                    'where' => $where
                );
                $this->usuarioDAO->removeUser($options);
                
                $response = array();
                $response["error_type"] = "database";
                return $response;
            }

            return true;
        }
    /*
    |--------------------------------------------------------------------------
    | AJAX
    |--------------------------------------------------------------------------
    | Requisicoes Ajax
    */
        /**
         * Requisição para efetuar o cadastro
         * deve ser ajax
         * @param ajax
         * @param form
         * @return boolean
         * @return error_type
         */
        public function ajaxRegister(){
            if (!$this->input->is_ajax_request()) {
                exit("Nenhum acesso de script direto permitido!");
            }

            $userInput = array(
                "email" => $this->input->post("email"),
                "ra" => $this->input->post("ra"),
                "nome" => $this->input->post("nome"),
                "sobrenome" => $this->input->post("sobrenome"),
                "sexo" => $this->input->post("sexo"),
            );
            $passwordInput = array(
                "senha" => $this->input->post("senha"),
                "senhaConfirma" => $this->input->post("senhaConfirma"),
            );

            $response = $this->userRegister($userInput);

            if(is_int($response)){
                $response = $this->insertPassword($response, $passwordInput);
            }

            echo json_encode($response);
        }
}