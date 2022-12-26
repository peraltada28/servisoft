<?php 
    require_once "../../../config/database.php";

    if($_GET['act']=='imprimir'){
        if(isset($_GET['ped_cod'])){//si existe en la bd el pedido de compra
            $ped_cod = $_GET['ped_cod'];
            
            $query = mysqli_query($mysqli, "SELECT * FROM v_pedidos_compras WHERE ped_cod = $ped_cod")
                                            or die('Error: '.mysqli_error($mysqli));

            while($data = mysqli_fetch_assoc($query)){
                $ped_cod = $data ['ped_cod'];
                $ped_fec = $data ['ped_fec'];
                $ped_cond = $data ['ped_cond'];
                $ped_desc = $data ['ped_desc'];
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Pedido de compra</title> 
    </head>

    <body>
        <h3>Pedido de compra Nro: <?php echo $ped_cod?></h3>
        <div align='left'>
            <label>
                <strong>Fecha: </strong><?php echo $ped_fec ?>
            </label><br>
            <label>
                <strong>Condicion: </strong><?php echo $ped_cond;?>
            </label><br>
            <label>
                <strong>Descripcion: </strong><?php echo $ped_desc;?>
            </label><br>
        </div>
        <hr>
        <div id="tabla">
            <table width="100%" border="0.3" cellpadding="0" cellspacing="0" align="center">
                <!------------------------------------------->
                <thead>
                    <tr>
                        <th class="center">Codigo</th>
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
                    $query = mysqli_query($mysqli, "SELECT * FROM v_det_ped_compras WHERE ped_cod = $ped_cod")
                                                        or die('Error: '.mysqli_error($mysqli));

                    $suma = 0;
                    $cont = 0;

                    while($data = mysqli_fetch_assoc($query)){
                        $pro_cod = $data ['pro_cod'];
                        $tpr_desc = $data ['tpr_desc'];
                        $pro_desc = $data ['pro_desc'];
                        $ped_cant = $data ['ped_cant'];
                        $pro_puc = $data ['pro_puc'];

                        $cont = $pro_puc * $ped_cant;
                        $suma = $suma + $cont;
                        
                        ?>
                        
                        
                        <?php  echo "<tr>
                                        <td class='center' width='60'>$pro_cod</td>
                                        <td class='center' width='180'>$tpr_desc</td>
                                        <td class='center' width='180'>$pro_desc</td>
                                        <td class='center' width='60'>$ped_cant</td>
                                        <td class='center' width='100'>$pro_puc</td>
                                        <td class='center' width='100'>$cont</td>
                                    </tr>";
                    }
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