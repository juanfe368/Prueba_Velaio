<?php
    ob_start();
    session_start();
    if($_POST['hidVal']==1){
        $ruta  = dirname(__FILE__)."/php/";
        include_once './php/class/Usuario.php';
        $usuario = new Usuario($_POST['inputUsuario'], $_POST['inputPassword']);
        $respuestUsuario = $usuario->functionLogin($ruta, $usuario);
        if($respuestUsuario){
            //header('Location: pagApp/mainPag.php');
            echo '<script>location.href="pagApp/mainPag.php"</script>';
            exit;
        }
        else{
            echo '<script>alert("Datos invalidos intentelo nuevamente")</script>';
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
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <link rel="stylesheet" href="bootstrap/js/bootstrap.min.js">
        <link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/styleCerulean.css">
        <script type="text/javascript" src="js/validateFormLogin.js"></script>
        <title>Sistema de Matricula de Materias</title>
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
                  <a class="navbar-brand text-center" href="#">Universidad Nacional Abierta y a Distancia</a>
                </div>
            </div>
        </nav>
        <div class="container">
            <div class="row">
                <form class="form-horizontal" method="POST" onsubmit="return respuestFormLogin();" action="">
                    <fieldset>
                      <legend>Autenticación de Usuario</legend>
                      <div class="form-group">
                        <label for="inputUsuario" class="col-lg-2 control-label">Nombre Usuario</label>
                        <div class="col-lg-10">
                            <input type="text" class="form-control" id="inputUsuario" name="inputUsuario" placeholder="Usuario">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="inputPassword" class="col-lg-2 control-label">Password</label>
                        <div class="col-lg-10">
                            <input type="password" class="form-control" id="inputPassword" name="inputPassword" placeholder="Password">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-lg-10 col-lg-offset-2">
                          <button type="reset" class="btn btn-default">Cancel</button>
                          <button type="submit" value="Aceptar" class="btn btn-primary" onclick="validateFormLogin();">Aceptar</button>
                        </div>
                      </div>
                    </fieldset>
                    <input type="hidden" id="hidVal" name="hidVal" value="0">
                </form>
            </div>
        </div>
    </body>
</html>
