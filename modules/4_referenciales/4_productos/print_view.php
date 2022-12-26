<?php 

    require_once "../../config/database.php";

    //PRINT_VIEW.PHP
    $query = mysqli_query($mysqli, "SELECT * FROM v_items") 
        or die('Error:'.mysqli_error($mysqli));

    $count = mysqli_num_rows($query);

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Reporte de Items</title>
        <link rel="stylesheet" type="text/css" href="../../assets/img/favicon.ico">
    </head>
    <body>
        
        <div align="center">
            <h3>Items Registrados</h3>
        </div>
        <div>
            Reporte de Items
        </div>
        <div align="center">
            Cantidad: <?php echo $count ?>
        </div>

        <hr><!-------------------------------->
        <div id="tabla">
            <table width="100%" border="0.3" cellpadding="0" cellspacing="0" align="center">
            
                <thead style="background:#e8ecee">
                    <tr class="table-title" style="background:#A5A3A2">
                        <th heigth="10" align="center" valign="middle"><small>Codigo</small></th>
                        <th heigth="30" align="center" valign="middle"><small>Tipo de Producto</small></th>
                        <th heigth="30" align="center" valign="middle"><small>Descripcion</small></th>
                        <th heigth="30" align="center" valign="middle"><small>Precio</small></th>
                            
                    </tr>
                </thead>
                <!-------------------------------->
                <tbody>
                    <?php 
                        while($data = mysqli_fetch_assoc($query)){
                            $ite_cod = $data['ite_cod'];
                            $tip_des = $data['tip_des'];
                            $ite_des = $data['ite_des'];
                            $ite_pre = $data['ite_pre'];

                        echo "  <tr>
                                    <td width='50' align='center'>$ite_cod</td>
                                    <td width='250' align='left'>$tip_des</td>
                                    <td width='280' align='left'>$ite_des</td>
                                    <td width='100' align='left'>$ite_pre</td>
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