<section class="content-header">
    <ol class="breadcrumb">
        <li>
            <a href="?module=start">
                <i class="fa fa-home"></i>
                Inicio
            </a>
        </li>
        <li class="active">
            <a href="?module=salida">
                Salida
            </a>
        </li>
    </ol>
    <h1>
        <i class="fa fa-folder icon-title"></i>
        Salida de Vehiculo                      <!--de aqui pasa a form=add mediante $_GET a from.php como la accion-->
        <a class="btn btn-primary btn-social pull-rigth" href="?module=form_salida&form=add" title="Agregar" data-toggle="tooltip">
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
                            Agregar_vehiculos, no encuentra el id[12]
                        </div>";
                }

            ?>
            <!------------------------------------------->
            <div class="box box-primary">
                <div class="box-body">
                    <section class="content-header">
                        
                    </section>

                    <table id="dataTables1" class="table table-bordered table-striped table-hover">
                        <h2>Lista de Salidas</h2>
                        <!------------------------------------------->
                        <thead>
                            <tr>
                                <th class="center">Cod</th>
                                <th class="center">Fecha</th>
                                <th class="center">Cliente</th>
                                <th class="center">Vehiculo</th>
                                <th class="center">Estado</th>
                                <?php 
                                if($_SESSION['usu_nivel']=='ADMINISTRADOR'){?>

                                    <th class="center">Sucursal</th>
                                
                                <?php
                                }
                                ?>
                                <th class="center">Accion</th>
                            </tr>
                        </thead>
                        <!------------------------------------------->
                        <tbody>
                            <?php 
                                $nro=1;
                                $query = mysqli_query($mysqli, "SELECT * FROM v_salidas")
                                                                or die('Error: '.mysqli_error($mysqli));
                                while($data = mysqli_fetch_assoc($query)){
                                    $sal_cod = $data ['sal_cod'];
                                    $sal_fecha = $data ['sal_fecha'];
                                    $sal_estado = $data ['sal_estado'];
                                    $cli_nom_ape = $data ['cli_nom_ape'];
                                    $veh_chapa_marca = $data ['veh_chapa_marca'];
                                    $emp_nom_ape = $data ['emp_nom_ape'];
                                    $suc_descri_direc = $data ['suc_descri_direc'];

                                    echo "<tr>
                                            <td class='center'>$sal_cod</td>
                                            <td class='center'>$sal_fecha</td>
                                            <td class='center'>$cli_nom_ape</td>
                                            <td class='center'>$veh_chapa_marca</td>";

                                            if($_SESSION['usu_nivel']=='ADMINISTRADOR'){
                                                echo "<td class='center'>$suc_descri_direc</td>";
                                            }

                                    echo "
                                            <td class='center'>$sal_estado</td>
                                            <td class='center' width='80'>
                                            <div>
                                                
                                            ";
                                    if($sal_estado !='ANULADO' and $sal_estado != 'RECLAMO'){
                                        ?>
                                        
                                        <a data-toggle="tooltip" data-placement="top" title="Anular salida" class="btn btn-danger btn-sm"
                                        href="modules/15_salida/proces.php?act=anular&sal_cod=<?php echo $data['sal_cod']; ?>"
                                        onclick = "return confirm('Estas seguro/a de anular la salida de: <?php echo $data['veh_chapa_marca']; ?>?');">
                                            <i style="color:#000" class="glyphicon glyphicon-trash"></i>

                                        </a> 
                                        <a data-toggle="tooltip" data-placement="top" title="Imprimir salida" class="btn btn-warning btn-sm"
                                        href="modules/15_salida/print.php?act=imprimir&sal_cod=<?php echo $data['sal_cod']; ?>" target="_blank">
                                            <i style="color:#000" class="fa fa-print"></i>
                                        </a>

                                        <?php
                                    }

                                    if($sal_estado == 'RECLAMO'){
                                        ?>
                                        
                                        <a data-toggle="tooltip" data-placement="top" title="Imprimir salida" class="btn btn-warning btn-sm"
                                        href="modules/15_salida/print.php?act=imprimir&sal_cod=<?php echo $data['sal_cod']; ?>" target="_blank">
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