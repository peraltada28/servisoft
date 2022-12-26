<?php 
require_once "../../config/database.php";

$query = mysqli_query($mysqli, "SELECT * FROM sucursal")
    or die('Error'.mysqli_error($mysqli));

$count = mysqli_num_rows($query);    
?>

<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Reporte de Sucursal</title>
        <link rel="stylesheet" type="text/css" href="../../assets/img/favicon.ico">
    </head>
    <body>
        <div align="left">
            <img src="../../images/logo_pagus.png">
        </div>
        <div align="center">
            Reporte de sucursal
        </div>
        <div align="center">
            Cantidad: <?php echo $count; ?>
        </div>
        <hr>
        <div id="tabla">
        <table width="100%" border="0.3" cellpadding="0" cellspacing="0" align="center">
                <thead style="background:#e8ecee">
                    <tr class="table-title">                     
                        <th height="30" align="center" valign="middle"><small>Direccion</small></th>   
                        <th height="20" align="center" valign="middle"><small>Nombre</small></th> 
                        <th height="20" align="center" valign="middle"><small>Telefono</small></th>             
                    </tr>
                </thead>
                <tbody>
                <?php
                    while ($data = mysqli_fetch_assoc($query)){
                                    $direccion = $data['suc_dir'];
                                    $nombre = $data['suc_nam'];
                                    $telefono = $data['suc_tel'];

                        echo "<tr>
                        <td width='100' align='left'>$codigo</td>
                        <td width='120' align='left'>$direccion</td>
                        <td width='120' align='left'>$nombre</td>
                        <td width='120' align='left'>$telefono</td>
                        </tr>";
                    }
                ?>
                </tbody>
            </table>
        </div>
    </body>
</html>