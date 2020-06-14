<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{
    
    public function __construct(){
        parent::__construct();

        //REQUIRES\\
        require_once(APPPATH . 'libraries/model/UsuarioModel.php');
        $this->load->model('UserDAO', 'userDAO');
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
    /*
    |--------------------------------------------------------------------------
    | AJAX
    |--------------------------------------------------------------------------
    | Requisicoes Ajax
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
        public function ajaxRegister(){
            if (!$this->input->is_ajax_request()) {
                exit("Nenhum acesso de script direto permitido!");
            }

            $inputArray = array(
                "email" => $this->input->post("email"),
                "usuario" => $this->input->post("usuario"),
                "senha" => $this->input->post("senha"),
                "senhaConfirma" => $this->input->post("senhaConfirma"),
            );

            $response = $this->userRegister($inputArray);

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

    /*
    |--------------------------------------------------------------------------
    | Login
    |--------------------------------------------------------------------------
    | Funções de login próprio
    */
        private function userLogin($inputInfo = array()){
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

                $userExist = $this->userDAO->selectUserExist($inputInfo["usuario"]);
                
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
        private function userRegister($inputInfo = array()){
            /*
            | Retorno
            | 
            */
            /* 
            | Verificar se as entradas são válidas, sem espaços e != vazio
            */

            $hasEmpty = $this->checkInputEmpty($inputInfo);   //deve retornar FALSE
                
            if($hasEmpty){
                $hasEmpty["error_type"] = "empty";
                return $hasEmpty;
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
}