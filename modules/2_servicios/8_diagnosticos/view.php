<section class="content-header">
    <ol class="breadcrumb">
        <li>
            <a href="?module=start">
                <i class="fa fa-home"></i>
                Inicio
            </a>
        </li>
        <li class="active">
            <a href="?module=diagnosticos">
                Diagnosticos
            </a>
        </li>
    </ol>
    <h1>
        <i class="fa fa-folder icon-title"></i>
        Datos de Diagnosticos                      <!--de aqui pasa a form=add mediante $_GET a from.php como la accion-->
        <a class="btn btn-primary btn-social pull-rigth" href="?module=form_diagnosticos&form=add" title="Agregar" data-toggle="tooltip">
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
                        <h2>Ordenes de Trabajo</h2>
                        <!------------------------------------------->
                        <thead>
                            <tr>
                                <th class="center">Codigo</th>
                                <th class="center">Fecha</th>
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
                                    $query = mysqli_query($mysqli, "SELECT * FROM v_orden_trabajos ORDER BY ord_cod DESC")
                                    or die('Error: '.mysqli_error($mysqli));
                                } else {
                                    $query = mysqli_query($mysqli, "SELECT * FROM v_orden_trabajos WHERE suc_cod = $ssuc ORDER BY ord_cod DESC")
                                                                or die('Error: '.mysqli_error($mysqli));
                                }
                                
                                while($data = mysqli_fetch_assoc($query)){
                                    $ord_cod = $data ['ord_cod'];
                                    $ord_fec = $data ['ord_fec'];
                                    $cli_nom_ape = $data ['cli_nom_ape'];
                                    $veh_chapa_marca = $data ['veh_chapa_marca'];
                                    $ord_est = $data ['ord_est'];

                                    echo "<tr>
                                            <td class='center'>$ord_cod</td>
                                            <td class='center'>$ord_fec</td>
                                            <td class='center'>$cli_nom_ape</td>
                                            <td class='center'>$veh_chapa_marca</td>
                                            <td class='center'>$ord_est</td>
                                            <td class='center' width='80'>
                                            <div> ";
                                                if($ord_est =='RECEPCION'){
                                                    ?> 
                                                    <a data-toggle='tooltip' data-placement='top' title='Realizar diagnostico' style='margin-rigth:5px' 
                                                        class='btn btn-primary btn-sm' href='main.php?module=form_diagnosticos&form=add&ord_cod=<?php echo $data['ord_cod']; ?>'>
                                                        <i class='glyphicon glyphicon-edit' style='color:#000'></i>
                                                    </a>

                                                    <?php 
                                                } else {
                                                    ?>

                                                    <a data-toggle="tooltip" data-placement="top" title="Anular diagnostico" class="btn btn-danger btn-sm"
                                                    href="modules/10_diagnosticos/proces.php?act=anular&dia_cod=<?php echo $data['dia_cod']; ?>"
                                                    onclick = "return confirm('Estas seguro/a de anular el diagnostico de: <?php echo $data['veh_chapa_marca']; ?>?');">
                                                        <i style="color:#000" class="glyphicon glyphicon-trash"></i>

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