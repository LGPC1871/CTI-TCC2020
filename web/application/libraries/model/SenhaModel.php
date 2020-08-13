<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class SenhaModel{
    private $usuarioId;
    private $senha;

    public function __construct(){
    }
    /*
    |--------------------------------------------------------------------------
    | PUBLIC
    |--------------------------------------------------------------------------
    | Todas as funções da classe
    */

        /**
         * Método required, retorna quais atributos do objeto inserido
         * NÃO são nulos
         * @param object $pessoaModel
         * @return array
         */
        public function _verifyObjectAttr(){
            $response = array();
            if($this->getUsuarioId()) $response['usuario_id'] = true;
            if($this->getSenha()) $response['senha'] = true;
            
            return $response;
        }
    /*
    |--------------------------------------------------------------------------
    | Get Set
    |--------------------------------------------------------------------------
    | Funções get e set
    */
        /**
         * Get the value of usuarioId
         */ 
        public function getUsuarioId()
        {
            return $this->usuarioId;
        }

        /**
         * Set the value of usuarioId
         *
         * @return  self
         */ 
        public function setUsuarioId($usuarioId)
        {
            $this->usuarioId = $usuarioId;

            return $this;
        }

        /**
         * Get the value of senha
         */ 
        public function getSenha()
        {
            return $this->senha;
        }

        /**
         * Set the value of senha
         *
         * @return  self
         */ 
        public function setSenha($senha)
        {
            $this->senha = $senha;

            return $this;
        }
}