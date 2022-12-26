<?php 
require_once "../../../config/database.php";

$ci_a= $_POST['ci_a'];
$ci_b= $_POST['ci_b'];

if(empty($ci_a) && empty($ci_b)){
    $ci_a= 1;
    $ci_b= 999999999999999999;

}

$query = mysqli_query($mysqli, "SELECT * FROM clientes where cli_ci between $ci_a and $ci_b")
    or die('Error'.mysqli_error($mysqli));

$count = mysqli_num_rows($query);    
?>

<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Reporte de Paciente</title>
        <link rel="stylesheet" type="text/css" href="../../../assets/img/favicon.ico">
    </head>
    <body>
        <div  style="background-color:#58FAAC; color:#fff">
        <div align="left">
            <img src="../../../images/logo_pagus.png">
        </div>

        <div align="center">
            Reporte de Clientes
        </div>
        <div align="center">
            Cantidad: <?php echo $count; ?>
        </div>
        </div>
        <hr>
        <div id="tabla">
            <table width="100%" border="0.3" cellpadding="0" cellspacing="0" align="center">
                <thead style="background:#e8ecee">
                    <tr class="table-title">
                        <th height="30" align="center" valign="middle"><small>C.I</small></th>                      
                        <th height="30" align="center" valign="middle"><small>Nombre</small></th>                      
                        <th height="30" align="center" valign="middle"><small>Apellido</small></th> 
                        <th height="30" align="center" valign="middle"><small>Direccion</small></th>       
                        <th height="30" align="center" valign="middle"><small>Telefono</small></th> 
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while ($datal = mysqli_fetch_assoc($query)){
                            $ci = $datal['cli_ci'];
                            $nombre = $datal['cli_nom'];
                            $apellido = $datal['cli_ape'];
                            $direccion = $datal['cli_dir'];
                            $telefono = $datal['cli_tel'];

                            echo "<tr>
                            <td width='145' align='left'>$ci</td>
                            <td width='145' align='left'>$nombre</td>
                            <td width='145' align='left'>$apellido</td>
                            <td width='145' align='left'>$direccion</td>
                            <td width='145' align='left'>$telefono</td>
                            </tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>