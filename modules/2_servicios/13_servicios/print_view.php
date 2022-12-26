<?php 
    require_once "../../config/database.php";

    if($_GET['act']=='imprimir'){
        if(isset($_GET['ser_cod'])){//si existe en la bd el cod_orden_trabajo
            $ser_cod = $_GET['ser_cod'];
            
            $query = mysqli_query($mysqli, "SELECT * FROM v_servicios WHERE ser_cod = $ser_cod")
                                            or die('Error: '.mysqli_error($mysqli));

            while($data = mysqli_fetch_assoc($query)){
                $ser_cod = $data ['ser_cod'];
                $emp_nom_ape = $data ['emp_nom_ape'];
                $ser_fecha = $data ['ser_fecha'];
                $cli_nom_ape = $data ['cli_nom_ape'];
                $cli_ci = $data ['cli_ci'];
                $suc_cod = $data ['suc_cod'];
                $suc_descri_direc = $data ['suc_descri_direc'];
                $veh_cod = $data ['veh_cod'];
                $veh_chapa_marca = $data ['veh_chapa_marca'];
                $ser_descrip = $data ['ser_descrip'];
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Solicitud de Servicio</title> 
    </head>

    <body>
        <h3>Servicio Nro: <?php echo $ser_cod?></h3>
        <div align='left'>
            <label>
                <strong>Sucursal: </strong><?php echo $suc_cod; echo ' '; echo $suc_descri_direc ?>
            </label><br>
            <label>
                <strong>Fecha: </strong><?php echo $ser_fecha ?>
            </label><br>
            <label>
                <strong>Empleado: </strong><?php echo $emp_nom_ape ?>
            </label><br>
        </div>
        
        <!---------------------------------------------------------------------->
        <hr>
        <div>
            <div align='left'>
                <label>
                    <strong>Cliente: </strong><?php echo $cli_nom_ape ?>
                </label><br>
                <label>
                    <strong>Vehiculo: </strong><?php echo $veh_chapa_marca ?>
                </label><br>
                
            </div>
        </div>
        <hr>
        <!---------------------------------------------------------------------->
        <div>
            <label>
                <strong>Observacion: </strong><?php echo $ser_descrip ?>
            </label><br>
        </div>
        
        <hr>
        <div id="tabla">
            <table width="100%" border="0.3" cellpadding="0" cellspacing="0" align="center">
                <!------------------------------------------->
                <thead>
                    <tr>
                        <th class="center">Cod</th>
                        <th class="center">Tipo</th>
                        <th class="center">Descripcion</th>
                        <th class="center">Cantidad</th>
                        <th class="center">Precio</th>
                    </tr>
                </thead>
                <!------------------------------------------->
                <tbody>

                    <?php
                    $query = mysqli_query($mysqli, "SELECT * FROM v_det_servicios WHERE ser_cod = $ser_cod")
                                                        or die('Error: '.mysqli_error($mysqli));

                    $suma = 0;
                    $cont = 0;

                    while($data = mysqli_fetch_assoc($query)){
                        $dse_precio = $data ['dse_precio'];
                        $ite_cod = $data ['ite_cod'];
                        $ite_descri = $data ['ite_descri'];
                        $tit_descrip = $data ['tit_descrip'];
                        $dse_cant = $data ['dse_cant'];

                        $cont = $dse_cant * $dse_precio;
                        $suma = $suma + $cont;
                        
                        ?>
                        
                        
                        <?php  echo "<tr>
                                        <td class='center' width='60'>$ite_cod</td>
                                        <td class='center' width='180'>$tit_descrip</td>
                                        <td class='center' width='180'>$ite_descri</td>
                                        <td class='center' width='60'>$dse_cant</td>
                                        <td class='center' width='100'>$dse_precio</td>
                                    </tr>";
                    }
                    ?>
                    <?php  echo "<tr>
                                        <td class='center'></td>
                                        <td class='center'></td>
                                        <td class='center'></td>
                                        <td class='center'><strong>Total</strong></td>
                                        <td class='center'><strong>$suma</strong></td>
                                    </tr>";
                    ?>
                </tbody>
                
                <!------------------------------------------->
            </table>
        </div>
        
        <hr>
        
        <div align="center">
            <label><strong>Impreso desde el Area Virtual Taller</strong></label>
        </div>
    </body>
</html>