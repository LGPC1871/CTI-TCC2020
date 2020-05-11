<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
    public function __construct(){
        parent::__construct();
        $this->load->model('Home_content');
    }
    public function index(){
        redirect('home/main');
    }

    public function main(){
        $carrosselArray = $this->Home_content->selectCarrosselData();

        $content = array(
            "styles" => array('carrossel.css'),
            "carrossel" => $carrosselArray
        );
        $this->template->show("home.php", $content);
    }
}