<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class SenhaDAO extends DAO{
    public function __construct(){
        parent::__construct();
        $this->load->library('model/SenhaModel', 'senhaModel');
    }
    /*
    |--------------------------------------------------------------------------
    | FUNÇÕES
    |--------------------------------------------------------------------------
    | Funções do acesso de dados da classe
    */
        /**
         * Método getPassword
         * retorna senha do usuario
         * retorna false se a operacao falhar
         * retorna false se o usuário não existe
         * @param array $options
         * @return SenhaModel
         * @return false
         */
        public function getPassword($userId){
            if(!$userId) return false;
            
            $options['from'] = 'senha';
            $options['where'] = array('usuario_id' => $userId);
            $result = $this->read($options);

            if(!$result)return false;

            $senha = new SenhaModel();
            if(isset($result->id)) $senha->setId($result->id);
            if(isset($result->senha)) $senha->setSenha($result->senha);
            
            return $senha;
        }

        /**
         * Add password
         * @param userId
         * @param password
         * @return bool
         */
        public function addPassword($userId, $password){
            if(!$userId || !$password) return false;

            $atributos = array(
                'usuario_id' => $userId,
                'senha' => $password
            );
            $options = array(
                'table' => 'senha',
                'values' => $atributos
            );
            $this->create($options);

            return true;
        }
        /**
         * Método updatePassword
         * atualiza senha do usuário
         * retorna false se a operacao falhar
         * retorna false se o usuário não existe
         * @param array $options
         * @return SenhaModel
         * @return false
         */
        public function updatePassword($userId, $password){
            if(!$userId || !$password) return false;
            $atributos = array(
                'senha' => $password
            );
            $options = array(
                'table' => 'senha',
                'where' => array(
                    'usuario_id' => $userId
                ),
                'values' => $atributos
            );

            return $this->update($options);
        }
    }