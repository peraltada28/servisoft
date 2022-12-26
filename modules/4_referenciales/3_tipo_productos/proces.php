<?php

    session_start();
    require_once "../../config/database.php";

    if(empty($_SESSION['fun_usu']) && empty($_SESSION['fun_pass'])){
        echo "<meta http-equiv='refresh' content='0; url=index.php?alert=3>";
    } else {
        //viene de form.php 2section form act=insert
        if($_GET['act'] == 'insert'){
            if(isset($_POST['Guardar'])){

                $tip_cod = $_POST['tip_cod'];
                $tip_des = strtoupper($_POST['tip_des']);

                //consulta
                $fecha_hora = mysqli_query($mysqli, "SELECT NOW() as fecha_h") 
                            or die(header("Location: ../../main.php?module=tipo_items&alert=5"));

                $fecha_assoc = mysqli_fetch_assoc($fecha_hora);
                $fecha = $fecha_assoc['fecha_h'];

                $query = mysqli_query($mysqli, "INSERT INTO tipo_items (tip_cod, tip_des)
                                                VALUES ($tip_cod,'$fecha')") 
                                                or die(header("Location: ../../main.php?module=tipo_items&alert=5"));

                if($query){
                    header("Location: ../../main.php?module=tipo_items&alert=1");
                } else {
                    header("Location: ../../main.php?module=tipo_items&alert=4");//error
                }
            }
        } else if($_GET['act']=='update'){
            if(isset($_POST['Guardar'])){
                if(isset($_POST['tip_cod'])){

                    $tip_cod = $_POST['tip_cod'];
                    $tip_des = strtoupper($_POST['tip_des']);

                    $query = mysqli_query($mysqli, "UPDATE tipo_items SET tip_des = '$tip_des'
                                                WHERE tip_cod = $tip_cod") 
                                                or die(header("Location: ../../main.php?module=tipo_items&alert=5"));
                    if($query){
                        header("Location: ../../main.php?module=tipo_items&alert=2");//desde view.php se estira el error
                    } else {
                        header("Location: ../../main.php?module=tipo_items&alert=4");//error
                    }
                }
            }
            
        } else if($_GET['act']=='delete'){

            if(isset($_GET['tip_cod'])){
                $tip_cod = $_GET['tip_cod'];

                //preguntar si se usa en la otra tabla
                $query_cons = mysqli_query($mysqli, "SELECT tip_cod FROM items WHERE tip_cod = $tip_cod") 
                                                or die('Error '.mysqli_error($mysqli));
                //contar cuantos registros se usa ese codigo
                $count = mysqli_num_rows($query_cons);

                //si no se usa en algun registro, se puede eliminar
                if($count == 0){
                    $query = mysqli_query($mysqli, "DELETE FROM tipo_items WHERE tip_cod = $tip_cod") 
                                                    or die('Error '.mysqli_error($mysqli));

                    if($query){
                        header("Location: ../../main.php?module=tipo_items&alert=3");//desde view.php se estira el error
                    } else {
                        header("Location: ../../main.php?module=tipo_items&alert=4");//error
                    }
                //si se usa en algun registro, no se puede eliminar
                } else {
                    
                    header("Location: ../../main.php?module=tipo_items&alert=5");
                }
            }
        }
    }
?>
