<?php
    session_start();
    if(empty($_SESSION['id'])){
        echo header('Location: ../index.php');
        exit;
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
        <link rel="stylesheet" href="../bootstrap/js/bootstrap.min.js">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="../css/styleCerulean.css">
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
                  <a class="navbar-brand text-center" href="#">Sistema Administrativo del Banco ABC</a>
                  <a class="navbar-brand text-right" href="../php/process/exitSession.php">Cerrar Sesión</a>
                </div>
            </div>
        </nav>
        <div class="container">
            <?php if($_SESSION['tp']==1){?>
            <div class="row">
                <div class="col-lg-6 text-center">
                    <a href="FormRegistrarCliente.php" class="btn btn-primary btn-lg">Registrar Clientes</a>
                </div>
                <div class="col-lg-6 text-center">
                    <a href="FormRegistrarCuentas.php" class="btn btn-primary btn-lg">Registrar Cuentas</a>
                </div>
            </div>
            <?php } else if($_SESSION['tp']==2){
                    $rutaActual = dirname(__FILE__).'/../php/';
                    include_once '../php/class/Cuenta.php';
                    $materia = new Materia('', 0, '', '', '');
                    $respuestMaterias = $materia->getMaterias($rutaActual);
                    if($_POST['hidValEnviar']!=0){
                        $respuestInsertMateriaMatricula = $materia->insertMatriculaMateria($rutaActual, $_POST['hidValEnviar'], $_SESSION['id']);
                        if($respuestInsertMateriaMatricula){
                            ?>
                            <script>alert("Matrculada creada");</script>
                            <?php
                        }
                    }
                    $respuestMateriaEstudiante = $materia->getMateriasEstudiante($rutaActual, $_SESSION['id']);
                ?>
            <div class="col-lg-6">
                <legend>Matricular Materias</legend>
                <form class="form-vertical" method="POST" action="">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <!--<th>Código</th>-->
                                <th>Nombre</th>
                                <th>Cupos</th>
                                <th>Descripción</th>
                                <th>Horario</th>
                                <th>Profesor</th>
                            </tr>
                        </thead>
                        <?php while($row = mysql_fetch_array($respuestMaterias)) {?>
                        <tbody>
                            <tr>
                                <td>
                                    <input type="hidden" id="hidOcul<?php echo $row['idMateria']; ?>" name="hidOcul<?php echo $row['idMateria']; ?>" value="<?php echo $row['idMateria']; ?>">
                                    <button type="submit" id="<?php echo $row['idMateria'];?>" class="btn btn-primary" onclick="document.getElementById('hidValEnviar').value = document.getElementById('hidOcul<?php echo $row['idMateria'];?>').value">Matricular</button>
                                </td>
                                <td><?php echo $row['txtNombreMateria']; ?></td>
                                <td><?php echo $row['numCupMateria']; ?></td>
                                <td><?php echo $row['txtDescripMateria']; ?></td>
                                <td><?php echo $row['txtHorarioMateria']; ?></td>
                                <td><?php echo $row['txtProfesorMateria']; ?></td>
                            </tr>
                        </tbody>
                        <?php } ?>
                    </table>
                    <input type="hidden" id="hidValEnviar" name="hidValEnviar" value="0"/>
                </form>
            </div>
                <?php if($respuestMateriaEstudiante){ ?>
                    <div class="col-lg-6">
                        <legend>Materias Matriculadas</legend>
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>Código</th>
                                    <th>Nombre</th>
                                    <th>Cupos</th>
                                    <th>Descripción</th>
                                    <th>Horario</th>
                                    <th>Profesor</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                while ($row1 = mysql_fetch_array($respuestMateriaEstudiante)){ ?>
                                <tr>
                                    <td><?php echo $row1['idMateria']; ?></td>
                                    <td><?php echo $row1['txtNombreMateria']; ?></td>
                                    <td><?php echo $row1['numCupMateria']; ?></td>
                                    <td><?php echo $row1['txtDescripMateria']; ?></td>
                                    <td><?php echo $row1['txtHorarioMateria']; ?></td>
                                    <td><?php echo $row1['txtProfesorMateria']; ?></td>
                                </tr>
                            <?php } ?>
                            </tbody>
                        </table>
                    </div>
                <?php } ?>
            <?php } ?>
        </div>
    </body>
</html>
