<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class ModalidadeDao extends DAO{
    public function __construct(){
        parent::__construct();
        $this->load->library('model/ModalidadeModel', 'ModalidadeModel');
    }
    /*
    |--------------------------------------------------------------------------
    | FUNÇÕES
    |--------------------------------------------------------------------------
    | Funções do acesso de dados da classe
    */
        /**
         * Método getModalidade, retorna uma ou mais modalidades
         * @param $options
         * @return array
         */
        function getModalidades($options = array()){
            $required = array(
                'return',
            );
            if(!$this->_required($required, $options, 1)) return false;

            $options['from'] = 'modalidade';

            $result = $this->read($options);

            if(!$result)return false;
            $retorno = array();
            foreach($result as $stdObject){
                $modalidade = new ModalidadeModel();
                if(isset($stdObject->id)) $modalidade->setId($stdObject->id);
                if(isset($stdObject->nome)) $modalidade->setNome($stdObject->nome);
                if(isset($stdObject->descricao)) $modalidade->setDescricao($stdObject->descricao);
                if(isset($stdObject->status)) $modalidade->setStatus($stdObject->status);
    
                //verificar se o objeto bate com os requisitos
                $requiredModalidade = array(
                    "id",
                    "nome",
                );
                $modalidadeAttr = $modalidade->_verifyObjectAttr();
                if(!$this->_required($requiredModalidade, $modalidadeAttr, 2)){
                    if($required == 'row'){
                        return false;
                    }else{
                        continue;
                    }
                }
                array_push($retorno, $modalidade);
            }
            return $retorno;
        }
}