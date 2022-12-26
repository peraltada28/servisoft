<?php 
session_start();

require_once '../../config/database.php';

if(empty($_SESSION['usu_nombre']) && empty($_SESSION['usu_pass'])){
    echo "<meta http-equiv='refresh' content='0; url=index.php?alert=alert=3'>";
}
else{
    if($_GET['act']=='insert'){//cambiar act en form_ac
        if(isset($_POST['Guardar'])){
            $codigo = $_POST['codigo'];
            //Insertar detalle de ENTRADA
            $sql=mysqli_query($mysqli, "SELECT * FROM vehiculos, tmp WHERE vehiculos.cod_vehiculo=tmp.cod_vehiculo");
            while($row = mysqli_fetch_array($sql)){
                $cod_vehiculo= $row['cod_vehiculo'];
                $insert_detalle = mysqli_query($mysqli, "INSERT INTO det_entrada (cod_vehiculo, cod_entrada) 
                                                        VALUES ($cod_vehiculo, $codigo)")
                or die('Error'.mysqli_error($mysqli));

            }
            //Insertar cabecera de entrada
            //Definir variables
            $fecha = $_POST['fecha'];
            $hora = $_POST['hora'];
            $estado='ingresado';
            $usuario = $_SESSION['cod_usuario'];
            $funcionario = $_POST['codigo_funcionario'];
            $motivo = $_POST['codigo_motivo'];
            //insertar
            $query = mysqli_query($mysqli, "INSERT INTO entradas (cod_entrada, cod_usuario, cod_funcionario, cod_motivo, fecha, hora, estado)
                                            VALUES ($codigo, $usuario, $funcionario, $motivo, '$fecha', '$hora', '$estado')")
            or die('Error'.mysqli_error($mysqli));
            

            if($query){
                header("Location: ../../main.php?module=entradas&alert=1");
            } else {
                header("Location: ../../main.php?module=entradas&alert=3");
            }
        }
    }

    elseif($_GET['act']=='anular'){
        if(isset($_GET['cod_entrada'])){
            $codigo = $_GET['cod_entrada'];
            //Anular cabecera de compra (cambiar estado a anulado)
            $query = mysqli_query($mysqli, "UPDATE entradas SET estado='anulado' WHERE cod_entrada=$codigo")
            or die('Error'.mysqli_error($mysqli));


            //Consultar detalle de compra con el código que llegó por get
            $sql = mysqli_query($mysqli, "SELECT * FROM abastecimientos WHERE cod_entrada=$codigo");
            while($row = mysqli_fetch_array($sql)){
                $cod_item = $row['cod_item'];
                $cantidad = $row['cant_litros'];
                $codigo_deposito = 1;

                $actualizar_stock = mysqli_query($mysqli, "UPDATE stock set cantidad = cantidad - $cantidad
                WHERE cod_item=$cod_item
                AND cod_deposito=$codigo_deposito")
                or die('Error'.mysqli_error($mysqli));
            }
            if($query){
                header("Location: ../../main.php?module=entradas&alert=2");
            } else {
                header("Location: ../../main.php?module=entradas&alert=3");
            }
        }


        //-----------------------------ACTION DE FORM_AC--------------------------------------------
    } else if($_GET['act']=='insert_ac'){//cambiar act en form_ac
        if(isset($_POST['Guardar'])){
            $codigo = $_POST['codigo'];//entrada
            $codigo_item = $_POST['codigo_item'];//item
            $cant_litros = $_POST['cant_litros'];//cant_litros
            //----------------------------------------------------------------------------------------------
            //calcular cod_abastecimiento
            $query_ab = mysqli_query($mysqli, "SELECT MAX(cod_abas) as id FROM abastecimientos")
                                                        or die('Error'.mysqli_error($mysqli));

            $count = mysqli_num_rows($query_ab);  
            if($count <> 0){
                $data_ab = mysqli_fetch_assoc($query_ab);
                $codigo_ab = $data_ab['id']+1;
            } else{
                $codigo_ab=1;
            } 

            $sql=mysqli_query($mysqli, "SELECT * FROM vehiculos, tmp WHERE vehiculos.cod_vehiculo=tmp.cod_vehiculo");
            while($row = mysqli_fetch_array($sql)){
                $cod_vehiculo= $row['cod_vehiculo'];
                //----------------------------------------------------------------------------------------------
                $insert_detalle = mysqli_query($mysqli, "INSERT INTO det_entrada (cod_vehiculo, cod_entrada) 
                                                        VALUES ($cod_vehiculo, $codigo)")
                or die('Error'.mysqli_error($mysqli));

                //----------------------------------------------------------------------------------------------
                //insertar abastecimiento
                $insert_abastecimiento = mysqli_query($mysqli, "INSERT INTO abastecimientos (cod_abas, cod_entrada, cod_item, cant_litros) 
                                                        VALUES ($codigo_ab, $codigo, $codigo_item, $cant_litros)")
                or die('Error'.mysqli_error($mysqli));
                //----------------------------------------------------------------------------------------------
                //Insertar stock
                $codigo_deposito = 1;
                $query = mysqli_query($mysqli, "SELECT * FROM stock WHERE cod_item=$codigo_item
                                                AND cod_deposito=$codigo_deposito") 
                                                or die('Error'.mysqli_error($mysqli));
                if($count = mysqli_num_rows($query)==0){
                    //Insertar
                    $insertar_stock = mysqli_query($mysqli, "INSERT INTO stock (cod_deposito, cod_item, cantidad)
                    VALUES ($codigo_deposito, $codigo_item,$cant_litros )")
                    or die('Error'.mysqli_error($mysqli));
                }else {
                    //actualizar
                    $actualizar_stock = mysqli_query($mysqli, "UPDATE stock SET cantidad = cantidad + $cant_litros
                    WHERE cod_item=$codigo_item
                    AND cod_deposito=$codigo_deposito ")
                    or die('Error'.mysqli_error($mysqli));
                }
            }
            //----------------------------------------------------------------------------------------------
            //Insertar cabecera de entrada/abastecimiento
            //Definir variables
            $fecha = $_POST['fecha'];
            $hora = $_POST['hora'];
            $estado='activo';
            $usuario = $_SESSION['cod_usuario'];
            $funcionario = $_POST['codigo_funcionario'];
            $motivo = 3;
            //insertar
            $query = mysqli_query($mysqli, "INSERT INTO entradas (cod_entrada, cod_usuario, cod_funcionario, cod_motivo, fecha, hora, estado)
                                            VALUES ($codigo, $usuario, $funcionario, $motivo, '$fecha', '$hora', '$estado')")
            or die('Error'.mysqli_error($mysqli));

            if($query){
                header("Location: ../../main.php?module=entradas&alert=1");
            } else {
                header("Location: ../../main.php?module=entradas&alert=3");
            }
        }
    } 
}
?>
