<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class SolicitarTimeDAO extends DAO{
    public function __construct(){
        parent::__construct();
        $this->load->library('model/SolicitarTimeModel', 'solicitarTimeModel');
    }
    /*
    |--------------------------------------------------------------------------
    | FUNÇÕES
    |--------------------------------------------------------------------------
    | Funções do acesso de dados da classe
    */
        /**
         * Método addSolicitacaoTime
         * adiciona uma linha na tabela solicitar_time
         * @param SolicitarTimeModel
         * @return bool
         */
        public function addSolicitacaoTime($input){
            $requiredInput = array(
                'SolicitarTimeModel',
            );
            if(!$this->_required($requiredInput, $input, 1)) return false;
            $novaSolicitacao = $input['SolicitarTimeModel'];

            $requiredSolicitacao = array(
                "timeId",
                "usuarioId",
            );
            $solicitacaoAttr = $novaSolicitacao->_verifyObjectAttr();
            if(!$this->_required($requiredSolicitacao, $solicitacaoAttr, 2)) return false;
            
            $values = array(
                'time_id' => $novaSolicitacao->getTimeId(),
                'modalidade_id' => $novaSolicitacao->getUsuarioId(),
            );

            $options = array(
                'table' => 'solicitar_time',
                'values' => $values
            );
            $result = $this->create($options);
            
            return $result;
        }

}