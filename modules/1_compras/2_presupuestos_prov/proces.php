<?php 
session_start();

require_once '../../../config/database.php';

if(empty($_SESSION['fun_usu']) && empty($_SESSION['fun_pass'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=alert=3'>";
}
else{
    if($_GET['act']=='insert'){//cambiar act en form_ac
        if(isset($_POST['Guardar'])){
            $prc_cod = $_POST['prc_cod'];
            $prv_cod = $_POST['prv_cod'];
            $prc_fec = $_POST['prc_fec'];
            $prc_est='ACTIVO';
            $ped_codigo = $_POST['ped_codigo'];
            $fun_cod = $_SESSION['fun_cod'];
            
            $sql_count = mysqli_query($mysqli, "SELECT COUNT(*) AS contador FROM det_ped_compra WHERE ped_cod = $ped_codigo");
            $rw_count = mysqli_fetch_array($sql_count);
            $contador= $rw_count['contador'];

            $nro = 0;
            while($nro == $contador){
                $nro += 1;
                $codigo_cont = 'producto_codigo_'.$nro;
                echo $codigo_cont;
                $pro_cod = $_POST[$codigo_cont];

                $cantidad_cont = 'producto_cantidad_'.$nro;
                echo $cantidad_cont;
                $pro_cant= $_POST[$cantidad_cont];

                $precio_cont = 'producto_precio_'.$nro;
                echo $precio_cont;
                $pro_pre= $_POST[$precio_cont];

                $insert_detalle_ = mysqli_query($mysqli, "INSERT INTO det_pre_compras (pro_cod, prc_cod, det_prc_cant, det_prc_precio) 
                                                            VALUES ($prc_cod, $pro_cod, $pro_cant, $pro_pre)")
                                                            or die('Error in line 35 on proces: '.mysqli_error($mysqli));
            }

            //Insertar cabecera de entrada
            $query = mysqli_query($mysqli, "INSERT INTO pre_compras (prc_cod, prc_fec, prc_est, prc_cond_IVA, fun_cod, prv_cod, ped_cod)
                                            VALUES ($prc_cod, '$prc_fec', '$prc_est', 10, $fun_cod, $prv_cod, $ped_codigo)")    
            or die('Error in line 41 on proces: '.mysqli_error($mysqli));

            if($query){
                header("Location: ../../../main.php?module=pres_proveedor&alert=1");
            } else {
                header("Location: ../../../main.php?module=pres_proveedor&alert=3");
            }
        }
    }

    elseif($_GET['act']=='anular'){
        if(isset($_GET['prc_cod'])){
            $prc_cod = $_GET['prc_cod'];
            //Anular cabecera de compra (cambiar estado a anulado)
            $query = mysqli_query($mysqli, "UPDATE pre_compras SET prc_est='ANULADO' WHERE prc_cod=$prc_cod")
            or die('Error in line 57 on proces: '.mysqli_error($mysqli));
            
            if($query){
                header("Location: ../../../main.php?module=pres_proveedor&alert=3");
            } else {
                header("Location: ../../../main.php?module=pres_proveedor&alert=4");
            }
        }
    }
}