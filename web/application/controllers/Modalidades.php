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
        require_once(APPPATH . 'libraries/model/ModalidadeEdicaoModel.php');

        //LOADS\\
        $this->load->model('dao/ModalidadeDAO', 'modalidadeDAO');
        $this->load->model('dao/ModalidadeEdicaoDAO', 'modalidadeEdicaoDAO');
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

        //preparar consulta para modalidade
        $options = array(
            'where' => array(
                'id' => $idModalidade
            ),
            'return' => 'row',
        );
        $dadosModalidade = $this->modalidadeDAO->getModalidades($options);
        $options = null;
 
        //preparar conteudo da pagina
        $content = array(
            "modalidade" => $dadosModalidade,
            "scripts" => array('modalidade.js'),
        );

        //mostrar view, passando conteudo gerado
        $this->template->show('modalidade.php', $content);
    }

    
     /**
     * Retorna uma view contendo um accordion, listando todas
     * as edicoes da modalidade informada
     * @param ModalidadeId
     * @return View
     */
    public function ajaxExibirModalidadeEdicoes(){
        if (!$this->input->is_ajax_request()) exit("Nenhum acesso de script direto permitido!");
        $modalidadeId = $this->input->post("id");

        $modalidadeEdicoes = $this->modalidadeEdicaoDAO->getModalidadeEdicoesLista($modalidadeId);

        if(!$modalidadeEdicoes) return false;

        $content = array(
            "modalidadeEdicoes" => $modalidadeEdicoes
        );
        echo $this->load->view("content/modalidade/modalidade_edicoes.php", $content, true);
    }

    /**
     * Requisicao do form de inscricao de uma determinada 
     * edicao de modalidade
     * @param ModalidadeEdicao
     * @return View
     */
    public function ajaxExibirAccordion(){
        if (!$this->input->is_ajax_request()) exit("Nenhum acesso de script direto permitido!");
        $modalidadeEdicaoId = $this->input->post("id");

        $options = array(
            'where' => array(
                'id' => $modalidadeEdicaoId,
            ),
        );
        $modalidadeEdicao = $this->modalidadeEdicaoDAO->getModalidadeEdicao($options);
        if(!$modalidadeEdicao) return false;

        $content = array(
            "modalidadeEdicao" => $modalidadeEdicaoId,
        );

        
        echo $this->load->view("content/modalidade/modalidade_edicao.php", $content, true);
    }
}