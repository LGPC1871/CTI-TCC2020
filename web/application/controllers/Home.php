<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{

    public function index(){
        redirect('home/main');
    }

    public function main(){
        $this->template->show("home.php");
    }
}