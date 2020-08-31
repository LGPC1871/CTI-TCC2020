<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Participar extends CI_Controller{
    /**
     * Construtor do controlador
     * carrega os models usados
     * carrega os DAO usados
     */
    public function __construct(){
        parent::__construct();
        //REQUIRES\\
        require_once(APPPATH . 'libraries/model/ModalidadeModel.php');
        require_once(APPPATH . 'libraries/model/ModalidadeEdicaoModel.php');

        //LOADS\\
        $this->load->model('dao/ModalidadeDAO', 'modalidadeDAO');
        $this->load->model('dao/ModalidadeEdicaoDAO', 'modalidadeEdicaoDAO');
    }

    public function exibirPaginaParticipar(){
        $modalidades = $this->modalidadeDAO->getModalidades(array('return' => 'multiple'));
        if(!$modalidades) exit("ocorreu um erro!");

        $content = array(
            "modalidades" => $modalidades
        );

        $this->template->show("participar.php", $content);
    }

}