<?php 
    require_once "../../config/database.php";

    if($_GET['act']=='imprimir'){
        if(isset($_GET['cod_orden_trabajo'])){//si existe en la bd el cod_orden_trabajo
            $codigo = $_GET['cod_orden_trabajo'];
            
            $query = mysqli_query($mysqli, "SELECT * FROM v_det_orden_trabajo WHERE cod_orden_trabajo = $codigo")
                                            or die('Error: '.mysqli_error($mysqli));

            while($data = mysqli_fetch_assoc($query)){
                $funcionario_ot = $data ['funcionario_ot'];
                $fecha = $data ['date_ot'];
                $mot_descrip = $data ['mot_descrip'];
                $diag_obs = $data ['diag_obs'];
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title> Vehiculo</title> 
    </head>

    <body>
        <div align='center'>
            Vehiculo para: <?php echo $mot_descrip?> <br>
            <label>
                <strong>Fecha OT: </strong><?php echo $fecha ?>
            </label><br>
            <label>
                <strong>Funcionario asignado: </strong><?php echo $funcionario_ot ?>
            </label><br>
        </div>
        
        <div align='left'>
            <label>
                <strong>Diagnostico: </strong><?php echo $diag_obs ?>
            </label><br>
        </div>
        <hr><!---------------------------------------------------------------------->
        <div>
            <table width="100%" border="0.3" cellpadding="0" cellspacing="0" align="center">
                <thead style="background:#e8ecee">
                    <tr>
                        <th height="20" align="center" valign="middle"><small>Codigo</small></th>
                        <th height="20" align="center" valign="middle"><small>Insumo</small></th>
                        <th height="20" align="center" valign="middle"><small>Cantidad</small></th>
                        <th height="20" align="center" valign="middle"><small>U. Medida</small></th>
                    </tr>
                </thead>

                <tbody>
                    <?php 
                        $query_1 = mysqli_query($mysqli, "SELECT * FROM v_det_orden_trabajo where cod_orden_trabajo=$codigo")
                            or die('Error: '.mysqli_error($mysqli));

                        while($data_1 = mysqli_fetch_assoc($query_1)){
                            $cod_item = $data_1 ['cod_item'];
                            $item = $data_1 ['item'];
                            $cantidad = $data_1 ['cantidad'];
                            $u_descrip = $data_1 ['u_descrip'];

                            echo "<tr>
                                    <td class='center' width='35'>$cod_item</td>
                                    <td class='center' width='190'>$item</td>
                                    <td class='center' width='60'>$cantidad</td>
                                    <td class='center' width='190'>$u_descrip</td>
                                </tr>
                                ";
                        }
                    ?>
                </tbody>
            </table>
        </div>
        
        <hr>
        <div align="center">
            <label><strong>Talleres - MOPC</strong></label>
        </div>
    </body>
</html>