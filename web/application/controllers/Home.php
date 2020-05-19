<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Home_content');
    }
    
    public function index(){
        redirect('home/principal');
    }

    public function principal(){
        $content = array(
            "styles" => array('carrossel.css', 'jumbotron.css', 'home.css', 'galeria-home.css'),
        );
        
        $carrosselArray = $this->carrossel();
        if($carrosselArray){
            $content["carrossel"] = $carrosselArray;
        }
        
        $jumbotronArray = $this->jumbotron();
        if($jumbotronArray){
            $content["jumbotron"] = $jumbotronArray;
        }
        
        $this->template->show("home.php", $content);
    }

    private function carrossel(){
        $result = $this->Home_content->selectCarrosselData();
        if($result){
            return $result;
        }else{
            return false;
        }
    }
    private function jumbotron(){
        $result = $this->Home_content->selectJumbotronData();
        if($result){
            return $result;
        }else{
            return false;
        }
    }
}