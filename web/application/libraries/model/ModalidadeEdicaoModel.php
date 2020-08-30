<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class ModalidadeEdicaoModel{
    private $id;
    private $edicaoId;
    private $modalidadeId;
    private $status;
    private $modalidadeEdicaoStatusId;

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
         * Get the value of edicaoId
         */ 
        public function getEdicaoId()
        {
            return $this->edicaoId;
        }

        /**
         * Set the value of edicaoId
         *
         * @return  self
         */ 
        public function setEdicaoId($edicaoId)
        {
            $this->edicaoId = $edicaoId;

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

        /**
         * Get the value of status
         */ 
        public function getStatus()
        {
            return $this->status;
        }

        /**
         * Set the value of status
         *
         * @return  self
         */ 
        public function setStatus($status)
        {
            $this->status = $status;

            return $this;
        }

        /**
         * Get the value of modalidadeEdicaoStatusId
         */ 
        public function getModalidadeEdicaoStatusId()
        {
            return $this->modalidadeEdicaoStatusId;
        }

        /**
         * Set the value of modalidadeEdicaoStatusId
         *
         * @return  self
         */ 
        public function setModalidadeEdicaoStatusId($modalidadeEdicaoStatusId)
        {
            $this->modalidadeEdicaoStatusId = $modalidadeEdicaoStatusId;

            return $this;
        }
}