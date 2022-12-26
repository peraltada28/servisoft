<section class="content-header">
    <ol class="breadcrumb">
        <li>
            <a href="?module=start">
                <i class="fa fa-home"></i>
                Inicio
            </a>
        </li>
        <li class="active">
            <a href="?module=presupuestos">
                Presupuestos
            </a>
        </li>
    </ol>
    <h1>
        <i class="fa fa-folder icon-title"></i>
        Datos de Presupuestos                      <!--de aqui pasa a form=add mediante $_GET a from.php como la accion-->
        <a class="btn btn-primary btn-social pull-rigth" href="?module=form_presupuestos&form=add" title="Agregar" data-toggle="tooltip">
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
                            Presupuesto anulado correctamente
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
                        <h2>Presupuestos Realizados</h2>
                        <!------------------------------------------->
                        <thead>
                            <tr>
                                <th class="center">Codigo</th>
                                <th class="center">Fecha</th>
                                <th class="center">Empelado</th>
                                <th class="center">Cliente</th>                                
                                <th class="center">Vehiculo</th>
                                <th class="center">Estado</th>                                
                                <th class="center">Acciones</th>
                            </tr>
                        </thead>
                        <!------------------------------------------->
                        <tbody>
                            <?php 
                                $nro=1;
                                $ssuc = $_SESSION['suc_cod'];
                                if($ssuc == 1){
                                    $query = mysqli_query($mysqli, "SELECT * FROM v_presupuestos")
                                    or die('Error: '.mysqli_error($mysqli));
                                } else {
                                    $query = mysqli_query($mysqli, "SELECT * FROM v_presupuestos WHERE suc_cod = $ssuc")
                                                                or die('Error: '.mysqli_error($mysqli));
                                }
                                
                                while($data = mysqli_fetch_assoc($query)){
                                    $pre_cod = $data ['pre_cod'];
                                    $pre_fecha = $data ['pre_fecha'];
                                    $emp_nom_ape = $data ['emp_nom_ape'];
                                    $pre_estado = $data ['pre_estado'];
                                    $suc_descri_direc = $data ['suc_descri_direc'];
                                    $cli_nom_ape = $data ['cli_nom_ape'];
                                    $cli_ci = $data ['cli_ci'];
                                    $dia_cod = $data ['dia_cod'];
                                    $veh_chapa_marca = $data ['veh_chapa_marca'];


                                    echo "<tr>
                                            <td class='center'>$pre_cod</td>
                                            <td class='center'>$pre_fecha</td>
                                            <td class='center'>$emp_nom_ape</td>
                                            <td class='center'>$cli_nom_ape</td>
                                            <td class='center'>$veh_chapa_marca</td>
                                            <td class='center'>$pre_estado</td>
                                            <td class='center' width='80'>
                                            <div> ";
                                ?>
                                <a data-toggle="tooltip" data-placement="top" title="Anular presupuesto" class="btn btn-danger btn-sm"
                                href="modules/11_presupuestos/proces.php?act=anular&pre_cod=<?php echo $data['pre_cod']; ?>"
                                onclick = "return confirm('Estas seguro/a de anular el presupuesto para: <?php echo $data['cli_nom_ape']; ?>?');">
                                    <i style="color:#000" class="glyphicon glyphicon-trash"></i>

                                </a> 
                                <?php if($pre_estado != 'ANULADO'){
                                ?>
                                <a data-toggle="tooltip" data-placement="top" title="Imprimir presupuesto" class="btn btn-warning btn-sm"
                                href="modules/11_presupuestos/print.php?act=imprimir&pre_cod=<?php echo $data['pre_cod']; ?>" target="_blank">
                                    <i style="color:#000" class="fa fa-print"></i>
                                </a>
                                <?php 
                                }
                                ?>

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