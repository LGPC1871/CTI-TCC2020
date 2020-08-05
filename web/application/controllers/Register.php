<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller{
    
    public function __construct(){
        parent::__construct();

        //REQUIRES\\
        require_once(APPPATH . 'libraries/model/SexoModel.php');

        //LOADS\\
        $this->load->model('dao/SexoDAO', 'sexoDAO');
    }

    public function index(){
        if(!$this->session->userdata("logged")){
            $this->loadPage();
        }else{
            redirect('user');
        }
    }

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
}