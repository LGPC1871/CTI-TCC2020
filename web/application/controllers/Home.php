<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

    public function index(){
        $content = array(
            "styles" => array("galeria-home.css")
        );
        $this->template->show('home.php', $content);
    }
    
}