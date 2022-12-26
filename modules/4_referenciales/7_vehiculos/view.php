<section class="content-header">
    <ol class="breadcrumb">
        <li>
            <a href="?module=start">
                <i class="fa fa-home"></i>
                Inicio
            </a>
        </li>
        <li class="active">
            <a href="?module=vehiculos">
                Vehículos
            </a>
        </li>
    </ol>
    <h1>
        <i class="fa fa-folder icon-title"></i>
        Datos de vehiculos                     <!--de aqui pasa a form=add mediante $_GET a from.php como la accion-->
        <a class="btn btn-primary btn-social pull-rigth" href="?module=form_vehiculos&form=add" title="Agregar" data-toggle="tooltip">
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
                    echo "<div class='alert alert-success alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-check-circle'></i>Exitoso</h4>
                            Datos eliminados correctamente
                        </div>";
                }
                else if($_GET['alert']==4){
                    echo "<div class='alert alert-danger alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-check-circle'></i>Error</h4>
                            No se pudo realizar la acción.
                        </div>";
                }
                else if($_GET['alert']==5){
                    echo "<div class='alert alert-danger alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-check-circle'></i>Error</h4>
                            La chapa ya se encuentra registrada.
                        </div>";
                }
                else if($_GET['alert']==6){
                    echo "<div class='alert alert-danger alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-check-circle'></i>Error</h4>
                            El vehiculo se encuentra en recepcion.
                        </div>";
                }
            ?>
            <!------------------------------------------->
            <div class="box box-primary">
                <div class="box-body">

                    <section class="content-header">
                        <a class="btn btn-warning btn-social pull-right" href="modules/2_vehiculos/print.php" target="_blank">
                            <i class="fa fa-print"></i>Imprimir
                        </a>
                    </section>

                    <table id="dataTables1" class="table table-bordered table-striped table-hover">
                        <h2>Lista de Vehiculos Registrados</h2>
                        <!------------------------------------------->
                        <thead>
                            <tr>
                                <th class="center">Código</th>
                                <th class="center">Marca</th>
                                <th class="center">Chapa Nro</th>
                                <th class="center">Acciones</th>
                            </tr>
                        </thead>
                        <!------------------------------------------->
                        <tbody>
                            <?php 
                                $nro=1;
                                $query = mysqli_query($mysqli, "SELECT * FROM v_vehiculos")
                                                                or die('Error: '.mysqli_error($mysqli));
                                while($data = mysqli_fetch_assoc($query)){
                                    $veh_cod = $data ['veh_cod'];
                                    $veh_marca = $data ['veh_marca'];
                                    $veh_chapa = $data ['veh_chapa'];

                                    echo "<tr>
                                            <td class='center'>$veh_cod</td>
                                            <td class='center'>$veh_marca</td>
                                            <td class='center'>$veh_chapa</td>
                                            <td class='center' width='80'>
                                            <div>
                                                <a data-toggle='tooltip' data-placement='top' title='Modificar' style='margin-rigth:5px' 
                                                    class='btn btn-primary btn-sm' href='?module=form_vehiculos&form=edit&id=$data[veh_cod]'>
                                                    <i class='glyphicon glyphicon-edit' style='color:#000'></i>
                                                </a>
                                            ";
                                ?>
                                <a data-toggle='tooltip' data-placement='top' title='Eliminar datos' style='margin-rigth:5px' 
                                    class='btn btn-danger btn-sm' 
                                    href="modules/2_vehiculos/proces.php?act=delete&veh_cod=<?php echo $data['veh_cod'];?>"
                                    onclick="return confirm('Estas seguro/a de eliminar: <?php echo $data['veh_chapa']; echo ' ';echo $data['veh_marca'];?>?')">
                                        <i class="glyphicon glyphicon-trash"></i>    
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