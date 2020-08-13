<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jumbotron{
    private $Status;
    private $titulo;
    private $subtitulo;
    private $texto;
    private $botao;
    private $botaoStatus;
    /*
    |--------------------------------------------------------------------------
    | Get Set
    |--------------------------------------------------------------------------
    | 
    */
        /**
         * Get the value of Status
         */ 
        public function getStatus()
        {
            return $this->Status;
        }

        /**
         * Set the value of Status
         *
         * @return  self
         */ 
        public function setStatus($Status)
        {
            $this->Status = $Status;

            return $this;
        }

        /**
         * Get the value of titulo
         */ 
        public function getTitulo()
        {
            return $this->titulo;
        }

        /**
         * Set the value of titulo
         *
         * @return  self
         */ 
        public function setTitulo($titulo)
        {
            $this->titulo = $titulo;

            return $this;
        }

        /**
         * Get the value of subtitulo
         */ 
        public function getSubtitulo()
        {
            return $this->subtitulo;
        }

        /**
         * Set the value of subtitulo
         *
         * @return  self
         */ 
        public function setSubtitulo($subtitulo)
        {
            $this->subtitulo = $subtitulo;

            return $this;
        }

        /**
         * Get the value of texto
         */ 
        public function getTexto()
        {
            return $this->texto;
        }

        /**
         * Set the value of texto
         *
         * @return  self
         */ 
        public function setTexto($texto)
        {
            $this->texto = $texto;

            return $this;
        }

        /**
         * Get the value of botao
         */ 
        public function getBotao()
        {
            return $this->botao;
        }

        /**
         * Set the value of botao
         *
         * @return  self
         */ 
        public function setBotao($botao)
        {
            $this->botao = $botao;

            return $this;
        }

        /**
         * Get the value of botaoStatus
         */ 
        public function getBotaoStatus()
        {
            return $this->botaoStatus;
        }

        /**
         * Set the value of botaoStatus
         *
         * @return  self
         */ 
        public function setBotaoStatus($botaoStatus)
        {
            $this->botaoStatus = $botaoStatus;

            return $this;
        }
}