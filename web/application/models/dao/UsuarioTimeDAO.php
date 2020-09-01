<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class UsuarioTimeDAO extends DAO{
    public function __construct(){
        parent::__construct();
        $this->load->library('model/UsuarioTimeModel', 'usuarioTimeModel');
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
}