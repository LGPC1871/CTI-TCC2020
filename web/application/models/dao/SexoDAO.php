<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class SexoDAO extends DAO{
    public function __construct(){
        parent::__construct();
        $this->load->library('model/SexoModel', 'sexoModel');
    }
    /*
    |--------------------------------------------------------------------------
    | FUNÇÕES
    |--------------------------------------------------------------------------
    | Funções do acesso de dados da classe
    */
    /**
     * Vai retornar todos os generos cadastrados,
     * util para preencher campos de formulario
     * @param null
     * @return ArrayObjects
     */
    public function carregarGeneros(){
        $options = array(
            "from" => "sexo",
            "return" => "multiple"
        );

        $result = $this->read($options);

        if(!$result) return false;

        $retorno = array();
        foreach($result as $StdObject){
            $object = new SexoModel();
            $object->setId($StdObject->id);
            $object->setNome($StdObject->nome);
            array_push($retorno, $object);
        }
        return $retorno;
    }

    /**
     * getSexo retorna uma linha da tabela
     * @param $options
     * @return row
     */
    public function getSexo($options = array()){
        $required = array(
            'where'
        );
        if(!$this->_required($required, $options, 1)) return false;

        $options['from'] = 'sexo';

        $result = $this->read($options);

        if(!$result)return false;

        $sexo = new SexoModel();
        if(isset($result->id)) $sexo->setId($result->id);
        if(isset($result->nome)) $sexo->setNome($result->nome);

        return $sexo;
    }
}