<?php 

    require_once "../../config/database.php";

    $query = mysqli_query($mysqli, "SELECT * FROM deposito") 
                            or die('Error:'.mysqli_error($mysqli));

    $count = mysqli_num_rows($query);

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Reporte de Departamentos</title>
        <link rel="stylesheet" type="text/css" href="../../assets/img/favicon.ico">
    </head>
    <body>
        
        <div align="center">
            <h3>DEPOSITOS</h3>
        </div>
        <div>
            Reporte de Depositos
        </div>
        <div align="center">
            Cantidad: <?php echo $count ?>
        </div>

        <hr><!-------------------------------->
        <div id="tabla">
            <table width="100%" border="0.3" cellpadding="0" cellspacing="0" align="center">
            
                <thead style="background:#e8ecee">
                    <tr class="table-title">
                        <th heigth="20" align="center" valign="middle"><small>Codigo</small></th>
                        <th heigth="30" align="center" valign="middle"><small>Descripcion</small></th>
                    </tr>
                </thead>
                <!-------------------------------->
                <tbody>
                    <?php 
                        while($data = mysqli_fetch_assoc($query)){
                            $id_deposito = $data ['cod_deposito'];
                            $dep_descripcion = $data ['dep_descrip'];

                        
                        
                        echo "  <tr>
                                    <td width='100' align='left'>$id_deposito</td>
                                    <td width='150' align='left'>$dep_descripcion</td>
                                </tr>
                             ";
                        }
                    ?>
                </tbody>
            
            </table>
        </div>


       
    </body>
</html>