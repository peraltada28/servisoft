<?php 

    require_once "../../config/database.php";

    $query = mysqli_query($mysqli, "SELECT * FROM v_vehiculos") 
                            or die('Error:'.mysqli_error($mysqli));

    $count = mysqli_num_rows($query);

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Reporte Vehículos</title>
        <link rel="stylesheet" type="text/css" href="../../assets/img/favicon.ico">
    </head>
    <body>
        
        <div align="center">
            <h3>Vehículos Registrados</h3>
        </div>
        <div>
            Reporte
        </div>
        <div align="center">
            Cantidad: <?php echo $count ?>
        </div>

        <hr><!-------------------------------->
        <div id="tabla">
            <table width="100%" border="0.3" cellpadding="0" cellspacing="0" align="center">
            
                <thead style="background:#e8ecee">
                    <tr class="table-title" style="background:#A5A3A2">
                        <th heigth="20" align="center" valign="middle"><small>Codigo</small></th>
                        <th heigth="30" align="center" valign="middle"><small>Marca</small></th>
                        <th heigth="30" align="center" valign="middle"><small>Chapa Nro</small></th>
                        <th heigth="30" align="center" valign="middle"><small>Color</small></th>
                    </tr>
                </thead>
                <!-------------------------------->
                <tbody>
                    <?php 
                        while($data = mysqli_fetch_assoc($query)){
                            $veh_cod = $data ['veh_cod'];
                            $veh_marca = $data ['veh_marca'];
                            $veh_chapa = $data ['veh_chapa'];
                            $veh_color = $data ['veh_color'];
                        
                        
                        echo "  <tr>
                                    <td width='50' align='left'>$veh_cod</td>
                                    <td width='150' align='left'>$veh_marca</td>
                                    <td width='110' align='center'>$veh_chapa</td>
                                    <td width='200' align='left'>$veh_color</td>
                                </tr>
                             ";
                        }
                    ?>
                </tbody>
            
            </table>
        </div>
        <hr>
        <p>Impreso desde el Area Virtual del taller</p>
    </body>
</html>