<?php

    session_start();
    require_once "../../config/database.php";

    if(empty($_SESSION['fun_usu']) && empty($_SESSION['fun_pass'])){
        echo "<meta http-equiv='refresh' content='0; url=index.php?alert=3>";
    } else {
        //viene de form.php 2section form act=insert
        if($_GET['act'] == 'insert'){
            if(isset($_POST['Guardar'])){

                $ite_cod = $_POST['ite_cod'];
                $ite_des = strtoupper($_POST['ite_des']);
                $tip_cod = $_POST['tip_cod'];
                $ite_pre = $_POST['ite_pre'];

                $query = mysqli_query($mysqli, "INSERT INTO items VALUES ($ite_cod, $tip_cod, '$ite_des', $ite_pre)") 
                                                or die('Error '.mysqli_error($mysqli));

                if($query){
                    header("Location: ../../main.php?module=items&alert=1");
                } else {
                    header("Location: ../../main.php?module=items&alert=4");//error
                }
            }
       
        } else if($_GET['act']=='update'){
            if(isset($_POST['Guardar'])){
                if(isset($_POST['ite_cod'])){

                    $ite_cod = $_POST['ite_cod'];
                    $ite_des = strtoupper($_POST['ite_des']);
                    $tip_cod = $_POST['tip_cod'];
                    $ite_pre = $_POST['ite_pre'];

                    $query = mysqli_query($mysqli, "UPDATE items SET  tip_cod = $tip_cod, ite_des = '$ite_des', ite_pre = $ite_pre
                                                                WHERE ite_cod = $ite_cod") 
                                                                or die('Error '.mysqli_error($mysqli));
                    if($query){
                        header("Location: ../../main.php?module=items&alert=2");
                    } else {
                        header("Location: ../../main.php?module=items&alert=4");
                    }
                }
            }
        } else if($_GET['act']=='delete'){

            if(isset($_GET['ite_cod'])){
                $ite_cod = $_GET['ite_cod'];//viene de la tabla en view.php

                $query = mysqli_query($mysqli, "DELETE FROM items WHERE ite_cod = $ite_cod") 
                                                or die('Error '.mysqli_error($mysqli));

                if($query){
                    header("Location: ../../main.php?module=items&alert=3");//desde view.php se estira el error
                } else {
                    header("Location: ../../main.php?module=items&&alert=4");//error
                }
            }
        }
    }
?>
