<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        
        //REQUIRES\\
        require_once(APPPATH . 'libraries/model/UsuarioModel.php');
        require_once(APPPATH . 'libraries/model/SenhaModel.php');
        require_once(APPPATH . 'libraries/model/SenhaResetModel.php');
        
        //LOADS\\
        $this->load->model('UserDAO', 'userDAO');
        $this->load->model('dao/UsuarioDAO', 'usuarioDAO');
        $this->load->model('dao/SenhaDAO', 'senhaDAO');
        $this->load->model('dao/SenhaResetDAO', 'senhaResetDAO');

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
            if (!$this->input->is_ajax_request()) {
            exit("Nenhum acesso de script direto permitido!");
            }

            $inputArray = array(
                "usuario" => $this->input->post("usuario"),
                "senha" => $this->input->post("senha")
            );

            $response = $this->userLogin($inputArray);
            echo json_encode($response);
        }

        /**
         * Requisição para efetuar o cadastro
         * deve ser ajax
         * @param ajax
         * @param form
         * @return boolean
         * @return error_type
         */
        public function ajaxRegister(){
            /*if (!$this->input->is_ajax_request()) {
                exit("Nenhum acesso de script direto permitido!");
            }*/

            $inputArray = array(
                "email" => $this->input->post("email"),
                "usuario" => $this->input->post("usuario"),
                "nome" => $this->input->post("nome"),
                "sobrenome" => $this->input->post("sobrenome"),
                "senha" => $this->input->post("senha"),
                "senhaConfirma" => $this->input->post("senhaConfirma"),
            );

            $response = $this->userRegister($inputArray);

            echo json_encode($response);
        }

        /**
         * Requisição para enviar token de senha
         * deve ser ajax
         * @param ajax
         * @param form
         * @return boolean
         * @return error_type
         */
        public function ajaxPasswordForgot(){
            /*if (!$this->input->is_ajax_request()) {
                exit("Nenhum acesso de script direto permitido!");
            }*/

            $inputArray = array(
                "email" => $this->input->post("email"),
            );

            $response = $this->userPasswordForgot($inputArray);

            echo json_encode($response);
        }

        /**
         * Requisição para resetar a senha
         * deve ser ajax
         * @param ajax
         * @param form
         * @return boolean
         * @return error_type
         */
        public function ajaxPasswordReset(){
            /*if (!$this->input->is_ajax_request()) {
                exit("Nenhum acesso de script direto permitido!");
            }*/

            $inputArray = array(
                "senha" => $this->input->post("senha"),
                "confirma" => $this->input->post("confirma"),
                "selector" => $this->input->post("selector"),
                "validator" => $this->input->post("validator")
            );

            $response = $this->userPasswordReset($inputArray);

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
        
        /**
         * Função register da aplicação
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

            //usuario
            $pattern = '/^[0-9]*$/';

            $validRa = $this->util->validateInputRegex($pattern, array("usuario"=>$input["usuario"]));
            if(!$validRa){
                $validRa["error_type"] = "user_invalid";
                $validRa["error_list"] = array("usuario");
                return $validRa;
            }
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
                $validRa["error_type"] = "user_exist";
                $validRa["error_list"] = array("usuario");
                return $validRa;
            }

            //nome e sobrenome
            $pattern = '/[^a-zA-Z ]/';
            $invalidName = $this->util->validateInputRegex($pattern, array("nome"=>$input["nome"], "sobrenome"=>$input["sobrenome"]));
            if($invalidName){
                $invalidName["error_type"] = "name";
                return $invalidName;
            }

            //senha
            if($input["senha"] == $input["senhaConfirma"]){
                $senhaHash = password_hash($input["senha"], PASSWORD_DEFAULT);
                $input["senha"] = null;
                $input["senhaConfirma"] = null;
            }else{
                $response["error_type"] = "password";
                $response["error_list"] = array("senha", "senhaConfirma");
                return $response;
            }

            //cadastrar
            $usuario = new UsuarioModel();

            $usuario->setRA($input["usuario"]);
            $usuario->setEmail($input["email"]);
            $usuario->setNome($input["nome"]);
            $usuario->setSobrenome($input["sobrenome"]);
            
            $result = $this->usuarioDAO->addUser(array('usuarioModel' => $usuario));
            
            if(!$result){
                $response = array();
                $response["error_type"] = "database";
                return $response;
            }
            if(!$this->senhaDAO->addPassword($result, $senhaHash)){
                $where = array(
                    'id' => $result
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

        /**
         * Função PasswordForgot
         * Gera token para resetar a senha do usuário e
         * envia por email
         * @param Email
         * @return boolean
         */
        private function userPasswordForgot($input = array()){
            //empty
            $hasEmpty = $this->util->checkInputEmpty($input);   //deve retornar FALSE
                
            if($hasEmpty){
                $hasEmpty["error_type"] = "empty";
                return $hasEmpty;
            }

            //verificar existencia de usuário e senha
            $options = array(
                'select' => array('id'),
                'where' => array(
                    'email' => $input['email']
                )
            );
            $userIdModel = $this->usuarioDAO->getUser($options);
            $userId = $userIdModel->getId();
            $userHasPassword = $this->senhaDAO->getPassword($userId);
            if(!$userId || !$userHasPassword){
                return true;
            }

            //recolher userdata
            $options = array(
                'where' => array(
                    'id' => $userId
                )
            );
            $usuario = $this->usuarioDAO->getUser($options);

            //apagar tokens antigos
            $this->senhaResetDAO->removeToken($userId);

            //gerar token
            $selector = bin2hex(random_bytes(8));
            $token = random_bytes(32);
            $tokenHash = password_hash($token, PASSWORD_DEFAULT);
            $expires = date("U") + 1800;
            $url = base_url() . 'user/password_reset?selector=' . $selector . '&validator=' .bin2hex($token);

            $newToken = new SenhaResetModel();
            $newToken->setUsuarioId($userId);
            $newToken->setSelector($selector);
            $newToken->setToken($tokenHash);
            $newToken->setExpire($expires);

            $insert = array('senhaResetModel' => $newToken);

            if(!$this->senhaResetDAO->addToken($insert)) return false;

            //enviar email
            /* SUBSTITUIR POR VIEW */
            $htmlContent = '<h1>Redefinir Senha</h1>';
            $htmlContent .= '<p>Olá '. $usuario->getNome() . " " . $usuario->getSobrenome() .'</p>';
            $htmlContent .= '<p>usuário:'. $usuario->getRa() .'</p>';
            $htmlContent .= '<p>Para redefinir sua senha <a href="' . $url . '">clique aqui</a></p>';
            
            $this->email->from($this->config->item('smtp_user'), 'COTIL Jogos');
            $this->email->to($usuario->getEmail());

            $this->email->subject('Redefinir Senha');
            $this->email->message($htmlContent);    

            $result = $this->email->send();

            return $result;
        }

        /**
         * Função PasswordReset
         * verifica token e reseta a senha do usuário
         * envia por email
         * @param Email
         * @return boolean
         */

        private function userPasswordReset($input = array()){
            //empty
            $hasEmpty = $this->util->checkInputEmpty($input);   //deve retornar FALSE
                
            if($hasEmpty){
                $hasEmpty["error_type"] = "empty";
                return $hasEmpty;
            }
            //input check
            if($input["senha"] != $input["confirma"]){
                $response["error_type"] = "senha";
                return $response;
            }

            //get senhaReset
            $senhaReset = $this->senhaResetDAO->getSenhaReset($input['selector']);
            if(!$senhaReset) return false;
            $time = date("U");

            //validate token
            if($time > $senhaReset->getExpire()){
                $response["error_type"] = "validation";
                return $response;
            }
            
            $token = hex2bin($input["validator"]);

            if(!password_verify($token, $senhaReset->getToken())){
                $response["error_type"] = "validation";
                return $response;
            }
            
            $newPassword = password_hash($input["senha"], PASSWORD_DEFAULT);

            $result = $this->senhaDAO->updatePassword($newPassword, $senhaReset->getUsuarioId());
            if(!$result)return false;
            return true;
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