<?php 
    require_once "../../../config/database.php";

    if($_GET['act']=='imprimir'){
        if(isset($_GET['prc_cod'])){//si existe en la bd el cod_orden_trabajo
            $prc_cod = $_GET['prc_cod'];
            
            $query = mysqli_query($mysqli, "SELECT * FROM v_presupuestos_compra WHERE prc_cod = $prc_cod")
                                            or die('Error: '.mysqli_error($mysqli));

            while($data = mysqli_fetch_assoc($query)){
                $prc_cod = $data ['prc_cod'];
                $prc_fec = $data ['prc_fec'];
                $prv_raz_soc = $data ['prv_raz_soc'];
                $ped_cod = $data ['ped_cod'];
                $ped_desc = $data ['ped_desc'];
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Prewsupuesto de commpra segun numero de pedido: <?php echo $ped_cod?></title> 
    </head>

    <body>
        <h3>Presupuesto Nro: <?php echo $prc_cod?></h3>
        <div align='left'>
            <label>
                <strong>Fecha: </strong><?php echo $prc_fec ?>
            </label><br>
            <label>
                <strong>Proveedor: </strong><?php echo $prv_raz_soc ?>
            </label><br>
        </div>
        <!---------------------------------------------------------------------->
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
                        <th class="center">Sub-Total</th>
                    </tr>
                </thead>
                <!------------------------------------------->
                <tbody>

                    <?php
                    $query = mysqli_query($mysqli, "SELECT * FROM v_det_pre_compras WHERE prc_cod = $prc_cod")
                                                        or die('Error: '.mysqli_error($mysqli));

                    $suma = 0;
                    $cont = 0;

                    while($data = mysqli_fetch_assoc($query)){
                        $pro_cod = $data ['pro_cod'];
                        $tpr_desc = $data ['tpr_desc'];
                        $pro_desc = $data ['pro_desc'];
                        $det_prc_cant = $data ['det_prc_cant'];
                        $det_prc_precio = $data ['det_prc_precio'];

                        $cont = $det_prc_cant * $det_prc_precio;
                        $suma = $suma + $cont;
                        
                        ?>
                        
                        
                        <?php  echo "<tr>
                                        <td class='center' width='60'>$pro_cod</td>
                                        <td class='center' width='180'>$tpr_desc</td>
                                        <td class='center' width='180'>$pro_desc</td>
                                        <td class='center' width='60'>$det_prc_cant</td>
                                        <td class='center' width='100'>$det_prc_precio</td>
                                        <td class='center' width='100'>$cont</td>
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