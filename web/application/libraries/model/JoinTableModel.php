<?php defined('BASEPATH') OR exit('No direct script access allowed'); 

class JoinTableModel{
    private $columns = array();

    /**
     * Get value of a column
     */
    public function getColumn($column){
        return $this->columns[$column];
    }

    /**
     * Get the value of columns
     */ 
    public function getColumns()
    {
        return $this->columns;
    }

    /**
     * Set the value of columns
     *
     * @return  self
     */ 
    public function setColumns($columns)
    {
        $this->columns = $columns;

        return $this;
    }
}