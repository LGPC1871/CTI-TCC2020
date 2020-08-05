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
    | Private
    |--------------------------------------------------------------------------
    | Funções da classe
    */

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

        $this->template->show("profile.php", $content);
    }
}