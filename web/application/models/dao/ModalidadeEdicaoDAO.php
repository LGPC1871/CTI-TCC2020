<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class ModalidadeEdicaoDAO extends DAO{
    public function __construct(){
        parent::__construct();
        $this->load->library('model/ModalidadeEdicaoModel', 'ModalidadeEdicaoModel');
        $this->load->library('model/JoinTableModel', 'JoinTableModel');
    }

    /*
    |--------------------------------------------------------------------------
    | FUNÇÕES
    |--------------------------------------------------------------------------
    | Funções do acesso de dados da classe
    */

    /**
     * Funcao especifica para retornar um inner join das tabelas:
     * 
     * modalidade_edicao | modalidade | modalidade_regras | edicao | modalidade_edicao_status
     * 
     * Esse inner join fornecerá os dados para preencher o Accordion na pagina modalidade.php
     * @return JoinTableModel
     */
    function getModalidadeEdicoesLista($modalidadeId){
        $select = array(
            'modalidade_edicao.id id',
            'modalidade_edicao_status.nome nome_status',
            'edicao.titulo',
            'edicao.ano',
        );

        $joinOptions = array(
            array(
                'table' => 'modalidade_edicao_status',
                'on' => 'modalidade_edicao.modalidade_edicao_status_id = modalidade_edicao_status.id',
                'join' => 'inner',
            ),
            array(
                'table' => 'edicao',
                'on' => 'modalidade_edicao.edicao_id = edicao.id',
                'join' => 'inner',
            ),
        );
        
        $options = array(
            'select' => $select,
            'from' => 'modalidade_edicao',
            'where' => array(
                'modalidade_edicao.modalidade_id' => $modalidadeId,
            ),
            'join' => $joinOptions,
            'order_by' => 'edicao.ano DESC',
            'return' => 'multiple'
        );

        $result = $this->read($options);
        if(!$result) return false;
        
        $retorno = array();
        
        foreach($result as $linha){
            $linhaObjeto = new JoinTableModel();
            
            $columns = array(
                'id' => $linha->id,
                'nome_status' => $linha->nome_status,
                'edicao_titulo' => $linha->titulo,
                'edicao_ano' => $linha->ano,
            );
            $linhaObjeto->setColumns($columns);

            array_push($retorno, $linhaObjeto);
        }

        return $retorno;
    }

    /**
     * Funcao retorna objeto modalidadeEdicao
     */
    function getModalidadeEdicao($options){
        $required = array(
            'where'
        );
        if(!$this->_required($required, $options, 1)) return false;
        $options['from'] = "modalidade_edicao";

        $result = $this->read($options);
        if(!$result) return false;

        $modalidadeEdicao = new ModalidadeEdicaoModel();
        if(isset($result->id)) $modalidadeEdicao->setId($result->id); 
        if(isset($result->idedicao_id)) $modalidadeEdicao->setEdicaoId($result->edicao_id); 
        if(isset($result->modalidade_id)) $modalidadeEdicao->setModalidadeId($result->modalidade_id); 
        if(isset($result->status)) $modalidadeEdicao->setStatus($result->status); 
        if(isset($result->modalidade_edicao_status_id)) $modalidadeEdicao->setModalidadeEdicaoStatusId($result->modalidade_edicao_status_id); 
        
        return $modalidadeEdicao;
    }
}