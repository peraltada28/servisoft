<?php 
    require_once "../../config/database.php";

    if($_GET['act']=='imprimir'){
        if(isset($_GET['cod_salida'])){//si existe en la bd el cod_entrada
            $codigo = $_GET['cod_salida'];
            
            $query = mysqli_query($mysqli, "SELECT * FROM v_salida WHERE cod_salida = $codigo")
                                            or die('Error: '.mysqli_error($mysqli));

            while($data = mysqli_fetch_assoc($query)){
                $fecha = $data ['fecha'];
                $hora = $data ['hora'];
                $mot_descrip = $data ['mot_descrip'];
                $funcionario_salida = $data ['funcionario_salida'];
            }

            //Detalle de entrada
            $det_entrada = mysqli_query($mysqli, "SELECT * FROM det_salida WHERE cod_salida = $codigo")
                                            or die('Error: '.mysqli_error($mysqli));
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
            <strong>Vehiculo para: </strong> <?php echo $mot_descrip?> <br>
            <label>
                <strong>Fecha salida: </strong><?php echo $fecha ?>
            </label><br>
            <label>
                <strong>Hora salida: </strong><?php echo $hora ?>
            </label><br>
            <label>
                <strong>Salida mediante: </strong><?php echo $funcionario_salida ?>
            </label><br>
        </div>
        <hr><!---------------------------------------------------------------------->
        <div>
            <table width="100%" border="0.3" cellpadding="0" cellspacing="0" align="center">
                <thead style="background:#e8ecee">
                    <tr>
                        <th height="20" align="center" valign="middle"><small>Codigo</small></th>
                        <th height="20" align="center" valign="middle"><small>Vehiculo</small></th>
                        <th height="20" align="center" valign="middle"><small>Chapa Nro</small></th>
                    </tr>
                </thead>

                <tbody>
                    <?php 
                        $query_1 = mysqli_query($mysqli, "SELECT * FROM v_salida where cod_salida=$codigo")
                            or die('Error: '.mysqli_error($mysqli));

                        while($data_1 = mysqli_fetch_assoc($query_1)){
                            $cod_1 = $data_1 ['cod_vehiculo'];
                            $vehiculo_1 = $data_1 ['vehiculo'];
                            $chapa_nro_1 = $data_1 ['chapa_nro'];

                            echo "<tr>
                                    <td class='center' width='50'>$cod_1</td>
                                    <td class='center' width='260'>$vehiculo_1</td>
                                    <td class='center' width='80'>$chapa_nro_1</td>
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