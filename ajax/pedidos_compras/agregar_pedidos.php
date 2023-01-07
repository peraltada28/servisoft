<?php 
session_start();

//$session_id = session_id();
$session_id = 0;

require_once '../../config/database.php';

if(isset($_POST['id_src'])){
    $id=$_POST['id_src'];
}

if(!empty($id)){
    $insert_tmp = mysqli_query($mysqli, "INSERT INTO temps (temp_cod, session_id) 
    VALUES('$id', '$session_id')");
}
if(isset($_GET['id'])){
    $id=intval($_GET['id']);
    $delete=mysqli_query($mysqli, "DELETE FROM temps WHERE temp_cod='".$id."'");
}
?>
<div class="form-group">
    <div class='col-md-10'>
        <?php
        $query_temps = mysqli_query($mysqli, "SELECT * FROM temps, pedidos_compra pco WHERE temp_cod = pco.ped_cod") 
        OR die ('Error'.mysqli_error($mysqli));
        WHILE ($data_temp_ped = mysqli_fetch_assoc($query_temps)){
            echo "
            
            <label class='col-sm-2 control-label'>Pedido Nro</label>
            <div class='col-sm-2'>
                <input type='text' class='form-control' name='ped_codigo' value='$data_temp_ped[ped_cod]' readonly>
            </div>
            <div class='col-sm-6'>
                <input type='text' class='form-control' value='$data_temp_ped[ped_desc]' readonly>
            </div>
            

            ";
        }
        ?>
    </div> 
</div>
<table class="table table-bordered table-striped table-hover">
    <tr class="warning">
        <th>Código</th>
        <th>Tipo de Produ.</th>
        <th>Descripcion</th>
        <th><span class="pull-right">Cantidad</span></th>
        <th><span class="pull-right">Precio Unitario</span></th>
        <th style="width: 36px;"></th>
    </tr>
    <?php 
        $nro=0;
        $sql=mysqli_query($mysqli, "SELECT * FROM v_temp_ped_productos WHERE ped_cod = $id");
        while($row=mysqli_fetch_array($sql)){
            $nro += 1;
            $temp_cod=$row['temp_cod'];
            $pro_cod=$row['pro_cod'];
            $pro_desc=$row['pro_desc'];
            $cantidad=$row['ped_cant'];

            $tpr_cod=$row['tpr_cod'];
            $sql_tpr = mysqli_query($mysqli, "SELECT tpr_desc FROM tipo_productos WHERE tpr_cod='$tpr_cod'");
            $rw_tpr = mysqli_fetch_array($sql_tpr);
            $tpr_desc= $rw_tpr['tpr_desc'];

            ?>
            <tr>
                <td><?php echo $pro_cod; ?></td>
                <td><?php echo $tpr_desc; ?></td>
                <td><?php echo $pro_desc; ?></td>
                <td>
                    <input type="hidden" name="producto_cantidad_<?php echo $nro; ?>" value="<?php echo $pro_cod; ?>" required>
                    <span class="pull-right"><?php echo $cantidad; ?></span>
                </td>
                <td class="col-sm-1">
                    <input type="text" class="pull-right" name="producto_precio_<?php echo $nro; ?>">
                </td>
            </tr>
            <input type="hidden" name="producto_codigo_<?php echo $nro; ?>" value="<?php echo $pro_cod; ?>">
       <?php 
       }           
    ?>
        
</table>