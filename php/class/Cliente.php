<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Cliente
 *
 * @author juanfe
 */
class Cliente {
    
    private $txtNombreCliente;
    private $txtApellidoCliente;
    private $txtCedulaCliente;
    private $txtCelularCliente;
    //private $txtTelefonoCliente;
    private $txtDireccionCliente;
    private $txtCorreoCliente;
    
    public function Cliente($pNombre, $pApellido, $pCedula, $pCeular, $pDireccion, $pCorreo) {
        $this->txtNombreCliente = $pNombre;
        $this->txtApellidoCliente = $pApellido;
        $this->txtCedulaCliente = $pCedula;
        $this->txtCelularCliente = $pCeular;
        //$this->txtTelefonoCliente = $pTelefono;
        $this->txtDireccionCliente = $pDireccion;
        $this->txtCorreoCliente = $pCorreo;
    }
    
    
    public function insertCliente($ruta,$objCliente) {
        include_once($ruta.'DataBase.php');
        $conexion = new DataBase();
        $linkDb = $conexion->connectDataBase();
        $sqlInsert  = "INSERT INTO `tbl_clientes`
                            (`txtNombre`,
                            `txtApellido`,
                            `txtCedula`,
                            `txtTelefono`,
                            `txtDireccion`,
                            `txtEmail`)
                        VALUES
                            ('$objCliente->txtNombreCliente',
                            '$objCliente->txtApellidoCliente',
                            '$objCliente->txtCedulaCliente',
                            '$objCliente->txtCelularCliente',
                            '$objCliente->txtDireccionCliente',
                            '$objCliente->txtCorreoCliente');";
        $respuestInserte = mysql_query($sqlInsert);
        echo $sqlInsert;
        return $respuestInserte;
    }
    
}
