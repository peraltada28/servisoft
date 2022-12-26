<?php 
session_start();

//$session_id = session_id();
$session_id = 0;

require_once '../../config/database.php';

if(isset($_POST['id_src'])){
    $id=$_POST['id_src'];
}
if(isset($_POST['cantidad_src'])){
    $cantidad = $_POST['cantidad_src'];

}
if(isset($_POST['precio_compra_src'])){
    $precio_compra_ = $_POST['precio_compra_src'];

}



if(!empty($id) and !empty($cantidad) and !empty($precio_compra_)){
    $insert_tmp = mysqli_query($mysqli, "INSERT INTO temps (temp_cod, temp_cantidad, temp_precio, session_id) 
    VALUES('$id', '$cantidad', '$precio_compra_','$session_id')");
}
if(isset($_GET['id'])){
    $id=intval($_GET['id']);
    $delete=mysqli_query($mysqli, "DELETE FROM temps WHERE temp_cod='".$id."'");
}
?>
<table class="table table-bordered table-striped table-hover">
    <tr class="warning">
        <th>Código</th>
        <th>Tipo de Produ.</th>
        <th>Descripcion</th>
        <th><span class="pull-right">Cantidad</span></th>
        <th><span class="pull-right">Precio</span></th>
        <th style="width: 36px;"></th>
    </tr>
    <?php 
        $suma_total=0;
        $sql=mysqli_query($mysqli, "SELECT * FROM productos, temps WHERE productos.pro_cod=temps.temp_cod 
                                    and temps.session_id=0");
        while($row=mysqli_fetch_array($sql)){
            $temp_cod=$row['temp_cod'];
            $pro_cod=$row['pro_cod'];
            $pro_desc=$row['pro_desc'];
            $cantidad=$row['temp_cantidad'];

            $tpr_cod=$row['tpr_cod'];
            $sql_tpr = mysqli_query($mysqli, "SELECT tpr_desc FROM tipo_productos WHERE tpr_cod='$tpr_cod'");
            $rw_tpr = mysqli_fetch_array($sql_tpr);
            $tpr_desc= $rw_tpr['tpr_desc'];

            $precio_compra_=$row['temp_precio'];
            $precio_compra_f=number_format($precio_compra_); //Formatear una variable (Poner ,)
            $precio_compra_r=str_replace(",","",$precio_compra_f);//Reemplazar la ,
            $precio_total=$precio_compra_r*$cantidad;
            $precio_total_f=number_format($precio_total);
            $precio_total_r=str_replace(",","",$precio_total_f);
            $suma_total+=$precio_total_r; //Sumador total
            ?>
            <tr>
                <td><?php echo $pro_cod; ?></td>
                <td><?php echo $tpr_desc; ?></td>
                <td><?php echo $pro_desc; ?></td>
                <td><span class="pull-right"><?php echo $cantidad; ?></span></td>
                <td><span class="pull-right"><?php echo $precio_total_f; ?></span></td>
                <td>
                    <span class="pull-right">
                        <a href="#" onclick="eliminar('<?php echo $temp_cod; ?>')">
                            <i class="glyphicon glyphicon-trash"></i>
                        </a>
                    </span>
                </td>
            </tr>
       <?php 
       }           
    ?>
        <tr>
            <input type="hidden" class="form-control" name="suma_total" value="<?php echo $suma_total; ?>">
            <?php if(empty($pro_cod)){
                $pro_cod=0;
            }else {
                $pro_cod;
            } ?>
            <input type="hidden" class="form-control" name="pro_cod" value="<?php echo $pro_cod; ?>">
            <?php if(empty($cantidad)){
                $cantidad=0;
            }else {
                $cantidad;
            } ?>
            <input type="hidden" class="form-control" name="cantidad" value="<?php echo $cantidad; ?>">
            <td colspan=4><span class="pull-right">Total Gs.</span></td>
            <td><stron><span class="pull-right"><?php echo number_format($suma_total); ?></span></strong></td>
        </tr>
</table>