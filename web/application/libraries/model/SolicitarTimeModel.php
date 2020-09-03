<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class SolicitarTimeModel{
    private $timeId;
    private $usuarioId;
    private $recusado;

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
            if($this->getTimeId()) $response['time_id'] = true;
            if($this->getUsuarioId()) $response['usuario_id'] = true;
            if($this->getRecusado()) $response['recusado'] = true;
            
            return $response;
        }
    /*
    |--------------------------------------------------------------------------
    | Get Set
    |--------------------------------------------------------------------------
    | Funções get e set
    */

        /**
         * Get the value of timeId
         */ 
        public function getTimeId()
        {
            return $this->timeId;
        }

        /**
         * Set the value of timeId
         *
         * @return  self
         */ 
        public function setTimeId($timeId)
        {
            $this->timeId = $timeId;

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
         * Get the value of recusado
         */ 
        public function getRecusado()
        {
            return $this->recusado;
        }

        /**
         * Set the value of recusado
         *
         * @return  self
         */ 
        public function setRecusado($recusado)
        {
            $this->recusado = $recusado;

            return $this;
        }
}