<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class UsuarioTerceiroModel{
    private $terceiroId;
    private $usuarioId;
    private $id;

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
            if($this->getTerceiroId()) $response['terceiro_id'] = true;
            if($this->getUsuarioId()) $response['usuario_id'] = true;
            if($this->getId()) $response['id'] = true;
            
            return $response;
        }
    /*
    |--------------------------------------------------------------------------
    | Get Set
    |--------------------------------------------------------------------------
    | Funções get e set
    */
        /**
         * Get the value of terceiroId
         */ 
        public function getTerceiroId()
        {
            return $this->terceiroId;
        }

        /**
         * Set the value of terceiroId
         *
         * @return  self
         */ 
        public function setTerceiroId($terceiroId)
        {
            $this->terceiroId = $terceiroId;

            return $this;
        }

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
         * Get the value of id
         */ 
        public function getId()
        {
            return $this->id;
        }

        /**
         * Set the value of id
         *
         * @return  self
         */ 
        public function setId($id)
        {
            $this->id = $id;

            return $this;
        }
}