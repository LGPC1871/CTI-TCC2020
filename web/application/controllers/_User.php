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
        $this->load->library('session');

    }

    public function index(){
        if($this->session->userdata("logged") == true){
            redirect('user/profile');
        }else{
            redirect('user/login');
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
        public function profile(){
            if($this->session->userdata("logged")){
                $this->template->show('profile.php');
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

        public function ajaxRegister(){
            if (!$this->input->is_ajax_request()) {
                exit("Nenhum acesso de script direto permitido!");
            }

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

        public function ajaxPasswordForgot(){
            if (!$this->input->is_ajax_request()) {
                exit("Nenhum acesso de script direto permitido!");
            }

            $inputArray = array(
                "email" => $this->input->post("email"),
            );

            $response = $this->passwordForgot($inputArray);

            echo json_encode($response);
        }

        public function ajaxPasswordReset(){
            if (!$this->input->is_ajax_request()) {
                exit("Nenhum acesso de script direto permitido!");
            }

            $inputArray = array(
                "senha" => $this->input->post("senha"),
                "confirma" => $this->input->post("confirma")
            );
            $tokenData = array(
                "selector" => $this->input->post("selector"),
                "validator" => $this->input->post("validator")
            );

            $response = $this->passwordReset($inputArray, $tokenData);

            echo json_encode($response);
        }

    /*
    |--------------------------------------------------------------------------
    | Private
    |--------------------------------------------------------------------------
    | Funções private
    */

        private function checkInputEmpty($inputArray = array()){
            $status = true;
            $resultArray = array("error_list" => array());
            foreach($inputArray as $key => $value){
                if(empty($value) || ctype_space($value)){
                    $status = false;
                    array_push($resultArray["error_list"], $key);
                }
            }
            return $status ? false : $resultArray;
        }

        private function validatePassword($userId, $password){
            $userPassword = $this->userDAO->selectPassword($userId);

            if(!$userPassword){
                return false;
            }

            return password_verify($password, $userPassword);
        }

        private function validateInputRegex($pattern, $inputArray = array()){

            $status = true;
            $resultArray = array("error_list" => array());
            
            foreach($inputArray as $key => $value){
                if(preg_match($pattern, $value)){
                    $status = false;
                    array_push($resultArray["error_list"], $key);
                }
            }
            return $status ? false : $resultArray;
        }

    /*
    |--------------------------------------------------------------------------
    | Login
    |--------------------------------------------------------------------------
    | Funções de login próprio
    */
        private function _userLogin($inputInfo = array()){
            /*
            | Retorno
            | empty, validation, database
            */
            /* 
            | Verificar se as entradas são válidas, sem espaços e != vazio
            */

                $hasEmpty = $this->checkInputEmpty($inputInfo);   //deve retornar FALSE
                
                if($hasEmpty){
                    $hasEmpty["error_type"] = "empty";
                    return $hasEmpty;
                }

            /* 
            | Verificar se o usuário informado existe, 
            | se sim retorna a id do mesmo e verifica senha
            | se nao, retorna usuario ou senha invalidas
            */

                $userExist = $this->userDAO->selectExist("id","usuario","ra", $inputInfo["usuario"]);

                if($userExist){
                    $userId = $userExist;

                    $userAuth = $this->validatePassword($userId, $inputInfo["senha"]);

                }
                if(!$userExist || !$userAuth){
                    $result["error_list"] = array();
                    foreach($inputInfo as $key => $value){
                        array_push($result["error_list"], $key);
                    }
                    $result["error_type"] = "validation";
                    
                    return $result;
                }
                $inputInfo = null;
            /*
            | Após a validação, cria-se um objeto contendo 
            | as informaçoes do usuario autenticado
            | e inicia-se uma sessão
            */
                $userData = $this->userDAO->selectUserData($userId);

                if(!$userData){
                    $response = array();
                    $response["error_type"] = "database";
                    return $response;
                }

                $this->startSession($userData);
            return true;
        }

    /*
    |--------------------------------------------------------------------------
    | Register
    |--------------------------------------------------------------------------
    | Funções de cadastro do usuário
    */
        private function _userRegister($inputInfo = array()){
            /*
            | Retorno
            | empty email user_invalid user_exist name password database
            */
            /* 
            | Verificar se as entradas são válidas, sem espaços e != vazio
            */

            $hasEmpty = $this->checkInputEmpty($inputInfo);   //deve retornar FALSE
                
            if($hasEmpty){
                $hasEmpty["error_type"] = "empty";
                return $hasEmpty;
            }

            /*
            | Validar Email
            */

            $inputInfo["email"] = filter_var($inputInfo["email"], FILTER_SANITIZE_EMAIL);
            $userExist = $this->userDAO->selectExist("id","usuario","email", $inputInfo["email"]);

            if(!filter_var($inputInfo["email"], FILTER_VALIDATE_EMAIL) || $userExist){
                $response = array("error_type" => "email", "error_list" => array("email"));
                return $response;
            }

            /*
            | Validar Usuário
            */
            $pattern = '/^[0-9]*$/';

            $validRa = $this->validateInputRegex($pattern, array("usuario"=>$inputInfo["usuario"]));
            if(!$validRa){
                $validRa["error_type"] = "user_invalid";
                $validRa["error_list"] = array("usuario");
                return $validRa;
            }
            $userExist = $this->userDAO->selectExist("id","usuario","ra", $inputInfo["usuario"]);
            if($userExist){
                $validRa["error_type"] = "user_exist";
                $validRa["error_list"] = array("usuario");
                return $validRa;
            }
            /*
            | Validar nome e sobrenome
            | Só pode ser composto por letras
            */

            $pattern = '/[^a-zA-Z ]/';
            $invalidName = $this->validateInputRegex($pattern, array("nome"=>$inputInfo["nome"], "sobrenome"=>$inputInfo["sobrenome"]));
            if($invalidName){
                $invalidName["error_type"] = "name";
                return $invalidName;
            }

            /*
            |   Validar Senha e Criptografar
            */
            if($inputInfo["senha"] == $inputInfo["senhaConfirma"]){
                $senhaHash = password_hash($inputInfo["senha"], PASSWORD_DEFAULT);
                $inputInfo["senha"] = null;
                $inputInfo["senhaConfirma"] = null;
            }else{
                $response["error_type"] = "password";
                $response["error_list"] = array("senha", "senhaConfirma");
                return $response;
            }
            /*
            |   Criar objeto do usuário e inserir no banco de dados
            */
            $userData = new UsuarioModel();

            $userData->setRA($inputInfo["usuario"]);
            $userData->setEmail($inputInfo["email"]);
            $userData->setNome($inputInfo["nome"]);
            $userData->setSobrenome($inputInfo["sobrenome"]);
            
            $result = $this->userDAO->insertNewUser($userData, $senhaHash);
            
            if(!$result){
                $response = array();
                $response["error_type"] = "database";
                return $response;
            }

            return true;
        }
    /*
    |--------------------------------------------------------------------------
    | Sessão
    |--------------------------------------------------------------------------
    | Todas as funções relacionadas a sessão do usuário
    */
        private function startSession($userData, $thirdInfo = array()){  
                
            $this->session->set_userdata("logged", true);
            $this->session->set_userdata("userData", serialize($userData));
            $this->session->set_userdata("thirdInfo", $thirdInfo);
            return true;
        }

        public function endSession(){
            $this->session->sess_destroy();
            redirect('user');
        }
    /*
    |--------------------------------------------------------------------------
    | Senha
    |--------------------------------------------------------------------------
    | Todas as funções relacionadas a senha
    */
        
        private function passwordForgot($inputInfo){
            /* 
            | Verificar se as entradas são válidas, sem espaços e != vazio
            */

            $hasEmpty = $this->checkInputEmpty($inputInfo);   //deve retornar FALSE
                
            if($hasEmpty){
                $hasEmpty["error_type"] = "empty";
                return $hasEmpty;
            }
            
            /*
            | Verificar existencia do usuário e senha
            */
            $userId = $this->userDAO->selectExist("id","usuario","email", $inputInfo["email"]);
            $userHasPassword = $this->userDAO->selectExist("usuario_id", "senha", "usuario_id", $userId);
            if(!$userId || !$userHasPassword){
                return true;
            }

            /*
            | Select informacoes do usuario
            */
            $userData = $this->userDAO->selectUserData($userId);

            /*
            | Deletar Token de segurança ativo
            */
            $this->userDAO->deletePasswordToken($userId);
            /*
            | Gerar novo Token de segurança
            */
            $selector = bin2hex(random_bytes(8));
            $token = random_bytes(32);
            $tokenHash = password_hash($token, PASSWORD_DEFAULT);
            $expires = date("U") + 1800;
            $url = base_url() . 'user/password_reset?selector=' . $selector . '&validator=' .bin2hex($token);

            $newToken = new PasswordTokenModel();
            $newToken->setUsuarioId($userId);
            $newToken->setSelector($selector);
            $newToken->setToken($tokenHash);
            $newToken->setExpire($expires);

            $result = $this->userDAO->insertPasswordResetToken($userId, $newToken);

            if(!$result){
                return false;
            }
            $result = $this->sendPasswordResetEmail($userData, $url);
            return $result;
        }

        private function sendPasswordResetEmail($userData, $url){
            $htmlContent = '<h1>Redefinir Senha</h1>';
            $htmlContent .= '<p>Olá '. $userData->getNome() . " " . $userData->getSobrenome() .'</p>';
            $htmlContent .= '<p>usuário:'. $userData->getRa() .'</p>';
            $htmlContent .= '<p>Para redefinir sua senha <a href="' . $url . '">clique aqui</a></p>';
            
            $this->email->from($this->config->item('smtp_user'), 'COTIL Jogos');
            $this->email->to($userData->getEmail());

            $this->email->subject('Redefinir Senha');
            $this->email->message($htmlContent);    

            $result = $this->email->send();

            if($result){
                return true;
            }else{
                return false;
            }
        }

        private function passwordReset($inputInfo, $tokenData){
            /*
            |   Retorna
            |   empty validation senha database
            */
            
            /* 
            | Verificar se as entradas são válidas, sem espaços e != vazio
            */

            $hasEmpty = $this->checkInputEmpty($inputInfo);   //deve retornar FALSE
                
            if($hasEmpty){
                $hasEmpty["error_type"] = "empty";
                return $hasEmpty;
            }

            $time = date("U");

            $resetData = $this->userDAO->selectResetPassword($tokenData["selector"], $time);

            if(!$resetData){
                $resetData["error_type"] = "validation";
                return $resetData;
            }

            $tokenBin = hex2bin($tokenData["validator"]);

            if(!password_verify($tokenBin, $resetData->getToken())){
                $response["error_type"] = "validation";
                return $response;
            }

            if($inputInfo["senha"] != $inputInfo["confirma"]){
                $response["error_type"] = "senha";
                return $response;
            }else{
                $newPassword = password_hash($inputInfo["senha"], PASSWORD_DEFAULT);
            }

            $result = $this->userDAO->updateUserPassword($resetData->getUsuarioId(), $newPassword);

            if(!$result){
                $response["error_type"] = "database";
                return $response;
            }
            $this->userDAO->deletePasswordToken($resetData->getUsuarioId());
            
            return true;
        }
}