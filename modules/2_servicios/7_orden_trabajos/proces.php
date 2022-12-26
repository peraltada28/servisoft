<?php 
session_start();

require_once '../../config/database.php';

if(empty($_SESSION['fun_nom']) && empty($_SESSION['fun_pass'])){

    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=alert=3'>";

} else {
    if($_GET['act']=='insert'){//cambiar act en form
        if(isset($_POST['Guardar'])){
            $ord_cod = $_POST['ord_cod'];
            $ord_fec = $_POST['ord_fec'];
            $ord_con = $_POST['ord_con'];
            $ord_est = 'RECEPCION';
            $ord_des = strtoupper($_POST['ord_des']);
            $cli_cod = $_POST['cli_cod'];
            $veh_cod = $_POST['veh_cod'];
            $suc_cod = $_SESSION['suc_cod'];
            
            //-------------------------------------------

            //insertar 
            $query = mysqli_query($mysqli, "INSERT INTO orden_trabajos (ord_cod, ord_fec, ord_con, ord_est, ord_des, cli_cod, veh_cod, suc_cod)
                                            VALUES ($ord_cod, '$ord_fec', '$ord_con', '$ord_est', '$ord_des', $cli_cod, $veh_cod, $suc_cod)")
                                            or die('Error line 25: '.mysqli_error($mysqli));

        
            if($query){
                header("Location: ../../main.php?module=form_orden_trabajos&form=edit&ord_cod=$ord_cod");
            } else {
                header("Location: ../../main.php?module=orden_trabajos&alert=3");
            }
        }
    } elseif($_GET['act']=='edit'){//cambiar act en form
        if(isset($_POST['Guardar'])){
            $ord_cod = $_POST['ord_cod'];
            $ord_con = $_POST['ord_con'];
            $ord_des = strtoupper($_POST['ord_des']);
            $cli_cod = $_POST['cli_cod'];
            $veh_cod = $_POST['veh_cod'];
            
            //-------------------------------------------
            //actualizar 
            $query_upd = mysqli_query($mysqli, "UPDATE orden_trabajos SET ord_con = $ord_con, ord_des = $ord_des, cli_cod = $cli_cod, veh_cod = $veh_cod, )
                                            WHERE ord_cod = $ord_cod")
                                            or die('Error line 50: '.mysqli_error($mysqli));
        
            if($query_upd){
                header("Location: ../../main.php?module=orden_trabajos&alert=2");
            } else {
                header("Location: ../../main.php?module=orden_trabajos&alert=3");
            }
        }
    }  elseif($_GET['act']=='insert_per'){//cambiar act en form
        if(isset($_POST['Guardar'])){
            $ord_cod = $_POST['ord_cod'];
            $asi_fec = $_POST['asi_fec'];

            $consultar = mysqli_query($mysqli, "SELECT * FROM tmp_fun t, funcionarios f WHERE t.fun_cod = f.fun_cod")
            or die('Error line 61: '.mysqli_error($mysqli));
            
            while ($data_consultar = mysqli_fetch_assoc($consultar)){    
                $fun_cod = $_POST['fun_cod'];

                $query_upd = mysqli_query($mysqli, "INSERT INTO asignacion_personal VALUES ($ord_cod,$fun_cod,'$asi_fec');")
                                            or die('Error line 70: '.mysqli_error($mysqli));
            }
        
            if($query_upd){
                header("Location: ../../main.php?module=form_orden_trabajos&form=edit&ord_cod=$ord_cod");
            } else {
                header("Location: ../../main.php?module=orden_trabajos&alert=3");
            }
        }


    //si no, si la actividad es eliminar de la asignacion del personal
    } elseif($_GET['act']=='delete_asig'){//cambiar act en form
        if(isset($_GET['fun_cod'])){
            $ord_cod = $_GET['ord_cod'];
            $fun_cod = $_GET['fun_cod'];

            $delete_asig = mysqli_query($mysqli, "DELETE FROM asignacion_personal 
                                                WHERE fun_cod = $fun_cod AND ord_cod = $ord_cod")
            or die('Error line 61: '.mysqli_error($mysqli));
            
            if($delete_asig){
                header("Location: ../../main.php?module=form_orden_trabajos&form=edit&ord_cod=$ord_cod");
            } else {
                header("Location: ../../main.php?module=orden_trabajos&alert=3");
            }
        }
    }

    //si no, si la actividad es anular la orden, realizar la accion
    elseif($_GET['act']=='anular'){
        if(isset($_GET['ord_cod'])){
            $ord_cod = $_GET['ord_cod'];

            //Anular cabecera de orden_trabajo (cambiar estado a anulado)
            $query_del = mysqli_query($mysqli, "UPDATE orden_trabajos SET ord_est = 'ANULADO' WHERE ord_cod = $ord_cod")
                            or die('Error'.mysqli_error($mysqli));        

            if($query_del){
                header("Location: ../../main.php?module=orden_trabajos&alert=2");
            } else {
                header("Location: ../../main.php?module=orden_trabajos&alert=3");
            }
        }
    }
} 
?>
