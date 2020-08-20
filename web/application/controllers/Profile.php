<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller{
    
    public function __construct(){
        parent::__construct();

        //REQUIRES\\
        require_once(APPPATH . 'libraries/model/UsuarioModel.php');

        //LOADS\\
        $this->load->model('dao/UsuarioDAO', 'usuarioDAO');
    }
    public function index(){
        if($this->session->userdata("logged")){
            $this->loadProfile();
        }else{
            redirect('user');
        }
    }
    /*
    |--------------------------------------------------------------------------
    | Ajax
    |--------------------------------------------------------------------------
    | Requisicoes ajax
    */
        public function ajaxAlterarAvatar(){
            if (!$this->input->is_ajax_request()) {
                exit("Nenhum acesso de script direto permitido!");
            }
            if(isset($_FILES["avatar"]["name"])){
                $result = $this->setUserAvatar($_FILES["avatar"]);
            }else{
                $result = array(
                    "error_type" => "no_file"
                );                
            }
            return $result;
        }

        public function ajaxAlterarNome(){
            if (!$this->input->is_ajax_request()) {
                exit("Nenhum acesso de script direto permitido!");
            }

            echo json_encode("teste");
        }

    /*
    |--------------------------------------------------------------------------
    | Private
    |--------------------------------------------------------------------------
    | Funções da classe
    */
        private function setUserAvatar($image){

            if(!$this->session->userdata('logged')){
                $result['error_type'] = 'access';
            }

            $userRa = $this->session->userdata('ra');
            $userSubRa = substr($userRa, 0, 2);
            $dir = 'src/data/user/avatar/' . $userSubRa;

            //verificar diretorio
            if(!is_dir($dir)){
                mkdir($dir, 0777, true);
            }

            //preparando classe upload
            $config['upload_path'] = $dir;
            $config['allowed_types'] = 'jpg|png';
            $config['file_name'] = $userRa . '.jpg';
            $config['overwrite'] = true;

            $this->load->library('upload', $config);
            if(!$this->upload->do_upload('avatar'))  
            {  
                 echo $this->upload->display_errors();  
            }  
            else  
            {  
                 echo 'funcionou!!';  
            } 
        }

        private function loadProfile(){
            if(!$this->session->userdata("logged")) return false;

            $content = array();

            $usuario = new UsuarioModel();
            $id = $this->session->userdata("id");
            $options = array(
                "where" => array(
                    "id" => $id,
                ),
            );
            $usuario = $this->usuarioDAO->getUser($options);

            if(!$usuario) return false;
            
            $content["usuario"] = $usuario;
            $content["isProfilePage"] = true;
            $content["scripts"] = array('profile.js', 'form.js');

            $this->template->show("profile.php", $content);
        }
}