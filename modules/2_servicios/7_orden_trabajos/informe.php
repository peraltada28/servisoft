<?php 
require_once "../../config/database.php";
?>

<!DOCTYPE html>
<html lang="es">
    
    <link rel="shortcut icon" href="../../assets/img/frio_2.png">
    <link href="../../assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="../../assets/plugins/font-awesome-4.6.3/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../../assets/css/AdminLTE.min.css" rel="stylesheet" type="text/css" >
    <link href="../../assets/css/style.css" rel="stylesheet" type="text/css" >

    <head>
        <meta charset="UTF-8">
        <title>Orden Trabajo</title> 
    </head>

    <body>
        <?php
        
            if($_GET['act']=='print_soli'){
                if(isset($_GET['ord_cod'])){//si existe en la bd el ord_cod
                    $ord_cod = $_GET['ord_cod'];
                    
                    $query = mysqli_query($mysqli, "SELECT * FROM v_orden_trabajos WHERE ord_cod = $ord_cod")
                                                    or die('Error: '.mysqli_error($mysqli));

                    while($data = mysqli_fetch_assoc($query)){
                        $ord_cod = $data ['ord_cod'];
                        $ord_fec = $data ['ord_fec'];
                        $ord_est = $data ['ord_est'];
                        $ord_des = $data ['ord_des'];
                        $suc_nom = $data ['suc_nom'];
                        $suc_dir = $data ['suc_dir'];
                        $cli_nom_ape = $data ['cli_nom_ape'];
                        $cli_ci = $data ['cli_ci'];
                        $veh_chapa_marca = $data ['veh_chapa_marca'];
                        
                    }
                }
            }
        ?>
        <h3 align='center'>SERVISOFT TALLER</h3>
        <table id="dataTables1" class="table table-bordered">
            <thead>
                <tr style="height:150px; align:center">
                    <th style="width:450px;">
                        <p align='center'>TALLER DE REFRIGERACION</p>
                        
                    </th>
                    <th>
                        <p align='center'>ORDEN DE SERVICIO NRO:</p>
                    </th>
                </tr>
            </thead>
            <tbody>
                
            </tbody>
        </table>

        <div class="form-group">
            <div align='left' class="col-sm-12">
                <label>
                    <strong>OT Nro.: </strong> 
                    <?php echo "$ord_cod" ?>
                </label><br>
                <label>
                    <strong>Fecha: </strong> 
                    <?php echo $ord_fec?>
                </label><br>
                <label>
                    <strong>Sucursal: </strong>
                    <?php echo $suc_nom; echo " "; echo $suc_dir;?>
                </label><br>
                <label>
                    <strong>Cliente: </strong>
                    <?php echo $cli_nom_ape;?>
                </label><br>
         
                <label>
                    <strong>Vehiculo:</strong>
                    <?php echo $veh_chapa_marca?>
                </label><br>
            </div>
        </div>      
        
        <hr><!---------------------------------------------------------------------->
        <div>
            <label>
                <strong>Mecanicos</strong><br>
                ------------------------------------------------------
            </label>
            <br>
            <table>
                <!------------------------------------------->
                <thead>
                    <tr>
                        <th class="center">Cod</th>
                        <th class="center">Mecanicos asignados</th>
                    </tr>
                </thead>
                <!------------------------------------------->
                <tbody>
                    <?php
                        $query = mysqli_query($mysqli, "SELECT * FROM v_asignacion_personal WHERE ord_cod = $ord_cod")
                                        or die('Error: '.mysqli_error($mysqli));

                        while($data_asi = mysqli_fetch_assoc($query)){
                            $fun_cod_asi = $data_asi ['fun_cod'];
                            $fun_nom_ape_asi = $data_asi ['fun_nom_ape'];

                            echo "  <tr>
                                        <td class='center' width='40'>$fun_cod_asi</td>
                                        <td class='center'>$fun_nom_ape_asi</td>
                                    </tr>
                                                
                                            ";
                                                        
                        }                    
                    ?>
                </tbody>
            </table>
        </div>
        <hr><!---------------------------------------------------------------------->
        <div>
            <label>
                <strong>Descripción:</strong>
            </label>
            <br>
            <p><?php echo $ord_des?></p>
        </div>
        
        <hr>
        <div align="center">
            <label><strong>Impreso desde el Area Virtual del Taller</strong></label>
        </div>
    </body>
</html>