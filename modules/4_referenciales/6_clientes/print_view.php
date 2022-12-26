<?php 
require_once "../../config/database.php";

$query = mysqli_query($mysqli, "SELECT * FROM v_clientes")
    or die('Error'.mysqli_error($mysqli));

$count = mysqli_num_rows($query);    
?>

<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Reporte de Clientes</title>
        <link rel="stylesheet" type="text/css" href="../../assets/img/favicon.ico">
    </head>
    <body>
        <div>
            <div align="center">
                Reporte de Clientes
            </div>
            <div align="left">
                Cantidad: <?php echo $count; ?>
            </div>
        </div>
        <hr>
        <div id="tabla">
            <table width="100%" border="0.3" cellpadding="0" cellspacing="0" align="center">
                <thead style="background:#e8ecee">
                    <tr class="table-title" style="background:#A5A3A2">
                        <th height="30" align="center" valign="middle"><small>Cod</small></th>   
                        <th height="30" align="center" valign="middle"><small>C.I</small></th>                      
                        <th height="30" align="center" valign="middle"><small>Nombre y Apellido</small></th>    
                        <th height="30" align="center" valign="middle"><small>Telefono</small></th>
                        <th height="30" align="center" valign="middle"><small>Direccion</small></th>   
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while ($datal = mysqli_fetch_assoc($query)){
                            $cli_cod = $datal['cli_cod'];
                            $cli_ci = $datal['cli_ci'];
                            $cli_nom_ape = $datal['cli_nom_ape'];
                            $cli_tel = $datal['cli_tel'];
                            $cli_dir = $datal['cli_dir'];

                            echo "<tr>
                            <td width='40' align='center'>$cli_cod</td>
                            <td width='80' align='center'>$cli_ci</td>
                            <td width='320' align='left'>$cli_nom_ape</td>
                            <td width='90' align='center'>$cli_tel</td>
                            <td width='145' align='left'>$cli_dir</td>
                            </tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <hr>
        <p>Impreso desde el Area Virtual del taller</p>
    </body>
</html>