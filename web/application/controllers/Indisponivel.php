<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Indisponivel extends CI_Controller{

    public function index(){
        $this->template->show('indisponivel.php');
    }
    
}