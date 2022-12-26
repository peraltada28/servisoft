<?php 
    require_once "../../config/database.php";

    if($_GET['act']=='imprimir'){
        if(isset($_GET['cod_entrada'])){//si existe en la bd el cod_entrada
            $codigo = $_GET['cod_entrada'];
            
            $query = mysqli_query($mysqli, "SELECT * FROM v_entrada WHERE cod_entrada = $codigo")
                                            or die('Error: '.mysqli_error($mysqli));

            while($data = mysqli_fetch_assoc($query)){
                $fecha = $data ['fecha'];
                $hora = $data ['hora'];
                $cod_motivo = $data ['cod_motivo'];
                $mot_descrip = $data ['mot_descrip'];
                $funcionario_entrada = $data ['funcionario_entrada'];
            }

            //Detalle de entrada
            $det_entrada = mysqli_query($mysqli, "SELECT * FROM det_entrada WHERE cod_entrada = $codigo")
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
            Vehiculo para: <?php echo $mot_descrip?> <br>
            <label>
                <strong>Fecha ingreso: </strong><?php echo $fecha ?>
            </label><br>
            <label>
                <strong>Hora ingreso: </strong><?php echo $hora ?>
            </label><br>
            <label>
                <strong>Ingresado por: </strong><?php echo $funcionario_entrada ?>
            </label><br>

            <?php
            
                if($cod_motivo == 3){
                    $sql_cant = mysqli_query($mysqli,"SELECT * FROM abastecimientos ab 
                                                        WHERE ab.cod_entrada = $codigo");
                    while ($data_cant = mysqli_fetch_assoc($sql_cant)) {
                        $cantidad = $data_cant['cant_litros'];
                        $cod_item = $data_cant['cod_item'];
                    }

                    ?>
                    <label>
                        <strong>Cantidad: </strong><?php echo "$cantidad"." Litros" ?>
                    </label><br>
                    <!------------------------------------------------------------------->
                    <?php
                    $sql_it = mysqli_query($mysqli,"SELECT * FROM v_items 
                                                        WHERE cod_item = $cod_item");
                    while ($data_it = mysqli_fetch_assoc($sql_it)) {
                        $item_descrip = $data_it['item_descrip'];
                        $tip_ins_descrip = $data_it['tip_ins_descrip'];
                    }

                    ?>
                    <label>
                        <strong>Insumo: </strong><?php echo " $tip_ins_descrip"." "."$item_descrip" ?>
                    </label><br>

                    <?php
                }
            
            ?>
        </div>
        <hr><!---------------------------------------------------------------------->
        <div>
            <table width="100%" border="0.3" cellpadding="0" cellspacing="0" align="center">
                <thead style="background:#e8ecee">
                    <tr>
                        <th height="20" align="center" valign="middle"><small>Codigo</small></th>
                        <th height="20" align="center" valign="middle"><small>Vehiculo</small></th>
                        <th height="20" align="center" valign="middle"><small>Chapa Nro</small></th>
                        <th height="20" align="center" valign="middle"><small>Motivo</small></th>
                        
                    </tr>
                </thead>

                <tbody>
                    <?php 
                        $query_1 = mysqli_query($mysqli, "SELECT * FROM v_det_entrada where cod_entrada=$codigo")
                            or die('Error: '.mysqli_error($mysqli));

                        while($data_1 = mysqli_fetch_assoc($query_1)){
                            $cod_1 = $data_1 ['cod_entrada'];
                            $vehiculo_1 = $data_1 ['vehiculo'];
                            $chapa_nro_1 = $data_1 ['chapa_nro'];
                            $mot_descrip_1 = $data_1 ['mot_descrip'];
                            $estado = $data_1 ['estado'];

                            echo "<tr>
                                    <td class='center' width='35'>$cod_1</td>
                                    <td class='center' width='190'>$vehiculo_1</td>
                                    <td class='center' width='60'>$chapa_nro_1</td>
                                    <td class='center' width='190'>$mot_descrip_1</td>
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