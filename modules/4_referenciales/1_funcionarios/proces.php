<?php

    session_start();
    require_once "../../../config/database.php";

    if(empty($_SESSION['fun_usu']) && empty($_SESSION['fun_pass'])){
        echo "<meta http-equiv='refresh' content='0; url=index.php?alert=3'>";
    } else {
        //viene de form.php 2section form act=insert
        if($_GET['act'] == 'insert'){
            if(isset($_POST['Guardar'])){

                $fun_cod = $_POST['fun_cod'];
                $fun_nom = strtoupper($_POST['fun_nom']);
                $fun_ci = $_POST['fun_ci'];
                $fun_tel = $_POST['fun_tel'];
                $fun_est = 'ACTIVO';
                $bloqueo = 0;
                $fun_niv = $_POST['fun_niv'];
                $fun_usu = strtoupper($_POST['fun_usu']);
                $fun_pass = md5($_POST['fun_pass']);
                //---------------------------------
                $query = mysqli_query($mysqli, "INSERT INTO funcionarios (fun_cod, fun_nom, fun_ci, fun_tel, fun_est, fun_blo, fun_niv, fun_usu, fun_pass)
                VALUES ($fun_cod, '$fun_nom', $fun_ci, $fun_tel, '$fun_est', $bloqueo, '$fun_niv', '$fun_usu', '$fun_pass')") 
                                                /*or die(header("Location: ../../../main.php?module=funcionarios&alert=5"));*/
                                                or die('Error '.mysqli_error($mysqli));

                if($query){
                    header("Location: ../../../main.php?module=funcionarios&alert=1");
                } else {
                    header("Location: ../../../main.php?module=funcionarios&alert=4");//error
                }
            }
        } else if($_GET['act']=='update'){
            if(isset($_POST['Guardar'])){
                if(isset($_POST['fun_cod'])){

                    $fun_cod = $_POST['fun_cod'];
                    $fun_nom = strtoupper($_POST['fun_nom']);
                    $fun_tel = $_POST['fun_tel'];
                    $fun_pass = $_POST['fun_pass'];
                    $fun_niv = $_POST['fun_niv'];
                    //---------------------------------

                    $query = mysqli_query($mysqli, "UPDATE funcionarios SET fun_nom = '$fun_nom', fun_tel = $fun_tel, 
                                                                            fun_niv = '$fun_niv', fun_pass = '$fun_pass'
                                                    WHERE fun_cod = $fun_cod") 
                                                    or die(header("Location: ../../../main.php?module=funcionarios&alert=5"));
                    if($query){
                        header("Location: ../../../main.php?module=funcionarios&alert=2");//desde view.php se estira el error
                    } else {
                        header("Location: ../../../main.php?module=funcionarios&alert=4");//error
                    }
                }
            }
        } else if($_GET['act']=='delete'){

            if(isset($_GET['fun_cod'])){
                $codigo = $_GET['fun_cod'];

                $query = mysqli_query($mysqli, "DELETE FROM funcionarios WHERE fun_cod = $codigo") 
                                                or die('Error '.mysqli_error($mysqli));

                if($query){
                    header("Location: ../../../main.php?module=funcionarios&alert=3");//desde view.php se estira el error
                } else {
                    header("Location: ../../../main.php?module=funcionarios&&alert=4");//error
                }
            }
        } else if($_GET['act']=='desbloquear'){

            if(isset($_GET['fun_cod'])){
                $codigo = $_GET['fun_cod'];

                $query = mysqli_query($mysqli, "UPDATE funcionarios SET fun_est = 'ACTIVO', fun_blo = 0 WHERE fun_cod = $codigo") 
                                                or die('Error '.mysqli_error($mysqli));

                if($query){
                    header("Location: ../../../main.php?module=funcionarios&alert=3");//desde view.php se estira el error
                } else {
                    header("Location: ../z../../main.php?module=funcionarios&&alert=4");//error
                }
            }
        }
    }
?>
