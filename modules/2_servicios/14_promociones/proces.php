<?php 
session_start();

require_once '../../config/database.php';

if(empty($_SESSION['usu_nombre']) && empty($_SESSION['usu_pass'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=alert=3'>";
}
else{
    if($_GET['act']=='insert'){//cambiar act en form

        if(isset($_POST['Guardar'])){

            $pro_cod = $_POST['pro_cod'];
            $pro_porcen = $_POST['pro_porcen'];

            if (($pro_porcen < 0) or ($pro_porcen > 99)){
                header("Location: ../../main.php?module=promociones&alert=4");
                $sql = mysqli_query($mysqli, "DELETE FROM tmp_items");
            } else {
            
                //Insertar detalle de servicio
                $sql=mysqli_query($mysqli, "SELECT * FROM items it, tmp_items tmp WHERE it.ite_cod=tmp.ite_cod");
                
                while($row = mysqli_fetch_array($sql)){
                    $ite_cod= $row['ite_cod'];
                    $cantidad= $row['cantidad_tmp'];
                    $insert_detalle = mysqli_query($mysqli, "INSERT INTO detalle_promo (pro_cod, ite_cod, dpr_cant) 
                                                            VALUES ($pro_cod, $ite_cod, $cantidad)")
                                            or die('Error 22'.mysqli_error($mysqli));   
                }

                //traer los datos
                $pro_descri = strtoupper($_POST['pro_descri']);
            
                $pro_estado='ACTIVO';
                $pro_fecha_in = $_POST['pro_fecha_in'];
                $pro_fecha_fin = $_POST['pro_fecha_fin'];
                $pro_fecha = $_POST['pro_fecha'];
                $suc_cod = $_SESSION['suc_cod'];
                $emp_cod = $_POST['emp_cod'];


                //insertar 
                $query = mysqli_query($mysqli, "INSERT INTO promociones (pro_cod, pro_descri, pro_porcen, pro_estado, pro_fecha_in, pro_fecha_fin, pro_fecha, emp_cod, suc_cod)
                                                VALUES ($pro_cod, '$pro_descri', $pro_porcen, '$pro_estado', '$pro_fecha_in', '$pro_fecha_fin', '$pro_fecha', $emp_cod, $suc_cod)")
                                                or die('Error'.mysqli_error($mysqli));

                $sql_2 = mysqli_query($mysqli, "DELETE FROM tmp_items");

                if($query){
                    header("Location: ../../main.php?module=promociones&alert=1");
                } else {
                    header("Location: ../../main.php?module=promociones&alert=3");
                }
            }
        }
    }

    elseif($_GET['act']=='anular'){
        if(isset($_GET['pro_cod'])){
            $pro_cod = $_GET['pro_cod'];
            //Anular cabecera de promociones (cambiar estado a anulado)
            $query = mysqli_query($mysqli, "UPDATE promociones SET pro_estado='ANULADO' WHERE pro_cod=$pro_cod")
            or die('Error'.mysqli_error($mysqli));

            if($query){
                header("Location: ../../main.php?module=promociones&alert=2");
            } else {
                header("Location: ../../main.php?module=promociones&alert=3");
            }
        }
    } 
}
?>
