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

            //Insertar detalle de salidas
            $sql=mysqli_query($mysqli, "SELECT * FROM vehiculos, tmp_sal tmp WHERE vehiculos.cod_vehiculo=tmp.cod_vehiculo");
            while($row = mysqli_fetch_array($sql)){

                $cod_vehiculo= $row['cod_vehiculo'];

                $insert_detalle = mysqli_query($mysqli, "INSERT INTO det_salida (cod_vehiculo, cod_salida) 
                                                        VALUES ($cod_vehiculo, $codigo)")
                                                        or die('Error'.mysqli_error($mysqli));

            }

            //Insertar cabecera de entrada
            //Definir variables
            $fecha = $_POST['fecha'];
            $hora = $_POST['hora'];
            $estado='retirado';
            $usuario = $_SESSION['cod_usuario'];
            $funcionario = $_POST['codigo_funcionario'];
            $motivo = $_POST['codigo_motivo'];
            //insertar
            $query = mysqli_query($mysqli, "INSERT INTO salidas (cod_salida, cod_usuario, cod_funcionario, cod_motivo, fecha, hora, estado)
                                            VALUES ($codigo, $usuario, $funcionario, $motivo, '$fecha', '$hora', '$estado')")
            or die('Error'.mysqli_error($mysqli));

            if($query){
                header("Location: ../../main.php?module=salidas&alert=1");
            } else {
                header("Location: ../../main.php?module=salidas&alert=3");
            }
        }
    }

    elseif($_GET['act']=='anular'){
        if(isset($_GET['cod_salida'])){
            $codigo = $_GET['cod_salida'];
            //Anular cabecera de compra (cambiar estado a anulado)
            $query = mysqli_query($mysqli, "UPDATE salidas SET estado='anulado' WHERE cod_salida=$codigo")
            or die('Error'.mysqli_error($mysqli));

            
            if($query){
                header("Location: ../../main.php?module=entradas&alert=2");
            } else {
                header("Location: ../../main.php?module=entradas&alert=3");
            }
        }
        
    } 
}
?>
