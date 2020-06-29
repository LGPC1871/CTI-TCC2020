<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class DAO extends CI_Model{
    public function __construct(){
        parent::__construct();
    }
    /*
    |--------------------------------------------------------------------------
    | PROTECTED
    |--------------------------------------------------------------------------
    | Todas as funções de herança da classe
    */
        /**
         * método _require retorna falso se o array $inputData NÃO conter algum
         * dos parâmetros contidos no array $required
         * @param array $required
         * @param array $inputData
         * @param int $caso
         * @return bool
         */
        protected function _required($required, $inputData, $caso){
            //verifica se a chave existe e possui valor diferente de null
            if($caso == 1){
                foreach($required as $field) if(!isset($inputData[$field])) return false;
            }
            //verifica se a chave existe
            else if($caso == 2){
                foreach($required as $key=>$value) if(!array_key_exists($value, $inputData)) return false;
            }else{
                return false;
            }
            return true;
        }

        /**
         * método _default mescla o array $options com o array $default
         * A ideia é passar valores padrão para uma função.
         * se algum valor for especificado em $options, substitui o valor
         * padrao em $default
         * @param array $defaults
         * @param array $options
         * @return array
         */
        protected function _default($defaults, $options){
            return array_merge($defaults, $options);
        }
    /*
    |--------------------------------------------------------------------------
    | CRUD
    |--------------------------------------------------------------------------
    | Funções CRUD básicas, implemente funções mais robustas e específicas
    | na própria classe usada
    */
        /**
         * Método create
         * executa um insert na tabela especificada
         * retorna false se o insert falhar
         * retorna o id do insert
         * @param array $options
         * @return boolean
         * @return int
         */
        protected function create($options = array()){
            $required = array(
                'table',
                'values'
            );
            if(!$this->_required($required, $options, 1)) return false;
            
            $default = array(
                'return' => 'id'
            );
            $options = $this->_default($default, $options);

            $table = $options['table'];
            $values = $options['values'];

            foreach($values as $campo=>$valor){
                $this->db->set($campo, $valor);
            }
            
            $this->db->insert($table);

            if($options['return'] == 'id'){
                return $this->db->insert_id();
            }
            if($options['return'] == 'boolean'){
                return true;
            }
            
        }
        /**
         * Método read
         * executa um select na tabela especificada
         * retorna false se o select falhar
         * @param array $options
         * @return object
         * @return false
         */
        protected function read($options = array()){
            $required = array(
                'from'
            );
            if(!$this->_required($required, $options, 1)) return false;
            
            $defaultOptions = array(
                'select' => array('*'),
                'where' => array(0 => 0),
                'like' => array(0 => 0),
                'return' => 'row',
                'join' => null /*array(0 => array())*/
            );
            $options = $this->_default($defaultOptions, $options);
            
            $select = $options['select'];
            $from = $options['from'];
            $where = $options['where'];
            $like = $options['like'];
            
            foreach($where as $campo=>$valor){
                $this->db->where($campo, $valor);
            }
            foreach($like as $campo=>$valor){
                $this->db->like($campo, $valor);
            }
            foreach($select as $key=>$valor){
                $this->db->select($valor);
            }
            if(isset($options['join'])){
                $join = $options['join'];
                foreach($join as $joinOptions){
                    $this->db->join($joinOptions['table'], $joinOptions['on'], $joinOptions['join']);
                }
            }
            $this->db->from($from);
            
            $result = $this->db->get();
            
            //@return
            if($options['return'] == 'row'){
                if(!$result->num_rows() == 1) return false;
                return $result->row();
            }
            if($options['return'] == 'multiple'){
                return $result->result();
            }
            if($options['return'] == 'array'){
                return $result->result_array();
            }

        }
        /**
         * Método update
         * executa um update na tabela especificada
         * retorna false se o update falhar
         * @param array $options
         * @return bool
         */
        protected function update($options = array()){
            $required = array(
                'table',
                'where',
                'values'
            );
            if(!$this->_required($required, $options, 1)) return false;

            $table = $options['table'];
            $where = $options['where'];
            $values = $options['values'];

            foreach($where as $campo=>$valor){
                $this->db->where($campo, $valor);
            }
            foreach($values as $campo=>$valor){
                $this->db->set($campo, $valor);
            }

            return $this->db->update($table) ? true : false;
        }
        /**
         * Método delete
         * executa um delete na tabela especificada
         * retorna false se a operacao falhar
         * @param array $options
         * @return bool
         */
        protected function delete($options = array()){
            $required = array(
                'table',
                'where'
            );
            if(!$this->_required($required, $options, 1)) return false;

            $table = $options['table'];
            $where = $options['where'];

            foreach($where as $campo=>$valor){
                $this->db->where($campo, $valor);
            }

            $this->db->delete($table);

            return true;
        }
}