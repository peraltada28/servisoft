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
        Ordenes de Trabajo en proceso                      <!--de aqui pasa a form=add mediante $_GET a from.php como la accion-->
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
                    <section class="content-header">
                        
                    </section>

                    <table id="dataTables1" class="table table-bordered table-striped table-hover">
                        <h2>Lista de Ordenes de Trabajo</h2>
                        <!------------------------------------------->
                        <thead>
                            <tr>
                                <th class="center">Cod</th>
                                <th class="center">Funcionario</th>
                                <th class="center">Fecha y Hora</th>
                                <th class="center">Estado</th>
                                <th class="center">Accion</th>
                            </tr>
                        </thead>
                        <!------------------------------------------->
                        <tbody>
                            <?php 
                                $nro=1;
                                $query = mysqli_query($mysqli, "SELECT * FROM v_orden_trabajo where estado!='anulado'")
                                                                or die('Error: '.mysqli_error($mysqli));
                                while($data = mysqli_fetch_assoc($query)){
                                    $cod = $data ['cod_orden_trabajo'];
                                    $funcionario_ot = $data ['funcionario_ot'];
                                    $date_ot = $data ['date_ot'];
                                    $estado = $data ['estado'];

                                    echo "<tr>
                                            <td class='center'>$cod</td>
                                            <td class='center'>$funcionario_ot</td>
                                            <td class='center'>$date_ot</td>
                                            <td class='center'>$estado</td>
                                            <td class='center' width='80'>
                                            <div>
                                                
                                            ";
                                ?>
                                
                                <a data-toggle="tooltip" data-placement="top" title="Anular OT" class="btn btn-danger btn-sm"
                                href="modules/orden_trabajos/proces.php?act=anular&cod_orden_trabajo=<?php echo $data['cod_orden_trabajo']; ?>"
                                onclick = "return confirm('Estas seguro/a de anular el OT asignado a: <?php echo $data['funcionario_ot']; ?>?');">
                                    <i style="color:#000" class="glyphicon glyphicon-trash"></i>

                                </a> 
                                <a data-toggle="tooltip" data-placement="top" title="Imprimir OT" class="btn btn-warning btn-sm"
                                href="modules/orden_trabajos/print.php?act=imprimir&cod_orden_trabajo=<?php echo $data['cod_orden_trabajo']; ?>" target="_blank">
                                    <i style="color:#000" class="fa fa-print"></i>
                                </a>

                                <?php
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