<?php 
session_start();

require_once '../../../config/database.php';

if(empty($_SESSION['fun_nom']) && empty($_SESSION['fun_pass'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=alert=3'>";
}
else{
    if($_GET['act']=='insert'){//cambiar act en form_ac
        if(isset($_POST['Guardar'])){

            $query_id =mysqli_query($mysqli, "SELECT MAX(ped_cod) AS id FROM pedidos_compra")
            or die('Error '.mysqli_error($mysqli));

            $count = mysqli_num_rows($query_id);
            if($count<>0){
                $data_id = mysqli_fetch_assoc($query_id);
                $ped_cod = $data_id['id'] + 1;
            } else {
                $ped_cod = 1;
            }

            $ped_fec = $_POST['ped_fec'];
            $ped_desc = $_POST['ped_desc'];
            $ped_cond = $_POST['ped_cond'];
            $ped_est='ACTIVO';
            $fun_cod = $_SESSION['fun_cod'];
            
            $sql_=mysqli_query($mysqli, "SELECT * FROM productos pro, temps WHERE pro.pro_cod = temps.temp_cod");

            while($row_ = mysqli_fetch_array($sql_)){
                $pro_cod= $row_['temp_cod'];
                $cantidad= $row_['temp_cantidad'];
                $insert_detalle = mysqli_query($mysqli, 
                                "INSERT INTO det_ped_compra (ped_cod, pro_cod, ped_cant) 
                                VALUES ($ped_cod, $pro_cod, $cantidad)")
                                or die('Error 109'.mysqli_error($mysqli));
                
            }
            //Insertar cabecera de entrada
            $query = mysqli_query($mysqli, "INSERT INTO pedidos_compra (ped_cod, ped_fec, ped_est, ped_cond, ped_desc, fun_cod)
                                            VALUES ($ped_cod, '$ped_fec', '$ped_est', '$ped_cond', '$ped_desc', $fun_cod)")    
            or die('Error in line 43: '.mysqli_error($mysqli));

            /*
            $update_veh = mysqli_query($mysqli, "UPDATE vehiculos SET veh_estado = 'PRESUPUESTADO' WHERE veh_cod = $veh_cod")
            or die('Error 41: '.mysqli_error($mysqli));
            */
            if($query){
                header("Location: ../../../main.php?module=pedidos_compras&alert=1");
            } else {
                header("Location: ../../../main.php?module=pedidos_compras&alert=3");
            }
        }
    }

    elseif($_GET['act']=='anular'){
        if(isset($_GET['ped_cod'])){
            $ped_cod = $_GET['ped_cod'];
            //Anular cabecera de pedidos de compra (cambiar estado a anulado)
            $query = mysqli_query($mysqli, "UPDATE pedidos_compra SET ped_est='ANULADO' WHERE ped_cod=$ped_cod")
            or die('Error'.mysqli_error($mysqli));
            
            if($query){
                header("Location: ../../../main.php?module=pedidos_compras&alert=3");
            } else {
                header("Location: ../../../main.php?module=pedidos_compras&alert=4");
            }
        }
    }
}