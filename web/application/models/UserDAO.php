<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class UserDAO extends CI_Model{
    public function __construct(){
        parent::__construct();
    }

    /*
    |--------------------------------------------------------------------------
    | SELECT
    |--------------------------------------------------------------------------
    | Todas as funções select
    */
        public function selectUserExist($ra){
            $this->db
                ->select('id')
                ->from('usuario')
                ->where('ra', $ra);
            $result = $this->db->get();

            return $result->num_rows() == 1 ? $result->row("id") : false;
        }

        public function selectPassword($userId){
            $this->db
                ->select('senha')
                ->from('senha')
                ->where('usuario_id', $userId);
            $result = $this->db->get();

            return $result->num_rows() == 1 ? $result->row("senha") : false;
        }

        public function selectUserData($userId){
            $this->db
            ->select('*')
            ->from('usuario')
            ->where('id', $userId);
            $result = $this->db->get();
            if($result->num_rows() == 1){
                $userData = new UsuarioModel();

                $userData->setId($result->row('id'));
                $userData->setRa($result->row('ra'));
                $userData->setEmail($result->row('email'));
                $userData->setNome($result->row('nome'));
                $userData->setSobrenome($result->row('sobrenome'));
                $userData->setPicture($result->row('picture'));
                $userData->setTurmaId($result->row('turma_id'));

                return $userData;
            }
            return false;
        }
}