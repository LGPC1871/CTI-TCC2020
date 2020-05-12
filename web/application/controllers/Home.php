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
        $carrosselArray = $this->Home_content->selectCarrosselData();
        $jumbotronArray = $this->Home_content->selectJumbotronData();
        $content = array(
            "styles" => array('carrossel.css', 'jumbotron.css', 'home.css'),
            "carrossel" => $carrosselArray,
            "jumbotron" => $jumbotronArray
        );
        $this->template->show("home.php", $content);
    }
}