<?php

    session_start();
    require_once "../../config/database.php";

    if(empty($_SESSION['fun_usu']) && empty($_SESSION['fun_pass'])){
        echo "<meta http-equiv='refresh' content='0; url=index.php?alert=3'>";
    } else {
        //viene de form.php 2section form act=insert
        if($_GET['act'] == 'insert'){
            if(isset($_POST['Guardar'])){

                $cli_cod    = $_POST['cli_cod'];
                $cli_nom    = strtoupper($_POST['cli_nom']);
                $cli_ape    = strtoupper($_POST['cli_ape']);
                $cli_ci     = $_POST['cli_ci'];
                $cli_tel    = $_POST['cli_tel'];
                $cli_dir  = strtoupper($_POST['cli_dir']);
                //---------------------------------
                if(!empty($_POST['cli_tel'])){
                    $cli_tel = $_POST['cli_tel'];
                } else {
                    $cli_tel = 000;
                }
                //---------------------------------
                $query = mysqli_query($mysqli, "INSERT INTO clientes (cli_cod, cli_nom, cli_ape, cli_ci, cli_tel, cli_dir)
                                                VALUES ($cli_cod, '$cli_nom','$cli_ape', $cli_ci, $cli_tel,'$cli_dir')") 
                                                or die(header("Location: ../../main.php?module=clientes&alert=5"));

                if($query){
                    header("Location: ../../main.php?module=clientes&alert=1");
                } else {
                    header("Location: ../../main.php?module=clientes&alert=4");//error
                }
            }
        } else if($_GET['act']=='update'){
            if(isset($_POST['Guardar'])){
                if(isset($_POST['cli_cod'])){

                    $cli_cod = $_POST['cli_cod'];
                    $cli_nom = strtoupper($_POST['cli_nom']);
                    $cli_ape = strtoupper($_POST['cli_ape']);
                    $cli_ci = $_POST['cli_ci'];
                    $cli_tel = $_POST['cli_tel'];
                    $cli_dir =  strtoupper($_POST['cli_dir']);
                    //---------------------------------
                    if(!empty($_POST['cli_tel'])){
                        $cli_tel = $_POST['cli_tel'];
                    } else {
                        $cli_tel = 000;
                    }
                    //---------------------------------

                    $query = mysqli_query($mysqli, "UPDATE clientes SET cli_nom = '$cli_nom', cli_ape ='$cli_ape', cli_ci ='$cli_ci',
                                                                        cli_tel = '$cli_tel', cli_dir = '$cli_dir'
                                                    WHERE cli_cod = $cli_cod") 
                                                    or die(header("Location: ../../main.php?module=clientes&alert=5"));
                    if($query){
                        header("Location: ../../main.php?module=clientes&alert=2");//desde view.php se estira el error
                    } else {
                        header("Location: ../../main.php?module=clientes&alert=4");//error
                    }
                }
            }
        } else if($_GET['act']=='delete'){

            if(isset($_GET['cli_cod'])){
                $codigo = $_GET['cli_cod'];

                $query = mysqli_query($mysqli, "DELETE FROM clientes WHERE cli_cod = $codigo") 
                                                or die('Error '.mysqli_error($mysqli));

                if($query){
                    header("Location: ../../main.php?module=clientes&alert=3");//desde view.php se estira el error
                } else {
                    header("Location: ../../main.php?module=clientes&&alert=4");//error
                }
            }
        }
    }
?>
