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
            "carrossel" => array()
        );
        $carrosselArray = $this->Home_content->selectCarrosselData();
        $jumbotronArray = $this->Home_content->selectJumbotronData();
        
        foreach($carrosselArray as $item){
            $row = array(
                "id" =>$item[$this->carrossel_id],
                "status" =>$item[$this->carrossel_status],
                "imagem" =>$item[$this->carrossel_imagem],
                "imagemalt" =>$item[$this->carrossel_imagemalt],
                "legendatitulo" =>$item[$this->carrossel_legendatitulo],
                "legendatexto" =>$item[$this->carrossel_legendatexto],
            );
            array_push($content["carrossel"], $row);
        }
        foreach($jumbotronArray as $item){
            $row = array(
                "id" => $jumbotronArray[$this->jumbotron_id],
                "status" => $jumbotronArray[$this->jumbotron_status],
                "titulo" => $jumbotronArray[$this->jumbotron_titulo],
                "subtitulo" => $jumbotronArray[$this->jumbotron_subtitulo],
                "texto" => $jumbotronArray[$this->jumbotron_texto],
                "textobotao" => $jumbotronArray[$this->jumbotron_textobotao],
            );
            array_push($content["jumbotron"], $row);
        }
        
        $this->template->show("home.php", $content);
    }
}