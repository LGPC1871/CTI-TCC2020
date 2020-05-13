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