<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class UsuarioTimeDAO extends DAO{
    public function __construct(){
        parent::__construct();
        $this->load->library('model/UsuarioTimeModel', 'usuarioTimeModel');
        $this->load->library('model/JoinTableModel', 'JoinTableModel');
    }
    /*
    |--------------------------------------------------------------------------
    | FUNÇÕES
    |--------------------------------------------------------------------------
    | Funções do acesso de dados da classe
    */
        /**
         * Método addUsuarioTime
         * adiciona linha na tabela usuario_time
         * @param UsuarioTimeModel
         * @return bool
         */
        public function addUsuarioTime($input){
            //verificar se input bate com requisitos
            $requiredInput = array(
                'UsuarioTimeModel',
            );
            if(!$this->_required($requiredInput, $input, 1)) return false;
            $usuarioTime = $input['UsuarioTimeModel'];

            //verificar se o objeto bate com os requisitos
            $requiredUsuarioTime = array(
                "time_id",
                "usuario_id",
                "ativo",
            );
            $usuarioTimeAttr = $usuarioTime->_verifyObjectAttr();
            if(!$this->_required($requiredUsuarioTime, $usuarioTimeAttr, 2)) return false;

            //preparar options para o insert
            $values = array(
                'time_id' => $usuarioTime->getTimeId(),
                'usuario_id' => $usuarioTime->getUsuarioId(),
                'ativo' => $usuarioTime->getAtivo(),
            );

            $options = array(
                'table' => 'usuario_time',
                'values' => $values
            );
            
            $newRow = $this->create($options);

            return $newRow;
        }

        /**
         * Método especifico getUsuariosTime
         * retorna usuarios de um time
         * @param $options
         * @return UsuarioTimeModel
         * @return array
         */
        public function getUsuariosTime($timeId){
            $select = array(
                'usuario.id',
                'usuario.ra',
                'usuario.nome',
                'sexo.nome sexo'
            );

            $joinOptions = array(
                array(
                    'table' => 'usuario',
                    'on' => 'usuario_time.usuario_id = usuario.id',
                    'join' => 'inner',
                ),
                array(
                    'table' => 'sexo',
                    'on' => 'usuario.sexo_id = sexo.id',
                    'join' => 'inner',
                ),
            );

            $options = array(
                'select' => $select,
                'from' => 'usuario_time',
                'where' => array(
                    'usuario_time.time_id' => $timeId,
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
                    'sexo' => $linha->sexo,
                );
                $linhaObjeto->setColumns($columns);

                array_push($retorno, $linhaObjeto);
            }

            return $retorno;
        }

        /**
         * Método removerUsuarioDoTime
         * retira uma linha da tabela usuario_time
         * @param $options
         * @return bool
         */
        public function removerUsuarioDoTime($options = array()){
            $required = array(
                'where'
            );
            if(!$this->_required($required, $options, 1)) return false;
            
            $options['table'] = 'usuario_time';
            $result = $this->delete($options);

            return $result;
        }
}