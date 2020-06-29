<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        
        //REQUIRES\\
        require_once(APPPATH . 'libraries/model/UsuarioModel.php');
        require_once(APPPATH . 'libraries/model/SenhaModel.php');
        
        //LOADS\\
        $this->load->model('UserDAO', 'userDAO');
        $this->load->model('dao/UsuarioDAO', 'usuarioDAO');
        $this->load->model('dao/SenhaDAO', 'senhaDAO');

        $this->load->library('Util', 'util');
    }

    public function index(){
        if($this->session->userdata("logged")){
            redirect('user/profile');
        }else{
            redirect('profile');
        }
    }
    /*
    |--------------------------------------------------------------------------
    | View
    |--------------------------------------------------------------------------
    | Todas as funções que chamam view`s
    */
        public function login(){
            if(!$this->session->userdata("logged")){
                $content = array(
                    "styles" => array("form.css"),
                    "scripts" => array("login.js", "form.js")
                );
                $this->template->show('login.php', $content);
            }else{
                redirect('user');
            }
        }
        public function register(){
            if(!$this->session->userdata("logged")){
                $content = array(
                    "styles" => array("form.css"),
                    "scripts" => array("form.js", "register.js")
                );
                $this->template->show('register.php', $content);
            }else{
                redirect('user');
            }
        }
        public function forgot_password(){
            if($this->session->userdata("logged")){
                $this->template->show('profile.php');
            }else{
                $content = array(
                    "styles" => array("form.css"),
                    "scripts" => array("form.js", "passwordForgot.js")
                );
                $this->template->show('password_send_email.php', $content);
            }
        }
        public function password_reset(){
            if($this->session->userdata("logged")){
                $this->session->sess_destroy();
            }
            $content = array(
                "styles" => array("form.css"),
                "scripts" => array("form.js", "passwordReset.js")
            );
            $this->template->show('password_reset.php', $content);
        }
    /*
    |--------------------------------------------------------------------------
    | AJAX
    |--------------------------------------------------------------------------
    | Requisicoes Ajax
    */
        /**
         * Requisição para efetuar o login
         * deve ser ajax
         * @param ajax
         * @param form
         * @return boolean
         * @return error_type
         */
        public function ajaxLogin(){
            /*if (!$this->input->is_ajax_request()) {
            exit("Nenhum acesso de script direto permitido!");
            }*/

            $inputArray = array(
                "usuario" => $this->input->post("usuario"),
                "senha" => $this->input->post("senha")
            );

            $response = $this->userLogin($inputArray);
            echo json_encode($response);
        }
    /*
    |--------------------------------------------------------------------------
    | Private
    |--------------------------------------------------------------------------
    | Funções da classe
    */
        /**
         * Função login da aplicação
         * valida as informações necessárias para iniciar uma
         * sessão
         * @param array
         * @return true
         * @return array $string[error_type]
         */
        private function userLogin($input = array()){
            //verificar se existe valor nao preenchido
            $hasEmpty = $this->util->checkInputEmpty($input);   //deve retornar FALSE
                
            if($hasEmpty){
                $hasEmpty["error_type"] = "empty";
                return $hasEmpty;
            }

            //verificar se o usuário existe
            $options = array(
                'select' => array(
                    'id'
                ),
                'where' => array(
                    'ra' => $input['usuario']
                ),
            );
            $userExist = $this->usuarioDAO->getUser($options);
            if($userExist){
                $userId = $userExist->getId();
                //verificar senha
                $userPassword = $this->senhaDAO->getPassword($userId);
                $userAuth = password_verify($input["senha"], $userPassword->getSenha());
                
            }
            if(!$userExist || !$userAuth){
                $result["error_list"] = array();
                foreach($input as $key => $value){
                    array_push($result["error_list"], $key);
                }
                $result["error_type"] = "validation";
                
                return $result;
            }
            $input = null;
            
            //Select userdata
            $options = array(
                'where' => array(
                    'id' => $userId
                    )
                );
                $userData = $this->usuarioDAO->getUser($options);
                
            if(!$userData){
                $response = array();
                $response["error_type"] = "database";
                return $response;
            }
            
            $result = $this->startSession($userData);
            
            return $result;
        }
    
    /*
    |--------------------------------------------------------------------------
    | Sessão
    |--------------------------------------------------------------------------
    | Todas as funções relacionadas a sessão do usuário
    */
    private function startSession($userData, $thirdData = array()){  
                
        $this->session->set_userdata("logged", true);
        $this->session->set_userdata("id", $userData->getId());
        $this->session->set_userdata("ra", $userData->getRa());
        $this->session->set_userdata("nome", $userData->getNome());
        $this->session->set_userdata("sobrenome", $userData->getSobrenome());
        $this->session->set_userdata("email", $userData->getEmail());
        $this->session->set_userdata("thirdData", $thirdData);
        return true;
    }
    public function endSession(){
        $this->session->sess_destroy();
        redirect('user');
    }
}