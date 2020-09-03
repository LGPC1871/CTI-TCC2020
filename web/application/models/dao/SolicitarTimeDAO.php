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
            //echo var_dump($novaSolicitacao->_verifyObjectAttr());
            //if(!$this->_required($requiredSolicitacao, $solicitacaoAttr, 2)) return false;
            
            $values = array(
                'time_id' => $novaSolicitacao->getTimeId(),
                'usuario_id' => $novaSolicitacao->getUsuarioId(),
            );

            $options = array(
                'table' => 'solicitar_time',
                'values' => $values,
                'return' => 'boolean',
            );
            $result = $this->create($options);
            return $result;
        }

        /**
         * Método verificarSolicitacao
         * verifica se existe uma solicitacao e retorna o status
         * se existir
         * @param $options
         * @return false
         * @return SolicitarTimeModel
         */
        public function verificarSolicitacao($timeId, $usuarioId){
            $options = array(
                'from' => 'solicitar_time',
                'where' => array(
                    'time_id' => $timeId,
                    'usuario_id' => $usuarioId
                ),
                'return' => 'row',
            );
            $result = $this->read($options);
            //objeto nao encontrado
            if(!$result) return false;

            //encontrado
            $solicitarTimeModel = new SolicitarTimeModel();
            $solicitarTimeModel->setTimeId($result->time_id);
            $solicitarTimeModel->setUsuarioId($result->usuario_id);
            $solicitarTimeModel->setRecusado($result->recusado);

            return $solicitarTimeModel;
        }

        /**
         * Método específico getSolicitacoesTime
         * retorna um select com join das tabelas
         * |time| |usuario| |solicitar_time|
         */
        public function getSolicitacoesTime($timeId){
            $select = array(
                'usuario.id id',
                'usuario.ra ra',
                'usuario.nome nome',
                'usuario.sobrenome sobrenome',
            );
            $joinOptions = array(
                array(
                    'table' => 'usuario',
                    'on' => 'solicitar_time.usuario_id = usuario.id',
                    'join' => 'inner',
                ),
            );
                        
            $options = array(
                'select' => $select,
                'from' => 'solicitar_time',
                'where' => array(
                    'solicitar_time.time_id' => $timeId,
                ),
                'join' => $joinOptions,
                'order_by' => 'usuario.nome DESC',
                'return' => 'multiple'
            );

            
            $result = $this->read($options);
            if(!$result) return false;
            
            $retorno = array();
            
            foreach($result as $linha){
                $linhaObjeto = new JoinTableModel();
                
                $columns = array(
                    'id' => $linha->id,
                    'ra' => $linha->ra,
                    'nome' => $linha->nome,
                    'sobrenome' => $linha->sobrenome,
                );
                $linhaObjeto->setColumns($columns);

                array_push($retorno, $linhaObjeto);
            }

            return $retorno;
        }
}