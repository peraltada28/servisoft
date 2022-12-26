<?php 

    require_once "../../../config/database.php";

    $query = mysqli_query($mysqli, "SELECT * FROM funcionarios ORDER BY fun_cod")
                                    or die('Error: '.mysqli_error($mysqli));

    $count = mysqli_num_rows($query);

?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>Reporte de Funcionarios</title>
        <link rel="stylesheet" type="text/css" href="../../../assets/img/favicon.ico">
    </head>
    <body>
        
        <div align="center">
            <h3>Funcionarios</h3>
        </div>
        <div align="center">
            Cantidad: <?php echo $count ?>
        </div>

        <hr><!-------------------------------->
        <div id="tabla">
            <table width="100%" border="0.3" cellpadding="0" cellspacing="0" align="center">
            
                <thead style="background:#e8ecee">
                    <tr class="table-title" style="background:#A5A3A2">
                        <th heigth="30" align="center"><small>Cod</small></th>
                        <th heigth="30" align="center"><small>CI</small></th>
                        <th heigth="30" align="center"><small>Nombre y Apellido</small></th>
                        <th heigth="20" align="center"><small>Usuario</small></th>
                        <th heigth="20" align="center"><small>Nivel</small></th>
                    </tr>
                </thead>
                <!-------------------------------->
                <tbody>
                    <?php 
                        while($data = mysqli_fetch_assoc($query)){
                            $fun_cod = $data ['fun_cod'];
                            $fun_ci = $data ['fun_ci'];
                            $fun_nom_ape = $data ['fun_nom'];
                            $fun_usu = $data ['fun_usu'];
                            $fun_niv = $data ['fun_niv'];
                        
                        echo "  <tr>
                                    <td width='40' align='center'>$fun_cod</td>
                                    <td width='80' align='center'>$fun_ci</td>
                                    <td width='250' align='center'>$fun_nom_ape</td>
                                    <td width='120' align='center'>$fun_usu</td>
                                    <td width='120' align='center'>$fun_niv</td>
                                </tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <hr>
        <p>Impreso desde el Area Virtual del taller</p>
    </body>
</html>