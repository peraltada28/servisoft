<?php

    session_start();
    require_once "../../config/database.php";

    if(empty($_SESSION['usu_nombre']) && empty($_SESSION['usu_pass'])){
        echo "<meta http-equiv='refresh' content='0; url=index.php?alert=3>";
    } else {
        //viene de form.php 2section form act=insert
        if($_GET['act'] == 'insert'){
            if(isset($_POST['Guardar'])){

                $codigo = $_POST['codigo'];
                $dep_descripcion = $_POST['dep_descripcion'];


                //UNO
                //capturar por post del form.php
                $uno = $_POST['uno'];
                //si el seleccionado es si, capturar el txt
                if($uno == 'Si'){
                    $uno_descrip = $_POST['uno_descrip'];
                    $uno = trim("Si, $uno_descrip");
                }//si no, el seleccionado es NO


                //DOS
                //capturar por post del form.php
                $dos = $_POST['dos'];
                //si el seleccionado es si, capturar el txt
                if($dos == 'Si'){
                    $dos_descrip = $_POST['dos_descrip'];
                    $dos = trim("Si, $dos_descrip");
                }//si no, el seleccionado es NO

                
                //TRES
                //capturar los checkbox
                //------------------------------
                if(isset($_POST['tres_1'])){

                    $tres_1 = $_POST['tres_1'];
                
                } else {
                    $tres_1 ="";
                }
                
                //------------------------------
                if(isset($_POST['tres_2'])){

                    $tres_2 = $_POST['tres_2'];
                
                } else {
                    $tres_2 ="";
                }

                //------------------------------
                if(isset($_POST['tres_3'])){

                    $tres_3 = $_POST['tres_3'];
                
                } else {
                    $tres_3 ="";
                }

                //------------------------------
                if(isset($_POST['tres_4'])){

                    $tres_4 = $_POST['tres_4'];
                
                } else {
                    $tres_4 ="";
                }

                //------------------------------
                if(isset($_POST['tres_5'])){

                    $tres_5 = $_POST['tres_5'];
                
                } else {
                    $tres_5 ="";
                }

                //------------------------------
                if(isset($_POST['tres_6'])){

                    $tres_6 = $_POST['tres_6'];
                
                } else {
                    $tres_6 ="";
                }

                //------------------------------
                if(isset($_POST['tres_7'])){

                    $tres_7 = $_POST['tres_7'];
                
                } else {
                    $tres_7 ="";
                }

                //------------------------------
                if(isset($_POST['tres_8'])){

                    $tres_8 = $_POST['tres_8'];
                
                } else {
                    $tres_8 ="";
                }

                //------------------------------
                if(isset($_POST['tres_9'])){

                    $tres_9 = $_POST['tres_9'];
                
                } else {
                    $tres_9 ="";
                }

                //------------------------------
                if(isset($_POST['tres_10'])){

                    $tres_10 = $_POST['tres_10'];
                
                } else {
                    $tres_10 ="";
                }

                //------------------------------
                if(isset($_POST['tres_11'])){

                    $tres_11 = $_POST['tres_11'];
                
                } else {
                    $tres_11 ="";
                }

                //------------------------------
                if(isset($_POST['tres_12'])){

                    $tres_12 = $_POST['tres_12'];
                
                } else {
                    $tres_12 ="";
                }

                //------------------------------
                if(isset($_POST['tres_13'])){

                    $tres_13 = $_POST['tres_13'];
                
                } else {
                    $tres_13 ="";
                }

                //------------------------------
                if(isset($_POST['tres_14'])){

                    $tres_14 = $_POST['tres_14'];
                
                } else {
                    $tres_14 ="";
                }

                //------------------------------
                if(isset($_POST['tres_15'])){

                    $tres_15 = $_POST['tres_15'];
                
                } else {
                    $tres_15 ="";
                }

                //------------------------------
                if(isset($_POST['tres_16'])){

                    $tres_16 = $_POST['tres_16'];
                
                } else {
                    $tres_16 ="";
                }

                //------------------------------
                if(isset($_POST['tres_17'])){

                    $tres_17 = $_POST['tres_17'];
                
                } else {
                    $tres_17 ="";
                }

                //------------------------------
                if(isset($_POST['tres_18'])){

                    $tres_18 = $_POST['tres_18'];
                
                } else {
                    $tres_18 ="";
                }

                //------------------------------
                if(isset($_POST['tres_19'])){

                    $tres_19 = $_POST['tres_19'];
                
                } else {
                    $tres_19 ="";
                }

                //------------------------------
                if(isset($_POST['tres_20'])){

                    $tres_20 = $_POST['tres_20'];
                
                } else {
                    $tres_20 ="";
                }

                //------------------------------
                if(isset($_POST['tres_21'])){

                    $tres_21 = $_POST['tres_21'];
                
                } else {
                    $tres_21 ="";
                }

                //------------------------------
                if(isset($_POST['tres_22'])){

                    $tres_22 = $_POST['tres_22'];
                
                } else {
                    $tres_22 ="";
                }

                //------------------------------
                if(isset($_POST['tres_23'])){

                    $tres_23 = $_POST['tres_23'];
                
                } else {
                    $tres_23 ="";
                }

                //------------------------------
                if(isset($_POST['tres_24'])){

                    $tres_24 = $_POST['tres_24'];
                
                } else {
                    $tres_24 ="";
                }

                //------------------------------
                
                //concatenar checkbox
                $tres = trim("$tres_1 $tres_2 $tres_3 $tres_4 $tres_5 $tres_6 $tres_7 $tres_8 $tres_9 $tres_10 $tres_11 $tres_12 $tres_13 $tres_14 $tres_15 $tres_16 $tres_17 $tres_18 $tres_19 $tres_20 $tres_21 $tres_22 $tres_23 $tres_24 ");

                
                //CUATRO
                //capturar por post del form.php
                $cuatro = $_POST['cuatro'];
                //si el seleccionado es si, capturar el txt
                if($cuatro == 'Si'){
                    $cuatro_descrip = $_POST['cuatro_descrip'];
                    $cuatro = trim("Si, $cuatro_descrip");
                }//si no, el seleccionado es NO

                //CINCO
                //capturar por post del form.php
                $cinco = $_POST['cinco'];
                //si el seleccionado es si, capturar el txt
                if($cinco == 'Si'){
                    $cinco_descrip = $_POST['cinco_descrip'];
                    $cinco = trim("Si, $cinco_descrip");
                }//si no, el seleccionado es NO


                //SEIS
                $seis = $_POST['seis'];

                //SIETE
                //capturar por post del form.php
                $siete = $_POST['siete'];
                //si el seleccionado es si, capturar el txt
                if($siete == 'Si'){
                    $inicio = "Si, hace: ";
                    $cantidad = ", cantidad: ";
                    $siete_des_1 = $_POST['siete_des_1'];
                    $siete_des_2 = $_POST['siete_des_2'];

                    //capturar en variables ya que no se porque no estira con el concat
                    $siete = trim("$inicio $siete_des_1 $cantidad $siete_des_2");
                }//si no, el seleccionado es NO

                //OCHO
                //capturar por post del form.php
                $ocho = $_POST['ocho'];
                //si el seleccionado es si, capturar el txt
                if($ocho == 'Si'){
                    $ocho_descrip = $_POST['ocho_descrip'];
                    $ocho = trim("Si, $ocho_descrip");
                }//si no, el seleccionado es NO


                //NUEVE
                //capturar por post del form.php
                $nueve = $_POST['nueve'];
                //si el seleccionado es si, capturar el txt
                if($nueve == 'Si'){
                    $nueve_descrip = $_POST['nueve_descrip'];
                    $nueve = trim("Si, $nueve_descrip");
                }//si no, el seleccionado es NO

                //DIEZ
                $diez = $_POST['diez'];

                //ONCE
                //capturar por post del form.php
                $once = $_POST['once'];
                //si el seleccionado es si, capturar el txt
                if($once == 'Si'){
                    $once_descrip = $_POST['once_descrip'];
                    $once = trim("Si, $once_descrip");
                }//si no, el seleccionado es NO

                //DOCE
                $doce = $_POST['doce'];

                //TRECE
                $trece = $_POST['trece'];

                //CATORCE 
                $catorce = $_POST['catorce'];

                //QUINCE
                $quince = $_POST['quince'];

                //DIECISEIS
                //---------------
                if(isset($_POST['dieciseis_1'])){

                    $dieciseis_1 = $_POST['dieciseis_1'];
                } else {
                    $dieciseis_1 ="";
                }

                //---------------
                if(isset($_POST['dieciseis_2'])){

                    $dieciseis_2 = $_POST['dieciseis_2'];
                } else {
                    $dieciseis_2 ="";
                }

                //---------------
                if(isset($_POST['dieciseis_3'])){

                    $dieciseis_3 = $_POST['dieciseis_3'];
                } else {
                    $dieciseis_3 ="";
                }

                //---------------
                if(isset($_POST['dieciseis_4'])){

                    $dieciseis_4 = $_POST['dieciseis_4'];
                } else {
                    $dieciseis_4 ="";
                }

                //---------------
                $dieciseis = trim("$dieciseis_1 $dieciseis_2 $dieciseis_3 $dieciseis_4");

                $lista = array("$uno","$dos","$tres","$cuatro","$cinco","$seis", "$siete", "$ocho","$nueve","$diez","$once","$doce", "$trece","$catorce","$quince","$dieciseis");


                //insert detalle
                $contador =0;

                while($contador< 16){
                    $detalle_items  =   $lista[$contador];
                    $contador       =   $contador + 1;

                    $query = mysqli_query($mysqli, "INSERT INTO detalle (fic_id, ite_id, det_fic_ite, det_fic_his)
                                                VALUES ($codigo, $contador,'$detalle_items', 'jeje')") 
                                                or die('Error 360: '.mysqli_error($mysqli));

                }
                
                //insert cabecera
                $query = mysqli_query($mysqli, "INSERT INTO prueba (cod, descrip, valor)
                                                VALUES ($codigo, '$dep_descripcion', 'jeje')") 
                                                or die('Error 393: '.mysqli_error($mysqli));

                if($query){
                    header("Location: ../../main.php?module=deposito&alert=1");
                } else {
                    header("Location: ../../main.php?module=deposito&alert=4");//error
                }
            }
        } 
    }
?>