<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modalidades extends CI_Controller{
    
    public function __construct(){
        parent::__construct();
        //REQUIRES\\
        require_once(APPPATH . 'libraries/model/ModalidadeModel.php');

        //LOADS\\
        $this->load->model('dao/ModalidadeDAO', 'modalidadeDAO');
    }

    public function index(){
        $modalidades = $this->carregarModalidades();
        if(!$modalidades) exit("ocorreu um erro!");

        $content = array(
            "modalidades" => $modalidades
        );
        $this->template->show('modalidades.php', $content);
    }

    /**
     * Função carrega as modalidades cadastradas
     * @param
     * @return Array
     */
    private function carregarModalidades(){
        $options = array(
            'return' => 'multiple'
        );
        return $this->modalidadeDAO->getModalidades($options);
    }
}