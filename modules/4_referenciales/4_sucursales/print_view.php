<?php 

    require_once "../../config/database.php";

    $query = mysqli_query($mysqli, "SELECT * FROM sucursales") 
                            or die('Error:'.mysqli_error($mysqli));

    $count = mysqli_num_rows($query);

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Reporte de Sucursales</title>
        <link rel="stylesheet" type="text/css" href="../../assets/img/favicon.ico">
    </head>
    <body>
        
        <div align="center">
            <h3>Sucursales</h3>
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
                        <th heigth="30" align="center" valign="middle"><small>Descripción</small></th>
                        <th heigth="30" align="center" valign="middle"><small>Dirección</small></th>
                    </tr>
                </thead>
                <!-------------------------------->
                <tbody>
                    <?php 
                        while($data = mysqli_fetch_assoc($query)){
                            $suc_cod = $data['suc_cod'];
                            $suc_nom = $data['suc_nom'];
                            $suc_dir = $data['suc_dir'];
                        
                        
                        echo "  <tr>
                                    <td width='50' align='center'>$suc_cod</td>
                                    <td width='190' align='left'>$suc_nom</td>
                                    <td width='270' align='left'>$suc_dir</td>
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