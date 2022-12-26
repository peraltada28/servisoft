<?php

    session_start();
    require_once "../../config/database.php";

    if(empty($_SESSION['fun_usu']) && empty($_SESSION['fun_pass'])){
        echo "<meta http-equiv='refresh' content='0; url=index.php?alert=3>";
    } else {
        //viene de form.php 2section form act=insert
        if($_GET['act'] == 'insert'){
            if(isset($_POST['Guardar'])){

                $suc_cod = $_POST['suc_cod'];
                $suc_nom = strtoupper($_POST['suc_nom']);
                $suc_dir = strtoupper($_POST['suc_dir']);
                $suc_fac = $_POST['suc_fac'];

                $query = mysqli_query($mysqli, "INSERT INTO sucursales VALUES ($suc_cod,'$suc_nom','$suc_dir','$suc_fac')") 
                                                or die(header("Location: ../../main.php?module=sucursales&alert=5"));

                if($query){
                    header("Location: ../../main.php?module=sucursales&alert=1");
                } else {
                    header("Location: ../../main.php?module=sucursales&alert=4");//error
                }
            }
        } else if($_GET['act']=='update'){
            if(isset($_POST['Guardar'])){
                if(isset($_POST['suc_cod'])){

                    $suc_cod = $_POST['suc_cod'];
                    $suc_nom = strtoupper($_POST['suc_nom']);
                    $suc_dir = strtoupper($_POST['suc_dir']);
                    $suc_fac = $_POST['suc_fac'];

                    $query = mysqli_query($mysqli, "UPDATE sucursales SET suc_nom = '$suc_nom',
                                                suc_dir = '$suc_dir', suc_fac = '$suc_fac' WHERE suc_cod = $suc_cod") 
                                                or die(header("Location: ../../main.php?module=sucursales&alert=5"));
                    if($query){
                        header("Location: ../../main.php?module=sucursales&alert=2");//desde view.php se estira el error
                    } else {
                        header("Location: ../../main.php?module=sucursales&alert=4");//error
                    }
                }
            }
            
        } else if($_GET['act']=='delete'){

            if(isset($_GET['suc_cod'])){
                $suc_cod = $_GET['suc_cod'];

                $query_cons = mysqli_query($mysqli, "SELECT suc_cod FROM funcionarios WHERE suc_cod = $suc_cod") 
                                                or die('Error '.mysqli_error($mysqli));
                //contar cuantos registros se usa ese codigo
                $count = mysqli_num_rows($query_cons);

                //si no se usa en algun registro, se puede eliminar
                if($count == 0){

                    $query = mysqli_query($mysqli, "DELETE FROM sucursales WHERE suc_cod = $suc_cod") 
                                                    or die('Error '.mysqli_error($mysqli));

                    if($query){
                        header("Location: ../../main.php?module=sucursales&alert=3");//desde view.php se estira el error
                    } else {
                        header("Location: ../../main.php?module=sucursales&alert=4");//error
                    }
                }else {
                    header("Location: ../../main.php?module=sucursales&alert=4");//error
                }
            }
        }
    }
?>
