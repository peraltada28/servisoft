<?php 

    require_once "../../config/database.php";

    $query = mysqli_query($mysqli, "SELECT * FROM tipo_items") 
                            or die('Error:'.mysqli_error($mysqli));

    $count = mysqli_num_rows($query);

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Reporte de tipo de Items</title>
        <link rel="stylesheet" type="text/css" href="../../assets/img/favicon.ico">
    </head>
    <body>
        
        <div align="center">
            <h3>Tipos de Items</h3>
        </div>
        <div>
            Reporte de Tipos de Items
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
                        <th heigth="30" align="center" valign="middle"><small>Descripcion</small></th>
                    </tr>
                </thead>
                <!-------------------------------->
                <tbody>
                    <?php 
                        while($data = mysqli_fetch_assoc($query)){
                            $tip_cod = $data ['tip_cod'];
                            $tip_des = $data ['tip_des'];
                                                
                        echo "  <tr>
                                    <td width='100' align='center'>$tip_cod</td>
                                    <td width='350' align='center'>$tip_des</td>
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