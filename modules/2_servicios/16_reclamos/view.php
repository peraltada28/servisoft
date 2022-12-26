<section class="content-header">
    <ol class="breadcrumb">
        <li>
            <a href="?module=start">
                <i class="fa fa-home"></i>
                Inicio
            </a>
        </li>
        <li class="active">
            <a href="?module=reclamos">
                Reclamos
            </a>
        </li>
    </ol>
    <h1>
        <i class="fa fa-folder icon-title"></i>
        Datos de Reclamos                      <!--de aqui pasa a form=add mediante $_GET a from.php como la accion-->
        <a class="btn btn-primary btn-social pull-rigth" href="?module=form_reclamos&form=add" title="Agregar" data-toggle="tooltip">
            <i class="fa fa-plus"></i>
            Agregar 
        </a>
    </h1>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">

            <?php 
                if(empty($_GET['alert'])){
                    echo "";
                } 
                else if($_GET['alert']==1){
                    echo "<div class='alert alert-success alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-check-circle'></i>Exitoso</h4>
                            Datos registrados correctamente
                        </div>";
                } 
                else if($_GET['alert']==2){
                    echo "<div class='alert alert-success alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-check-circle'></i>Exitoso</h4>
                            Datos modificados correctamente
                        </div>";
                }
                else if($_GET['alert']==3){
                    echo "<div class='alert alert-danger alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-check-circle'></i>Anulado</h4>
                            Diagnostico anulado correctamente
                        </div>";
                }
                else if($_GET['alert']==4){
                    echo "<div class='alert alert-danger alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-check-circle'></i>Error</h4>
                            No se pudo realizar la acción.
                        </div>";
                }
            ?>
            <!------------------------------------------->
            <div class="box box-primary">
                <div class="box-body">

                    <table id="dataTables1" class="table table-bordered table-striped table-hover">
                        <h2>Reclamos Realizados</h2>
                        <!------------------------------------------->
                        <thead>
                            <tr>
                                <th class="center">Codigo</th>
                                <th class="center">Fecha</th>
                                <th class="center">Empelado</th>
                                <th class="center">Cliente</th>
                                <th class="center">Asunto</th>
                                <th class="center">Estado</th>
                                <?php 
                                if($_SESSION['usu_nivel']=='ADMINISTRADOR'){?>

                                    <th class="center">Sucursal</th>
                                
                                <?php
                                }
                                ?>                              
                                <th class="center">Acciones</th>
                            </tr>
                        </thead>
                        <!------------------------------------------->
                        <tbody>
                            <?php 
                                $nro=1;
                                $ssuc = $_SESSION['suc_cod'];
                                if($ssuc == 1){
                                    $query = mysqli_query($mysqli, "SELECT * FROM v_reclamos")
                                    or die('Error: '.mysqli_error($mysqli));
                                } else {
                                    $query = mysqli_query($mysqli, "SELECT * FROM v_reclamos WHERE suc_cod = $ssuc")
                                                                or die('Error: '.mysqli_error($mysqli));
                                }
                                
                                while($data = mysqli_fetch_assoc($query)){
                                    $rec_cod = $data ['rec_cod'];
                                    $rec_fecha = $data ['rec_fecha'];
                                    $emp_nom_ape = $data ['emp_nom_ape'];
                                    $cli_nom_ape = $data ['cli_nom_ape'];
                                    $rec_asunto = $data ['rec_asunto'];
                                    $rec_estado = $data ['rec_estado'];
                                    $suc_descri_direc = $data ['suc_descri_direc'];

                                    echo "<tr>
                                            <td class='center'>$rec_cod</td>
                                            <td class='center'>$rec_fecha</td>
                                            <td class='center'>$emp_nom_ape</td>
                                            <td class='center'>$cli_nom_ape</td>
                                            <td class='center'>$rec_asunto</td>
                                            <td class='center'>$rec_estado</td>";

                                            if($_SESSION['usu_nivel']=='ADMINISTRADOR'){

                                               echo  "<td>$suc_descri_direc</td>";
                                            
                                            
                                            }

                                    echo "  <td class='center' width='80'>
                                            <div> ";
                                                if($rec_estado =='ACTIVO'){
                                                    ?>
                                                    <a data-toggle="tooltip" data-placement="top" title="Anular reclamo" class="btn btn-danger btn-sm"
                                                    href="modules/16_reclamos/proces.php?act=anular&rec_cod=<?php echo $data['rec_cod']; ?>"
                                                    onclick = "return confirm('Estas seguro/a de anular el reclamo de: <?php echo $data['cli_nom_ape']; ?>?');">
                                                        <i style="color:#000" class="glyphicon glyphicon-trash"></i>

                                                    </a> 
                                                    <a data-toggle="tooltip" data-placement="top" title="Imprimir Reclamo" class="btn btn-warning btn-sm"
                                                    href="modules/16_reclamos/print.php?act=imprimir&rec_cod=<?php echo $data['rec_cod']; ?>" target="_blank">
                                                        <i style="color:#000" class="fa fa-print"></i>
                                                    </a>

                                                    <?php
                                                } 
                                    echo "  </div>
                                        </td>
                                    </tr>";
                                
                                }
                            ?>
                        </tbody>
                        <!------------------------------------------->
                    </table>
                </div>
            </div>

        </div>
    </div>
</section>