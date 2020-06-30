<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Util{
    
    public function __construct(){
    }
    /*
    |--------------------------------------------------------------------------
    | Private
    |--------------------------------------------------------------------------
    | Funções private
    */

    public function checkInputEmpty($inputArray = array()){
        $status = true;
        $resultArray = array("error_list" => array());
        foreach($inputArray as $key => $value){
            if(empty($value) || ctype_space($value)){
                $status = false;
                array_push($resultArray["error_list"], $key);
            }
        }
        return $status ? false : $resultArray;
    }

    public function validateInputRegex($pattern, $inputArray = array()){

        $status = true;
        $resultArray = array("error_list" => array());
        
        foreach($inputArray as $key => $value){
            if(preg_match($pattern, $value)){
                $status = false;
                array_push($resultArray["error_list"], $key);
            }
        }
        return $status ? false : $resultArray;
    }

}
