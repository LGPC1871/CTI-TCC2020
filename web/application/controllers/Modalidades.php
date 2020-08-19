<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Modalidades extends CI_Controller{
    /**
     * Construtor do controlador
     * carrega os models usados
     * carrega os DAO usados
     */
    public function __construct(){
        parent::__construct();
        //REQUIRES\\
        require_once(APPPATH . 'libraries/model/ModalidadeModel.php');

        //LOADS\\
        $this->load->model('dao/ModalidadeDAO', 'modalidadeDAO');
    }

    /**
     * Exibir view com todas as modalidades cadastradas
     * @return View
     * @return Content
     */
    public function exibirModalidades(){
        $modalidades = $this->modalidadeDAO->getModalidades(array('return' => 'multiple'));
        if(!$modalidades) exit("ocorreu um erro!");

        $content = array(
            "modalidades" => $modalidades
        );

        $this->template->show('modalidades.php', $content);
    }

    /**
     * Exibir view com uma modalidade, recebida por GET
     * @param GET
     * @return View
     * @return Content
     */
    public function exibirModalidade(){
        $idModalidade = $this->input->get('id');

        //preparar consulta
        $options = array(
            'where' => array(
                'id' => $idModalidade
            ),
            'return' => 'single',
        );
        $dadosModalidade = $this->modalidadeDAO->getModalidades($options);

        //preparar conteudo da pagina
        $content = array(
            "modalidade" => $dadosModalidade,
        );

        //mostrar view, passando conteudo gerado
        $this->template->show('modalidade.php', $content);
    }
}