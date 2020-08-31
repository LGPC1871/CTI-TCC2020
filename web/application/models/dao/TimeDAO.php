<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class TimeDAO extends DAO{
    public function __construct(){
        parent::__construct();
        $this->load->library('model/TimeModel', 'timeModel');
    }
    /*
    |--------------------------------------------------------------------------
    | FUNÇÕES
    |--------------------------------------------------------------------------
    | Funções do acesso de dados da classe
    */
        /**
         * Insere um novo time na tabela time
         * @param $options
         * @return bool
         */
        public function addTime($input = array()){
            $requiredInput = array(
                'timeModel',
            );
            if(!$this->_required($requiredInput, $input, 1)) return false;
            $novoTime = $input['timeModel'];

            $requiredTime = array(
                "nome",
                "modalidadeId",
                "usuarioId",
            );
            $timeAttr = $novoTime->_verifyObjectAttr();
            if(!$this->_required($requiredTime, $timeAttr, 2)) return false;

            $values = array(
                'nome' => $novoTime->getNome(),
                'modalidade_id' => $novoTime->getModalidadeId(),
                'usuario_id' => $novoTime->getUsuarioId(),
            );

            $options = array(
                'table' => 'time',
                'values' => $values
            );
            $result = $this->create($options);
            return $result;
        }

        /**
         * Select nas linhas desejadas
         * @param &options
         * @return array
         */
        public function getTime($options = array()){
            $options['from'] = 'time';

            $result = $this->read($options);
            if(!$result)return false;
            
            //retorna uma unica modalidade
            if($options['return'] == 'row'){
                return $this->convertToTimeModel($result);
            }
            
            $retorno = array();
            foreach($result as $stdObject){
                                
                $time = $this->convertToTimeModel($stdObject);
    
                //verificar se o objeto bate com os requisitos
                $requiredTime = array(
                    "id",
                    "nome",
                    "usuarioId",
                    "modalidadeId",
                );
                $timeAttr = $time->_verifyObjectAttr();
                if(!$this->_required($requiredTime, $timeAttr, 2)){
                    continue;
                }
                array_push($retorno, $time);
            }
            return $retorno;
        }

        /**
         * Converter array resultado do bd
         * em um objeto TimeModel
         * @param object
         * @return TimeModel
         */
        private function convertToTimeModel($stdObject){
            $time = new TimeModel();
                if(isset($stdObject->id)) $time->setId($stdObject->id);
                if(isset($stdObject->nome)) $time->setNome($stdObject->nome);
                if(isset($stdObject->usuario_id)) $time->setUsuarioId($stdObject->usuario_id);
                if(isset($stdObject->modalidade_id)) $time->setModalidadeId($stdObject->modalidade_id);
            return $time;
        }
}