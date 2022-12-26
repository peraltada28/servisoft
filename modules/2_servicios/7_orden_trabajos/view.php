<section class="content-header">
    <ol class="breadcrumb">
        <li>
            <a href="?module=start">
                <i class="fa fa-home"></i>
                Inicio
            </a>
        </li>
        <li class="active">
            <a href="?module=orden_trabajos">
                Orden de Trabajo
            </a>
        </li>
    </ol>
    <h1>
        <i class="fa fa-folder icon-title"></i>
        Ordenes de Trabajo                      <!--de aqui pasa a form=add mediante $_GET a from.php como la accion-->
        <a class="btn btn-primary btn-social pull-rigth" href="?module=form_orden_trabajos&form=add" title="Agregar" data-toggle="tooltip">
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
                    echo "<div class='alert alert-danger alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-check-circle'></i>Exitoso</h4>
                            Datos anulados correctamente
                        </div>";
                }

                else if($_GET['alert']==3){
                    echo "<div class='alert alert-danger alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-check-circle'></i>Error</h4>
                            La cantidad solicitada es mayor a la existente en stock
                        </div>";
                }

                else if($_GET['alert']==4){
                    echo "<div class='alert alert-danger alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-check-circle'></i>Error</h4>
                            No existe el id de item
                        </div>";
                }

                else if($_GET['alert']==5){
                    echo "<div class='alert alert-danger alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-check-circle'></i>Error</h4>
                            No existe la cantidad de item.php
                        </div>";
                }
            ?>
            <!------------------------------------------->
            <div class="box box-primary">
                <div class="box-body">
                    <table id="dataTables1" class="table table-bordered table-striped table-hover">
                        <!------------------------------------------->
                        <thead>
                            <tr>
                                <th class="center">Cod</th>
                                <th class="center">Fecha</th>
                                <th class="center">Cliente</th>
                                <th class="center">C.I.</th>
                                <th class="center">Vehiculo</th>
                                <th class="center">Estado</th>
                                <th class="center">Accion</th>
                            </tr>
                        </thead>
                        <!------------------------------------------->
                        <tbody>
                            <?php 
                                $nro=1;
                                $ses = $_SESSION['suc_cod'];
                                if($ses == 1){
                                    $query = mysqli_query($mysqli, "SELECT * FROM v_orden_trabajos")
                                                   or die('Error: '.mysqli_error($mysqli));
                                } else {
                                    $query = mysqli_query($mysqli, "SELECT * FROM v_orden_trabajos WHERE suc_cod = $ses")
                                                   or die('Error: '.mysqli_error($mysqli));
                                }

                                
                                while($data = mysqli_fetch_assoc($query)){
                                    $ord_cod = $data ['ord_cod'];
                                    $ord_fecha = $data ['ord_fec'];
                                    $otr_estado = $data ['ord_est'];
                                    $cli_nom_ape = $data ['cli_nom_ape'];
                                    $cli_ci = $data ['cli_ci'];
                                    $veh_chapa_marca = $data ['veh_chapa_marca'];

                                    echo "<tr>
                                            <td class='center' width='40'>$ord_cod</td>
                                            <td class='center'>$ord_fecha</td>
                                            <td class='center'>$cli_nom_ape</td>
                                            <td class='center'>$cli_ci</td>
                                            <td class='center'>$veh_chapa_marca</td>
                                            <td class='center'>$otr_estado</td>
                                            <td class='center' width='80'>
                                            <div>
                                                
                                            ";
                                    if($otr_estado == 'RECEPCION'){
                                        ?>
                                        
                                        <a data-toggle="tooltip" data-placement="top" title="Anular OT" class="btn btn-danger btn-sm"
                                        href="modules/7_orden_trabajos/proces.php?act=anular&ord_cod=<?php echo $ord_cod; ?>"
                                        onclick = "return confirm('Estas seguro/a de anular el OT del cliente: <?php echo $data['cli_nom_ape']; ?>?');">
                                            <i style="color:#000" class="glyphicon glyphicon-trash"></i>

                                        </a>                                         
                                        <a data-toggle='tooltip' data-placement='top' title='Modificar' style='margin-rigth:5px' 
                                            class='btn btn-primary btn-sm' href='main.php?module=form_orden_trabajos&form=edit&ord_cod=<?php echo $data['ord_cod']; ?>'>
                                            <i class='glyphicon glyphicon-edit' style='color:#000'></i>
                                        </a>
                                        <?php
                                        } elseif($otr_estado == 'EJECUTADO'){
                                            ?>
                                            <a data-toggle="tooltip" data-placement="top" title="Imprimir OT" class="btn btn-warning btn-sm"
                                            href="modules/7_orden_trabajos/print.php?act=imprimir&ord_cod=<?php echo $data['ord_cod']; ?>" target="_blank">
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