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
class Cuenta {
    
    private $idCliente;
    private $txtDinero;
    private $ultimaActualizacion;


    public function Cuenta($pIdCliente, $pDinero, $pUltimaDate) {
        
        $this->idCliente = $pNombre;
        $this->txtDinero = $pNumCup;
        $this->ultimaActualizacion = $pDescripMa;
        
    }
    
    public function insertCuenta($ruta, $objCuenta) {
        include_once($ruta.'DataBase.php');
        $conexion = new DataBase();
        $linkDb = $conexion->connectDataBase();
        $sqlInsertCliente = "INSERT INTO `tbl_cuenta`
                                (`idCliente`,
                                `txtDinero`,
                                `txtUltimaActuali`)
                            VALUES
                                ('$objCuenta->idCliente',
                                '$objCuenta->txtDinero',
                                '$objCuenta->ultimaActualizacion');";
        $respuestInsert = mysql_query($sqlInsertCliente);
        return $respuestInsert;
        
    }
    
    public function getCuenta($ruta) {
        include_once($ruta.'DataBase.php');
        $conexion = new DataBase();
        $linkDb = $conexion->connectDataBase();
        $sqlSelectCliente = "SELECT 
                                idCuenta,
                                txtNombreCuenta,
                                numCupCuenta,
                                txtDescripCuenta,
                                txtHorarioCuenta,
                                txtProfesorCuenta
                            FROM 
                                tblCuenta;";
        $respuestCuentas = mysql_query($sqlSelectCuenta);
        return $respuestCuenta;
    }
    
    public function insertClienteCuenta($ruta, $idCuenta, $idCliente){
        include_once($ruta.'DataBase.php');
        $conexion = new DataBase();
        $linkDb = $conexion->connectDataBase();
        $sqlInsertClienteCuenta = "INSERT INTO `insertCuentas`
                                            (`idCliente`,
                                            `idCliente`)
                                        VALUES
                                            ($idCuenta,
                                            $idCliente);";
        $respuestCuentaCliente = mysql_query($sqlInsertClienteCuenta);
        return $respuestCuentaCliente;
    }
    
    public function getCuentasClientes($ruta, $idCliente) {
        include_once($ruta.'DataBase.php');
        $conexion = new DataBase();
        $linkDb = $conexion->connectDataBase();
        $sqlSelect  = "SELECT 
                            tbl_cuenta.idCuenta,
                            tbl_cuenta.txtDinero
                            tbl_clientes.idtbl_clientes,
                            tbl_clientes.txtNombre
                        FROM
                                tbl_cuenta
                                    INNER JOIN
                                tbl_clientes ON tbl_cuenta.idCliente = tbl_clientes.idtbl_clientes
                        WHERE
                                tbl_clientes.txtCedula = $cedulaCliente;";
        $respuestClienteCuenta = mysql_query($sqlSelect);
        return $respuestCuentaCliente;
    }
    
}
