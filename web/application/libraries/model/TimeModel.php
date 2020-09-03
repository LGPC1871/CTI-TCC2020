<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class TimeModel{
    private $id;
    private $nome;
    private $usuarioId;
    private $modalidadeId;

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
            if($this->getId()) $response['id'] = true;
            if($this->getNome()) $response['nome'] = true;
            if($this->getModalidadeId()) $response['modalidadeId'] = true;
            if($this->getUsuarioId()) $response['usuarioId'] = true;
            return $response;
        }
    /*
    |--------------------------------------------------------------------------
    | Get Set
    |--------------------------------------------------------------------------
    | Funções get e set
    */

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

        /**
         * Get the value of nome
         */ 
        public function getNome()
        {
            return $this->nome;
        }

        /**
         * Set the value of nome
         *
         * @return  self
         */ 
        public function setNome($nome)
        {
            $this->nome = $nome;

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
         * Get the value of modalidadeId
         */ 
        public function getModalidadeId()
        {
            return $this->modalidadeId;
        }

        /**
         * Set the value of modalidadeId
         *
         * @return  self
         */ 
        public function setModalidadeId($modalidadeId)
        {
            $this->modalidadeId = $modalidadeId;

            return $this;
        }
}