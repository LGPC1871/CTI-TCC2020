<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class SenhaResetDAO extends DAO{
    public function __construct(){
        parent::__construct();
        $this->load->library('model/UsuarioModel', 'usuarioModel');
    }
    /*
    |--------------------------------------------------------------------------
    | FUNÇÕES
    |--------------------------------------------------------------------------
    | Funções do acesso de dados da classe
    */
        /**
         * Método addToken
         * insere um novo registro na tabela @senha_reset
         * retorna false se o insert falhar
         * @param array $input
         * @return int $newUserId
         * @return false
         */
        public function addToken($input = array()){
            //verificar se input bate com requisitos
            $requiredInput = array(
                'senhaResetModel',
            );
            if(!$this->_required($requiredInput, $input, 1)) return false;

            $senhaReset = $input['senhaResetModel'];

            //verificar se o objeto bate com os requisitos
            $requiredSenhaReset = array(
                "usuario_id",
                "selector",
                "token",
                "expire"
            );
            $senhaResetAttr = $senhaReset->_verifyObjectAttr();
            if(!$this->_required($requiredSenhaReset, $senhaResetAttr, 2)) return false;
            
            //preparar insert
            $atributos = array(
                "usuario_id" => $senhaReset->getUsuarioId(),
                "selector" => $senhaReset->getSelector(),
                "token" => $senhaReset->getToken(),
                "expire" => $senhaReset->getExpire()
            );

            $options = array(
                'table' => 'senha_reset',
                'values' => $atributos
            );
            
            $this->create($options);
            return true;
        }

        /**
         * Método getSenhaReset
         * retorna um objeto contendo o token para resetar a senha
         * retorna false se a operacao falhar
         * retorna false se o usuário não existe
         * @param array $options
         * @return UsuarioModel
         * @return false
         */
        public function getSenhaReset($selector){
            if(!$selector) return false;

            $options = array(
                'from' => 'senha_reset',
                'where' => array(
                    'selector' => $selector
                    )
                );
                
            $result = $this->read($options);
            
            if(!$result) return false;
            
            if(!isset($result->usuario_id)) return false;
            if(!isset($result->selector)) return false;
            if(!isset($result->token)) return false;
            if(!isset($result->expire)) return false;
            
            $senhaReset = new SenhaResetModel();
            $senhaReset->setUsuarioId($result->usuario_id);
            $senhaReset->setSelector($result->selector);
            $senhaReset->setToken($result->token);
            $senhaReset->setExpire($result->expire);
            
            return $senhaReset;
        }
        /**
         * Método removeToken
         * remove um registro da tabela @usuario
         * retorna false se o delete falhar
         * @param int $userId
         * @return boolean
         * @return false
         */
        public function removeToken($userId){
            if(!$userId) return false;
            $input = array(
                'table' => 'senha_reset',
                'where' => array(
                    'usuario_id' => $userId
                )
            );

            $result = $this->delete($input);

            return $result;
        }
}