<?php 
session_start();

//$session_id = session_id();
$session_id = 1;

require_once '../../config/database.php';

if(isset($_POST['id_src'])){
    $id=$_POST['id_src'];
}
//----------------------------------------------
if(!empty($id)){
    $insert_tmp = mysqli_query($mysqli, "INSERT INTO tmp_veh (veh_cod, session_id) 
    VALUES('$id', '$session_id')");
}
//----------------------------------------------
if(isset($_GET['id'])){
    $id=intval($_GET['id']);
    $delete=mysqli_query($mysqli, "DELETE FROM tmp_veh WHERE tmp_cod='".$id."'");
}
//----------------------------------------------
?>

<table class="table table-bordered table-striped table-hover">
    <tr class="warning">
        <th>Código</th> 
        <th>Chapa</th>
        <th>Marca</th>
        <th>Estado</th>
        <th>Cliente</th>
        <th>C.I.</th>
        <th style="width:36px;"></th>
    </tr>
    <?php 
        $suma_total=0;
        $sql=mysqli_query($mysqli, "SELECT * FROM v_vehiculos ve, tmp_veh WHERE ve.veh_cod=tmp_veh.veh_cod 
                                    and tmp_veh.session_id=1");
        while($row=mysqli_fetch_array($sql)){
            $tmp_cod=$row['tmp_cod'];
            $veh_cod=$row['veh_cod'];
            $veh_chapa=$row['veh_chapa'];
            $veh_marca=$row['veh_marca'];
            $veh_estado=$row['veh_estado'];
            $cli_nom_ape=$row['cli_nom_ape'];
            $cli_ci=$row['cli_ci'];
            ?>
            <tr>
                <td><?php echo $veh_cod; ?></td>
                <td><?php echo $veh_chapa; ?></td>
                <td><?php echo $veh_marca; ?></td>
                <td><?php echo $veh_estado; ?></td>
                <td><?php echo $cli_nom_ape; ?></td>
                <td><?php echo $cli_ci; ?></td>
                <td>
                    <span class="pull-right">
                        <a href="#" onclick="eliminar('<?php echo $tmp_cod; ?>')">
                            <i class="glyphicon glyphicon-trash"></i>
                        </a>
                    </span>
                </td>
            </tr>
       <?php 
       }           
    ?>
        <tr>
            <?php if(empty($veh_cod)){
                $veh_cod=0;
            }else {
                $veh_cod;
            } ?>
            <input type="hidden" class="form-control" name="veh_cod" value="<?php echo $veh_cod; ?>">
            
        </tr>
</table>