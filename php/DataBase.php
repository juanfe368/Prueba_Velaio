<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DataBase
 *
 * @author juanfe
 */
class DataBase {
    
    private $nameServer;
    private $nameDataBase;
    private $userDataBase;
    private $passwordDataBase;
    
    public function DataBase(){
        $this->nameServer = "localhost";
        $this->nameDataBase = "db_bank";
        $this->userDataBase = "root";
        $this->passwordDataBase  = "";
    }
    
    /**
     * Permite conectarse a la base de datos
     * @return mysql_connect Permite devolver la conexion a la base de datos
     */
    public function connectDataBase(){
        $connect = mysql_connect($this->nameServer, $this->userDataBase, $this->passwordDataBase);
        if($connect){
            mysql_select_db($this->nameDataBase, $connect);
            return $connect;
        }
        else{
            die('Error conectandose a la base de datos');
        }
    }
    
}
