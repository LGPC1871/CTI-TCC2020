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
         * Método específico getTimesTable
         * retorna o array de objetos JoinTableModel
         */
        public function getTimesTable(){
            $select = array(
                'time.id',
                'time.nome time',
                'usuario.nome usuario',
                'modalidade.nome modalidade',
                'count(*) quantidade_jogadores',
                'modalidade.limite_jogadores_time',
            );
            $joinOptions = array(
                array(
                    'table' => 'modalidade',
                    'on' => 'time.modalidade_id = modalidade.id',
                    'join' => 'inner',
                ),
                array(
                    'table' => 'usuario',
                    'on' => 'usuario.id = time.usuario_id',
                    'join' => 'inner',
                ),
                array(
                    'table' => 'usuario_time',
                    'on' => 'usuario_time.time_id = time.id',
                    'join' => 'inner',
                ),
            );
            $options = array(
                'select' => $select,
                'from' => 'time',
                'join' => $joinOptions,
                'return' => 'multiple'
            );

            $result = $this->read($options);
            if(!$result) return false;
            
            $retorno = array();
            
            foreach($result as $linha){
                $linhaObjeto = new JoinTableModel();
                
                $columns = array(
                    'id' => $linha->id,
                    'time' => $linha->time,
                    'usuario' => $linha->usuario,
                    'modalidade' => $linha->modalidade,
                    'quantidade_jogadores' => $linha->quantidade_jogadores,
                    'limite_jogadores_time' => $linha->limite_jogadores_time,
                );
                $linhaObjeto->setColumns($columns);

                array_push($retorno, $linhaObjeto);
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