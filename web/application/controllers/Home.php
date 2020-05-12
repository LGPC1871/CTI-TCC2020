<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Home_content');

    $this->carrossel = 'HA_carrossel';
        $this->carrossel_id = 'HA_id';
        $this->carrossel_status = 'HA_status';
        $this->carrossel_imagem = 'HA_imagem';
        $this->carrossel_imagemalt = 'HA_imagemalt';
        $this->carrossel_legendatitulo = 'HA_legendatitulo';
        $this->carrossel_legendatexto = 'HA_legendatexto';
    
    $this->jumbotron = 'HB_jumbotron';
        $this->jumbotron_id = 'HB_id';
        $this->jumbotron_status = 'HB_status';
        $this->jumbotron_titulo = 'HB_titulo';
        $this->jumbotron_subtitulo = 'HB_subtitulo';
        $this->jumbotron_texto = 'HB_texto';
        $this->jumbotron_textobotao = 'HB_textobotao';
    }
    
    public function index(){
        redirect('home/principal');
    }

    public function principal(){
        $content = array(
            "styles" => array('carrossel.css', 'jumbotron.css', 'home.css'),
        );
        $carrosselArray = $this->Home_content->selectCarrosselData();
        if($carrosselArray){
            $content["carrossel"] = $carrosselArray;
        }
        $jumbotronArray = $this->Home_content->selectJumbotronData();
        if($jumbotronArray){
            $content["jumbotron"] = $jumbotronArray;
        }
        $this->template->show("home.php", $content);
    }
}