<?php 
    require_once "../../config/database.php";

    if($_GET['act']=='imprimir'){
        if((isset($_GET['pro_cod'])) and (isset($_GET['pro_porcen']))){//si existe en la bd el cod_orden_trabajo
            $pro_cod = $_GET['pro_cod'];
            $pro_porcen = $_GET['pro_porcen'];
            
            $query = mysqli_query($mysqli, "SELECT * FROM v_promociones WHERE pro_cod = $pro_cod")
                                            or die('Error: '.mysqli_error($mysqli));

            while($data = mysqli_fetch_assoc($query)){
                $pro_cod = $data ['pro_cod'];
                $pro_fecha = $data ['pro_fecha'];
                $pro_estado = $data ['pro_estado'];
                $emp_nom_ape = $data ['emp_nom_ape'];
                $suc_cod = $data ['suc_cod'];
                $suc_descri_direc = $data ['suc_descri_direc'];
                $pro_descri = $data ['pro_descri'];
                $pro_porcen = $data ['pro_porcen'];
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Promocion</title> 
    </head>

    <body>
        <h3>Promoción Nro: <?php echo $pro_cod?></h3>
        <div align='left'>
            <label>
                <strong>Sucursal: </strong><?php echo $suc_cod; echo ' '; echo $suc_descri_direc ?>
            </label><br>
            <label>
                <strong>Fecha: </strong><?php echo $pro_fecha ?>
            </label><br>
            <label>
                <strong>Empleado: </strong><?php echo $emp_nom_ape;?>
            </label><br>
        </div>
        
        <!---------------------------------------------------------------------->
        <hr>
        
        <div>
            <label>
                <strong>Descripcion: </strong><?php echo $pro_descri ?>
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
                        <th class="center">Desc.</th>
                    </tr>
                </thead>
                <!------------------------------------------->
                <tbody>

                    <?php
                    $query_det = mysqli_query($mysqli, "SELECT * FROM v_det_promo WHERE pro_cod = $pro_cod")
                                                        or die('Error: '.mysqli_error($mysqli));

                    $suma = 0;
                    $cont = 0;
                    $calc_desc = 0;
                    $suma_2 = 0;

                    while($data_det = mysqli_fetch_assoc($query_det)){
                        $pro_cod = $data_det ['pro_cod'];
                        $ite_cod = $data_det ['ite_cod'];
                        $ite_descri = $data_det ['ite_descri'];
                        $tit_descrip = $data_det ['tit_descrip'];
                        $ite_precio = $data_det ['ite_precio'];
                        $dpr_cant = $data_det ['dpr_cant'];

                        $cont = $dpr_cant * $ite_precio;
                        $suma_2 = $suma_2 + $cont;

                        $calc_desc = (($pro_porcen * $ite_precio) / 100);
                        $total_des = $ite_precio - $calc_desc;

                        $suma = $suma + $total_des;

                        
                        ?>
                        
                        
                        <?php  echo "<tr>
                                        <td class='center' width='40'>$ite_cod</td>
                                        <td class='center' width='160'>$tit_descrip</td>
                                        <td class='center' width='160'>$ite_descri</td>
                                        <td class='center' width='60'>$dpr_cant</td>
                                        <td class='center' width='100'>$ite_precio</td>
                                        <td class='center' width='100'>$calc_desc</td>
                                    </tr>";
                    }
                    ?>
                    
                    <?php  echo "<tr>
                                        <td class='center'>-</td>
                                        <td class='center'>-</td>
                                        <td class='center'>-</td>
                                        <td class='center'>-</td>
                                        <td class='center'>-</td>
                                        <td class='center'>-</td>
                                    </tr>";
                    ?>

                    <?php  echo "<tr>
                                        <td class='center'></td>
                                        <td class='center'></td>
                                        <td class='center'></td>
                                        <td class='center'></td>
                                        <td class='center'><strong>Sub-Total</strong></td>
                                        <td class='center'><strong>$suma_2</strong></td>
                                    </tr>";
                    ?>
                    
                    <?php  echo "<tr>
                                        <td class='center'></td>
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