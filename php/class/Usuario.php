<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author juanfe
 */
class Usuario {
    //put your code here
    
    private $txtUsuario;
    private $txtPassWord;
    
    public function Usuario($pUsuario, $pPassword) {
        $this->txtUsuario = $pUsuario;
        $this->txtPassWord = $pPassword;
    }
    
    public function functionLogin($ruta, $objUsuario){
        include $ruta.'DataBase.php';
        $conexion = new DataBase();
        $linkDb = $conexion->connectDataBase();
        $txtUsuario = $objUsuario->txtUsuario;
        $respuest = false;
        $passWordMd5 = md5($objUsuario->txtPassWord);
        $sqlLogin = "SELECT 
                        *
                    FROM
                        tbl_Usuario
                    WHERE
                        txtUsuario = '$txtUsuario'
                            AND txtClave = '$passWordMd5';";
        $respuesLogin = mysql_query($sqlLogin);
        if($respuesLogin){
            //session_start();
            $arrayLogin = mysql_fetch_assoc($respuesLogin);
            $_SESSION['id'] = $arrayLogin['idtbl_Usuario'];
            $_SESSION['tp'] = $arrayLogin['id_rol'];
        }
        if($_SESSION['id']!=''&&$_SESSION['tp']!=''){
            $respuest = true;
        }
        return $respuest;
    }
    
    public function insertUsuario($ruta, $idUsuario,$objUsuario){
        include_once($ruta.'DataBase.php');
        $conexion = new DataBase();
        $linkDb = $conexion->connectDataBase();
        $sqlInsertUsuario = "INSERT INTO `tbl_Usuario`
                                (`idtbl_Usuario`,
                                `txtUsuario`,
                                `txtClave`,
                                `id_rol`)
                            VALUES
                                ($idUsuario,
                                '$objUsuario->txtUsuario',
                                '".md5($objUsuario->txtPassWord)."',
                                2);";
        $respuestUsuario = mysql_query($sqlInsertUsuario);
        echo $sqlInsertUsuario;
        return $respuestUsuario;
    }
    
    public function insertClienteUsuario($ruta, $objCliente, $objUsuario) {
        include_once $ruta.'DataBase.php';
        $conexion = new DataBase();
        $linkDb = $conexion->connectDataBase();
        //transaction
        mysql_query("SET AUTOCOMMIT=0");
        mysql_query("START TRANSACTION");
        $respuestCliente = $objCliente->insertCliente($ruta,$objCliente);
        $idCliente = mysql_insert_id();
        $respuestUsuario = $this->insertUsuario($ruta, $idCliente, $objUsuario);
        $respuestInsert = false;
        if($respuestCliente&&$respuestUsuario){
            mysql_query("COMMIT");
            mysql_query("SET AUTOCOMMIT=1");
            $respuestInsert = true;
        }
        else{
            mysql_query("ROLLBACK");
            mysql_query("SET AUTOCOMMIT=1");
        }
        return $respuestInsert;
        
    }
    
}
