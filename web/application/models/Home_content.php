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

        $this->jumbotron = 'HB_jumbotron';
            $this->jumbotron_id = 'HB_id';
            $this->jumbotron_status = 'HB_status';
            $this->jumbotron_titulo = 'HB_titulo';
            $this->jumbotron_subtitulo = 'HB_subtitulo';
            $this->jumbotron_texto = 'HB_texto';
            $this->jumbotron_textobotao = 'HB_textobotao';

        $this->galeria = 'GA_galeria';
            $this->galeria_id = 'GA_id';
            $this->galeria_midia = 'GA_midia';
            $this->galeria_titulo = 'GA_titulo';
            $this->galeria_subtitulo = 'GA_subtitulo';
            $this->galeria_descricao = 'GA_descricao';
            $this->galeria_data = 'GA_data';

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
        if($result->num_rows() > 0){
            foreach($result->result_array() as $row){
                $rowArray = array(
                    "id" =>$row[$this->carrossel_id],
                    "status" =>$row[$this->carrossel_status],
                    "imagem" =>$row[$this->carrossel_imagem],
                    "imagemalt" =>$row[$this->carrossel_imagemalt],
                    "legendatitulo" =>$row[$this->carrossel_legendatitulo],
                    "legendatexto" =>$row[$this->carrossel_legendatexto],
                );
                array_push($retorno, $rowArray);
            }
            return $retorno;
        }else{
            return false;
        }
    }
    function selectJumbotronData(){
        $this->db->select('*')
                ->from($this->jumbotron)
                ->where($this->jumbotron_status, true);
        $result = $this->db->get();
        if($result->num_rows() > 0){
            $data = $result->first_row('array');
    
            $retorno = array(
                "id" => $data[$this->jumbotron_id],
                "status" => $data[$this->jumbotron_status],
                "titulo" => $data[$this->jumbotron_titulo],
                "subtitulo" => $data[$this->jumbotron_subtitulo],
                "texto" => $data[$this->jumbotron_texto],
                "textobotao" => $data[$this->jumbotron_textobotao],
            );
            return $retorno;
        }else{
            return false;
        }
    }
    function selectPreviewGaleria(){
        $retorno = array();

        $this->db->select($this->galeria_midia);
        $this->db->from($this->galeria);
        $this->db->limit(4);

        $result = $this->db->get();
        
        if($result->num_rows() > 0){
            foreach($result->result_array() as $row){
                $rowArray = array(
                    "imagem" => $row[$this->galeria_midia]
                );
                array_push($retorno, $rowArray);
            }
            return $retorno;
        }else{
            return false;
        }
    }
}