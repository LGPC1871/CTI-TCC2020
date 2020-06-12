<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller{
    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $content = array(
            "styles" => array("login.css"),
            "scripts" => array("loginGoogle.js")
        );

        $this->template->show("login.php", $content);
    }
}