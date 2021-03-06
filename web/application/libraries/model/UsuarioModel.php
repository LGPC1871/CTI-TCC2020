<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class UsuarioModel{
    private $id;
    private $ra;
    private $email;
    private $nome;
    private $sobrenome;
    private $picture;
    private $created;
    private $updated;
    private $turmaId;

    public function __construct(){
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
         * Get the value of ra
         */ 
        public function getRa()
        {
            return $this->ra;
        }

        /**
         * Set the value of ra
         *
         * @return  self
         */ 
        public function setRa($ra)
        {
            $this->ra = $ra;

            return $this;
        }

        /**
         * Get the value of email
         */ 
        public function getEmail()
        {
            return $this->email;
        }

        /**
         * Set the value of email
         *
         * @return  self
         */ 
        public function setEmail($email)
        {
            $this->email = $email;

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
         * Get the value of sobrenome
         */ 
        public function getSobrenome()
        {
            return $this->sobrenome;
        }

        /**
         * Set the value of sobrenome
         *
         * @return  self
         */ 
        public function setSobrenome($sobrenome)
        {
            $this->sobrenome = $sobrenome;

            return $this;
        }

        /**
         * Get the value of created
         */ 
        public function getCreated()
        {
            return $this->created;
        }

        /**
         * Set the value of created
         *
         * @return  self
         */ 
        public function setCreated($created)
        {
            $this->created = $created;

            return $this;
        }

        /**
         * Get the value of updated
         */ 
        public function getUpdated()
        {
            return $this->updated;
        }

        /**
         * Set the value of updated
         *
         * @return  self
         */ 
        public function setUpdated($updated)
        {
            $this->updated = $updated;

            return $this;
        }

        /**
         * Get the value of turmaId
         */ 
        public function getTurmaId()
        {
            return $this->turmaId;
        }

        /**
         * Set the value of turmaId
         *
         * @return  self
         */ 
        public function setTurmaId($turmaId)
        {
            $this->turmaId = $turmaId;

            return $this;
        }

    /**
     * Get the value of picture
     */ 
    public function getPicture()
    {
        return $this->picture;
    }

    /**
     * Set the value of picture
     *
     * @return  self
     */ 
    public function setPicture($picture)
    {
        $this->picture = $picture;

        return $this;
    }
}