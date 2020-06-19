<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
    public function __construct(){
        parent::__construct();

        //REQUIRES\\
        require_once(APPPATH . 'libraries/content/Home.php');
        $this->load->library('session');
        $this->load->helper('file');

    }

    public function index(){
        $content = array(
            "jumbotron" => $this->jumbotron(),
        );
        $this->template->show('home.php', $content);
    }
    
    /*
    |--------------------------------------------------------------------------
    | Content
    |--------------------------------------------------------------------------
    | Funções que geram o conteúdo da página
    */
        private function jumbotron(){
            $jumbotron = $this->getJumbotron();
            return $jumbotron;
        }
    /*
    |--------------------------------------------------------------------------
    | Desktop
    |--------------------------------------------------------------------------
    | Requisicoes da aplicacao desktop
    | Seria necessário uma autenticacao para acessar esses métodos
    | Por ser um projeto didático e pela falta de tempo, não será colocado
    */
        public function desktopSetJumbotron(){
            $jumbotron = new Jumbotron;
            
            $jumbotron->setStatus($this->input->post("status"));
            $jumbotron->setTitulo($this->input->post("titulo"));
            $jumbotron->setSubtitulo($this->input->post("subtitulo"));
            $jumbotron->setTexto($this->input->post("texto"));
            $jumbotron->setBotao($this->input->post("botao"));
            $jumbotron->setBotaoStatus($this->input->post("botaoStatus"));

            $result = $this->setJumbotron($jumbotron);

            echo json_encode($result);
        }

        public function desktopGetJumbotron(){

            $jumbotron = $this->getJumbotron();
            
            $arrayJumbotron = array(
                "status" => $jumbotron->getStatus(),
                "titulo" => $jumbotron->getTitulo(),
                "subtitulo" => $jumbotron->getSubtitulo(),
                "texto" => $jumbotron->getTexto(),
                "botao" => $jumbotron->getBotao(),
                "botaoStatus" => $jumbotron->getBotaoStatus()
            );

            echo json_encode($arrayJumbotron);
        }
    /*
    |--------------------------------------------------------------------------
    | Private
    |--------------------------------------------------------------------------
    | Funcoes da classe
    */
        private function setJumbotron($jumbotron){
            if($jumbotron){
                $json = array(
                    "status" => $jumbotron->getStatus(),
                    "titulo" => $jumbotron->getTitulo(),
                    "subtitulo" => $jumbotron->getSubtitulo(),
                    "texto" => $jumbotron->getTexto(),
                    "botao" => $jumbotron->getBotao(),
                    "botaoStatus" => $jumbotron->getBotaoStatus()
                );
            }else{
                $json = array(
                    "status" => "0",
                    "titulo" => " ",
                    "subtitulo" => " ",
                    "texto" => " ",
                    "botao" => " ",
                    "botaoStatus" => "0"
                );
            }

            $result = write_file("assets/home/jumbotron.json", json_encode($json));
            return $result;
        }

        private function getJumbotron(){
            $json = read_file('assets/home/jumbotron.json');
            if(!$json){
                $this->setJumbotron(false);
            }
            $jsonDecoded = json_decode($json);
            
            $jumbotron = new Jumbotron;

            $jumbotron->setStatus($jsonDecoded->status);
            $jumbotron->setTitulo($jsonDecoded->titulo);
            $jumbotron->setSubtitulo($jsonDecoded->subtitulo);
            $jumbotron->setTexto($jsonDecoded->texto);
            $jumbotron->setBotao($jsonDecoded->botao);
            $jumbotron->setBotaoStatus($jsonDecoded->botaoStatus);

            return $jumbotron;
        }
}