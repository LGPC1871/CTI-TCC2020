<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_content extends CI_Model{

    function __construct(){
        parent::__construct();

        $this->carrossel = 'HA_carrossel';
            $this->carrossel_id = 'HA_id';
            $this->carrossel_status = 'HA_status';
            $this->carrossel_imagem = 'HA_imagem';
            $this->carrossel_imagemalt = 'HA_imagemalt';
            $this->carrossel_legendatitulo = 'HA_legendatitulo';
            $this->carrossel_legendatexto = 'HA_legendatexto';
    }
/*
|--------------------------------------------------------------------------
| SELECT
|--------------------------------------------------------------------------
| Todas as funções select que nao alteram o banco de dados
*/
    function selectCarrosselData(){
        $retorno = array();
        $this->db->select('*')
                ->from($this->carrossel)
                ->where($this->carrossel_status, true);
        $result = $this->db->get();
        foreach($result->result_array() as $row){
            array_push($retorno, $row);
        }

        return $retorno;
    }
}