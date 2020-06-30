<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class UsuarioDAO extends DAO{
    public function __construct(){
        parent::__construct();
        $this->load->library('model/UsuarioModel', 'usuarioModel');
    }
    /*
    |--------------------------------------------------------------------------
    | FUNÇÕES
    |--------------------------------------------------------------------------
    | Funções do acesso de dados da classe
    */
        /**
         * Método addUser
         * insere um novo registro na tabela @usuario
         * retorna false se o insert falhar
         * @param array $input
         * @return int $newUserId
         * @return false
         */
        public function addUser($input = array()){
            //verificar se input bate com requisitos
            $requiredInput = array(
                'usuarioModel',
            );
            if(!$this->_required($requiredInput, $input, 1)) return false;

            $usuario = $input['usuarioModel'];

            //verificar se o objeto bate com os requisitos
            $requiredUsuario = array(
                "ra",
                "email",
                "nome",
            );
            $usuarioAttr = $usuario->_verifyObjectAttr();
            if(!$this->_required($requiredUsuario, $usuarioAttr, 2)) return false;
            
            //preparar options para o insert
            $time = date("Y-m-d H:i:s");
            $atributos = array(
                'ra' => $usuario->getRa(),
                'email' => $usuario->getEmail(),
                'nome' => $usuario->getNome(),
                'sobrenome' => $usuario->getSobrenome(),
                'created' => $time,
                'updated' => $time
            );

            $options = array(
                'table' => 'usuario',
                'values' => $atributos
            );
            
            $newUserId = $this->create($options);
            if(!$newUserId) return false;

            return $newUserId;
        }

        /**
         * Método getUser
         * retorna um objeto de um único usuário
         * retorna false se a operacao falhar
         * retorna false se o usuário não existe
         * @param array $options
         * @return UsuarioModel
         * @return false
         */
        public function getUser($options = array()){
            $required = array(
                'where'
            );
            if(!$this->_required($required, $options, 1)) return false;
            
            $options['from'] = 'usuario';

            $result = $this->read($options);

            if(!$result)return false;

            $usuario = new UsuarioModel();
            if(isset($result->id)) $usuario->setId($result->id);
            if(isset($result->ra)) $usuario->setRa($result->ra);
            if(isset($result->email)) $usuario->setEmail($result->email);
            if(isset($result->nome)) $usuario->setNome($result->nome);
            if(isset($result->sobrenome)) $usuario->setSobrenome($result->sobrenome);
            
            return $usuario;
        }
        
        /**
         * Método removeUser
         * remove um registro da tabela @usuario
         * retorna false se o delete falhar
         * @param array $input
         * @return boolean
         * @return false
         */
        public function removeUser($input = array()){
            $required = array(
                'where'
            );
            if(!$this->_required($required, $input, 1)) return false;
            
            $input['table'] = 'usuario';

            $result = $this->delete($input);

            return $result;
        }

}