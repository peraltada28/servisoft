

<section class="content-header">
    <ol class="breadcrumb">
        <li>
            <a href="?module=start">
                <i class="fa fa-home"></i>
                Inicio
            </a>
        </li>
        <li class="active">
            <a href="?module=solicitud_recepcion">
                Solicitud de Servicios 
            </a>
        </li>
    </ol>
    <h1>
        <i class="fa fa-folder icon-title"></i>
            Solicitud de Servicios                      <!--de aqui pasa a form=add mediante $_GET a from.php como la accion-->
        <a class="btn btn-primary btn-social pull-rigth" href="?module=form_solicitud_recepcion&form=add" title="Agregar" data-toggle="tooltip">
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
                    echo "<div class='alert alert-success alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-check-circle'></i>Exitoso</h4>
                            Datos modificados correctamente
                        </div>";
                }else if($_GET['alert']==2){
                    echo "<div class='alert alert-danger alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-check-circle'></i>Exitoso</h4>
                            No se pudo realizar la accion.
                        </div>";
                }

            ?>
            <!------------------------------------------->
            <div class="box box-primary">
                <div class="box-body">
                    <section class="content-header">
                        
                    </section>

                    <table id="dataTables1" class="table table-bordered table-striped table-hover">
                       
                        <!------------------------------------------->
                        <thead>
                            <tr>
                                <th class="center">Cod</th>
                                <th class="center">Fecha</th>
                                <th class="center">Empleado</th>
                                <th class="center">Cliente</th>
                                <th class="center">Vehiculo</th>
                                <th class="center">Estado</th>
                                <?php 
                                if(($_SESSION['usu_nivel']=='ADMINISTRADOR')&&($_SESSION['suc_cod']==1)){?>

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
                                if( $_SESSION['suc_cod'] == 1){
                                    $query = mysqli_query($mysqli, "SELECT * FROM v_solicitud_servicio")
                                                                or die('Error: '.mysqli_error($mysqli));
                                } else{
                                    $query = mysqli_query($mysqli, "SELECT * FROM v_solicitud_servicio WHERE suc_cod = $_SESSION[suc_cod]")
                                                                or die('Error: '.mysqli_error($mysqli));
                                }
                                while($data = mysqli_fetch_assoc($query)){
                                    $sse_cod = $data ['sse_cod'];
                                    $sse_fecha = $data ['sse_fecha'];
                                    $emp_nom_ape = $data ['emp_nom_ape'];
                                    $cli_nom_ape_ci = $data ['cli_nom_ape_ci'];
                                    $sse_estado = $data ['sse_estado'];
                                    $veh_chapa_marca = $data ['veh_chapa_marca'];
                                    $suc_descri_direc = $data ['suc_descri_direc'];

                                    echo "<tr>
                                            <td class='center'>$sse_cod</td>
                                            <td class='center'>$sse_fecha</td>
                                            <td class='center'>$emp_nom_ape</td>
                                            <td class='center'>$cli_nom_ape_ci</td>
                                            <td class='center'>$veh_chapa_marca</td>
                                            <td class='center'>$sse_estado</td>";
                                            
                                            if(($_SESSION['usu_nivel']=='ADMINISTRADOR')&&($_SESSION['suc_cod']==1)){
                                                echo "<td class='center'>$suc_descri_direc</td>";
                                                
                                            }
                                            

                                    echo "
                                            <td class='center' width='120'>
                                            <div>
                                                
                                            ";
                                ?>
                
                                <a data-toggle="tooltip" data-placement="top" title="Imprimir Solicitud" class="btn btn-warning btn-sm"
                                    href="modules/8_solicitud_recepcion/print.php?act=imprimir&sse_cod=<?php echo $data['sse_cod']; ?>" target="_blank">
                                    <i style="color:#000" class="fa fa-print"></i>
                                </a>

                                <?php
                                if($sse_estado == 'ACTIVO'){
                                    echo "
                                        <a data-toggle='tooltip' data-placement='top' title='Modificar' style='margin-rigth:5px' 
                                            class='btn btn-primary btn-sm' href='?module=form_solicitud_recepcion&form=edit&sse_cod=$data[sse_cod]'>
                                            <i class='glyphicon glyphicon-edit' style='color:#000'></i>
                                        </a>
                                        
                                        <a data-toggle='tooltip' data-placement='top' title='Anular Solicitud' class='btn btn-danger btn-sm'
                                            href='modules/8_solicitud_recepcion/proces.php?act=anular&sse_cod=$data[sse_cod];'
                                            onclick = 'return confirm('Estas seguro/a de anular la solicitud de: $data[cli_nom_ape_ci];');'>
                                            <i style='color:#000' class='glyphicon glyphicon-trash'></i>
                                        </a> 
                                        ";
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