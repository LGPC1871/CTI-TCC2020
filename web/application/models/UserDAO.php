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
        public function selectExist($select, $table, $where, $value){
            $this->db
                ->select($select)
                ->from($table)
                ->where($where, $value);
            $result = $this->db->get();

            return $result->num_rows() == 1 ? $result->row($select) : false;
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

        function selectResetPassword($selector, $currentDate){
            $this->db->select('*');
            $this->db->from("senha_reset");
            $this->db->where("selector", $selector);
            //$this->db->where($this->senhareset_expires . '>=', $currentDate);
    
            $result = $this->db->get();
    
            if($result->num_rows() == 1){
                $data = $result->row_array();

                $retorno = new PasswordTokenModel();
                $retorno->setUsuarioId($result->row("usuario_id"));
                $retorno->setSelector($result->row("selector"));
                $retorno->setToken($result->row("token"));
                $retorno->setExpire($result->row("expires"));

                return $retorno;
            }else{
                return false;
            }
        }

    /*
    |--------------------------------------------------------------------------
    | INSERT
    |--------------------------------------------------------------------------
    | Todas as funções insert
    */
        function insertNewUser($userData, $passwordHash){
            $newUserId = $this->insertUser($userData);
            if($newUserId){
                $pwInsert = $this->insertPassword($newUserId, $passwordHash);
                if(!$pwInsert){
                    $this->deleteNewUser($newUserId);
                    return false;
                }
                return true;
            }else{
                return false;
            }
        }
        private function insertUser($userData){
            $time = date("Y-m-d H:i:s");
    
            $this->db->set("ra", $userData->getRa());
            $this->db->set("email", $userData->getEmail());
            $this->db->set("nome", $userData->getNome());
            $this->db->set("sobrenome", $userData->getSobrenome());
            $this->db->set("created", $time);
            $this->db->set("updated", $time);
    
            return $this->db->insert('usuario') ? $this->db->insert_id() : false;
        }
        private function insertPassword($id, $passwordHash){
            $this->db->set("usuario_id", $id);
            $this->db->set("senha", $passwordHash);
            return $this->db->insert('senha') ? true : false;
        }

        public function insertPasswordResetToken($userId, $tokenModel){
            $this->db->set("usuario_id", $userId);
            $this->db->set("selector", $tokenModel->getSelector());
            $this->db->set("token", $tokenModel->getToken());
            $this->db->set("expire", $tokenModel->getExpire());

            return $this->db->insert('senha_reset') ? true : false;
        }
    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    | Todas as funções delete
    */

        function deleteNewUser($id){
            $this->db->where('id', $id);
            $this->db->delete('usuario');
        }

        function deletePasswordToken($userId){
            $this->db->where("usuario_id", $userId);
            $this->db->delete("senha_reset");
        }
    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    | Todas as funções update
    */
        function updateUserPassword($userId, $password){
            $this->db->set("senha", $password);
            $this->db->where("usuario_id", $userId);
            $this->db->update("senha");
            return $this->db->affected_rows();
        }
}