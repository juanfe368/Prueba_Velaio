<?php
    session_start();
    if($_SESSION['id']==null||$_SESSION['id']==''){
        echo header('Location: ../index.php');
    }
    
    $rutaActual = dirname(__FILE__).'/../php/';
    if($_POST['hidValueForm']==1){
        include_once '../php/class/Usuario.php';
        include_once '../php/class/Cliente.php';
        $usuario = new Usuario($_POST['txtCedula'], $_POST['txtCelular']);
        $cliente = new Cliente($_POST['txtNombre'], $_POST['txtApellido'], $_POST['txtCedula'], $_POST['txtCelular'], $_POST['txtDireccion'], $_POST['txtCorreo']);
//        var_dump($usuario);
//        var_dump($cliente);
//        exit;
        $respustUsuario = $usuario->insertClienteUsuario($rutaActual, $cliente, $usuario);
        if($respustUsuario){
            echo '<script>alert("Cliente guardado exitosamente");</script>';
            echo '<script>location.href="mainPag.php";</script>';
            exit;
        }
        else{
            echo '<script>alert("Ha ocurrido un problema en el servidor intentelo nuevamente");</script>';
        }
    }
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="../bootstrap/js/bootstrap.min.js">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="../css/styleCerulean.css">
        <script type="text/javascript" src="../js/validateFormCliente.js"></script>
    </head>
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                  </button>
                  <a class="navbar-brand text-center" href="#">Sistema Banco ABC</a>
                  <a class="navbar-brand text-right" href="../php/process/exitSession.php">Cerrar Sesión</a>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <div class="text-center">
                    <h2>Registrar Cliente</h2>
                </div>
                <div class="col-lg-8 col-md-offset-2">
                    <form class="form-vertical" method="POST" onsubmit="return respuestFormEstudiante();" action="">
                        <div class="form-group">
                            <label class="control-label">Nombre:</label>
                            <input type="text" class="form-control" id="txtNombre" name="txtNombre" placeholder="Nombre cliente">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Apellido:</label>
                            <input type="text" class="form-control" id="txtApellido" name="txtApellido" placeholder="Apellido cliente">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Cedula:</label>
                            <input type="number" class="form-control" id="txtCedula" name="txtCedula" placeholder="Cedula cliente">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Celular:</label>
                            <input type="number" class="form-control" id="txtCelular" name="txtCelular" placeholder="Celular cliente">
                        </div>
<!--                        <div class="form-group">
                            <label class="control-label">Teléfono:</label>
                            <input type="text" class="form-control" id="txtTelefono" name="txtTelefono" placeholder="Teléfono cliente">
                        </div>-->
                        <div class="form-group">
                            <label class="control-label">Dirección:</label>
                            <input type="text" class="form-control" id="txtDireccion" name="txtDireccion" placeholder="Dirección cliente">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Correo:</label>
                            <input type="text" class="form-control" id="txtCorreo" name="txtCorreo" placeholder="Correo cliente">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Contraseña:</label>
                            <input type="text" class="form-control" id="txtContrasenia" name="txtContrasenia" placeholder="Contraseña cliente">
                        </div>
                        <div class="form-group text-right">
                            <a href="mainPag.php" class="btn">Cancelar</a>
                            <button type="reset" class="btn">Limpiar</button>
                            <button type="submit" class="btn btn-primary" onclick="validateFormLogin();">Guardar</button>
                        </div>
                        <input type="hidden" id="hidValueForm" name="hidValueForm" value="0">
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
