<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class SenhaResetModel{
    private $usuarioId;
    private $selector;
    private $token;
    private $expire;

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
         * @param this
         * @return array
         */
        public function _verifyObjectAttr(){
            $response = array();
            if($this->getUsuarioId()) $response['usuario_id'] = true;
            if($this->getSelector()) $response['selector'] = true;
            if($this->getToken()) $response['token'] = true;
            if($this->getExpire()) $response['expire'] = true;
            
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
         * Get the value of selector
         */ 
        public function getSelector()
        {
            return $this->selector;
        }

        /**
         * Set the value of selector
         *
         * @return  self
         */ 
        public function setSelector($selector)
        {
            $this->selector = $selector;

            return $this;
        }

        /**
         * Get the value of token
         */ 
        public function getToken()
        {
            return $this->token;
        }

        /**
         * Set the value of token
         *
         * @return  self
         */ 
        public function setToken($token)
        {
            $this->token = $token;

            return $this;
        }

        /**
         * Get the value of expire
         */ 
        public function getExpire()
        {
            return $this->expire;
        }

        /**
         * Set the value of expire
         *
         * @return  self
         */ 
        public function setExpire($expire)
        {
            $this->expire = $expire;

            return $this;
        }
}