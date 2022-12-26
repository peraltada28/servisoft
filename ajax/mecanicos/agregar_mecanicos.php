<?php 
session_start();

//$session_id = session_id();
$session_id = 1;

require_once '../../config/database.php';

if(isset($_POST['fun_cod'])){
    $fun_cod=$_POST['fun_cod'];
}
//----------------------------------------------
if(!empty($fun_cod)){
    $insert_tmp = mysqli_query($mysqli, "INSERT INTO tmp_fun (fun_cod, session_id) 
    VALUES('$fun_cod', '$session_id')");
}
//----------------------------------------------
if(isset($_GET['fun_cod'])){
    $fun_cod=intval($_GET['fun_cod']);
    $delete=mysqli_query($mysqli, "DELETE FROM tmp_fun WHERE fun_cod='".$fun_cod."'");
}
//----------------------------------------------
?>

<table class="table table-bordered table-striped table-hover">
    <tr class="warning">
        <th>Código</th> 
        <th>Nombre y Apellido</th>
        <th>C.I.</th>
        <th style="width:36px;"></th>
    </tr>
    <?php 
        $suma_total=0;
        $sql=mysqli_query($mysqli, "SELECT * FROM v_funcionarios v_fun, tmp_fun WHERE v_fun.fun_cod = tmp_fun.fun_cod");
        while($row=mysqli_fetch_array($sql)){
            //$tmp_cod=$row['tmp_cod'];
            $fun_cod=$row['fun_cod'];
            $fun_nom_ape=$row['fun_nom_ape'];
            $fun_ci=$row['fun_ci'];
            ?>
            <tr>
                <td><?php echo $fun_cod; ?></td>
                <td><?php echo $fun_nom_ape; ?></td>
                <td><?php echo $fun_ci; ?></td>
                <td>
                    <span class="pull-right">
                        <a href="#" onclick="eliminar_('<?php echo $fun_cod; ?>')">
                            <i class="glyphicon glyphicon-trash"></i>
                        </a>
                    </span>
                </td>
            </tr>
       <?php 
       }           
    ?>
        <tr>
            <?php if(empty($fun_cod)){
                $fun_cod=0;
            }else {
                $fun_cod;
            } ?>
            <input type="hidden" class="form-control" name="fun_cod" value="<?php echo $fun_cod; ?>">
            
        </tr>
</table>