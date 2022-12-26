<?php

    session_start();
    require_once "../../config/database.php";

    if(empty($_SESSION['fun_usu']) && empty($_SESSION['fun_pass'])){
        echo "<meta http-equiv='refresh' content='0; url=index.php?alert=3>";
    } else {
        //viene de form.php 2section form act=insert
        if($_GET['act'] == 'insert'){
            if(isset($_POST['Guardar'])){
                $veh_cod = $_POST['veh_cod'];
                $veh_chapa = $_POST['veh_chapa'];
                $veh_marca = $_POST['veh_marca'];
                $veh_color = $_POST['veh_color'];

                $query = mysqli_query($mysqli, "INSERT INTO vehiculos VALUES ($veh_cod, '$veh_chapa', '$veh_marca', '$veh_color')") 
                                                or die(header("Location: ../../main.php?module=vehiculos&alert=5"));

                if($query){
                    header("Location: ../../main.php?module=vehiculos&alert=1");
                } else {
                    header("Location: ../../main.php?module=vehiculos&alert=4");//error
                }
            }
        } else if($_GET['act']=='update'){
            if(isset($_POST['Guardar'])){
                if(isset($_POST['veh_cod'])){

                    $veh_cod = $_POST['veh_cod'];
                    $veh_chapa = $_POST['veh_chapa'];
                    $veh_marca = $_POST['veh_marca'];
                    $veh_color = $_POST['veh_color'];

                    $query = mysqli_query($mysqli, "UPDATE vehiculos SET veh_marca = '$veh_marca',
                                                                        veh_color = '$veh_color'
                                                WHERE veh_cod = $veh_cod") 
                                                or die(header("Location: ../../main.php?module=vehiculos&alert=5"));
                    if($query){
                        header("Location: ../../main.php?module=vehiculos&alert=2");//desde view.php se estira el error
                    } else {
                        header("Location: ../../main.php?module=vehiculos&alert=4");//error
                    }
                }
            }
            
        } else if($_GET['act']=='delete'){

            if(isset($_GET['veh_cod'])){
                $veh_cod = $_GET['veh_cod'];

                $query_id = mysqli_query($mysqli, "SELECT * FROM orden_trabajos WHERE veh_cod = $veh_cod AND ord_est = 'RECEPCION'") 
                                                or die('Error '.mysqli_error($mysqli));
                
                $count = mysqli_num_rows($query_id);  
                if($count <> 0){
                    
                    header("Location: ../../main.php?module=vehiculos&alert=6");

                } else{
                    $query_ = mysqli_query($mysqli, "DELETE FROM vehiculos WHERE veh_cod = $veh_cod") 
                                                or die('Error '.mysqli_error($mysqli));

                    if($query_){
                        header("Location: ../../main.php?module=vehiculos&alert=3");//desde view.php se estira el error
                    } else {
                        header("Location: ../../main.php?module=vehiculos&alert=4");//error
                    }
                }      
            }
        }
    }
?>
