<?php
require_once "config/database.php";
?>

<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta content ='width=device-width, intal-scale=1, maximun-scale=1, user-scalable=yes' name='viewport' >
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="description" content="SERVISOFT">
<meta name="autor" content="Hector Peralta">

<link rel="shortcut icon" href="assets/img/frio_2.png">

<link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="assets/plugins/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="assets/css/AdminLTE.min.css" rel="stylesheet" type="text/css" >
<link href="assets/css/style.css" rel="stylesheet" type="text/css" >
<title>SERVISOFT TALLER</title>
<body style="background:#fff">
    <div class="login-box">
        <div style="color:#3c8dbc" class="login-logo">

            <img style="margin-top=-15px" src="assets/img/frio_2.png" 
            alt="SERVISOFT" heigth="120" width="120">

            <b>Area Virtual</b>
        </div>
    
    <?php
    if(empty($_GET['alert'])){
        echo"";
    }
    else if($_GET['alert']==1){
        echo "<div class='alert alert-danger' role='alert'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h3> <i class='icon fa fa-times-circle'></i>Error al iniciar sesion</h3>
                Usuario o contraseña incorrecta, vuelva a ingresar sus datos.
            </div>";
    }
    else if($_GET['alert']==2){
        echo"<div class='alert alert-success alert-dismissable'>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
        <h4> <i class='icon fa fa-times-circle'></i>Salida Exitosa!</h4>
        Has cerrado tu sesion correctamente.
        </div>";
    }
    else if($_GET['alert']==3){
        echo"<div class='alert alert-danger' role='alert'>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
        <h4> <i class='icon fa fa-times-circle'></i>Error!</h4>
        Ingresar usuario y contraseña validos
        </div>";
    }
    else if($_GET['alert']==4){
        echo"<div class='alert alert-danger' role='alert'>
        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
        <h4> <i class='icon fa fa-times-circle'></i>Error!</h4>
        Usuario Bloqueado, contactese con TI.
        </div>";
    }
    ?>
        <div class="login-box-body" style="border: 1.5px solid gray;border-top: 3.5px solid #00C19B"><!--el color de la barra-->
            <p class="login-box-msg">
                <i class="fa fa icon-title"></i>
                Por favor inicie sesión
            </p>
            <br>
            <form action="login-check.php" method="POST">
                
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name="username" placeholder="Usuario" autocomplete="off" required>
                    <span class="glyphicon glyphicon-user form-control-feedback">
                </div>

                <div class="form-group has-feedback">
                    <input type="password" class="form-control" name="password" placeholder="Contraseña" autocomplete="off" required>
                    <span class="glyphicon glyphicon-lock form-control-feedback">
                </div>
                <br>
                <div class=row>
                    <div class="col-xs-12">
                        <input type="submit" class="btn btn-primary btn-lg btn-block btn-flat" name="login" value="Ingresar">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
</body>
</html>

