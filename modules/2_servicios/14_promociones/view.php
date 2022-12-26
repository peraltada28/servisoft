

<section class="content-header">
    <ol class="breadcrumb">
        <li>
            <a href="?module=start">
                <i class="fa fa-home"></i>
                Inicio
            </a>
        </li>
        <li class="active">
            <a href="?module=promociones">
                Promociones 
            </a>
        </li>
    </ol>
    <h1>
        <i class="fa fa-folder icon-title"></i>
            Promociones                      <!--de aqui pasa a form=add mediante $_GET a from.php como la accion-->
        <a class="btn btn-primary btn-social pull-rigth" href="?module=form_promociones&form=add" title="Agregar" data-toggle="tooltip">
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
                }else if($_GET['alert']==4){
                    echo "<div class='alert alert-danger alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-check-circle'></i>Error</h4>
                            No se pudo realizar la accion. <br> El porcentaje es incorrecto.
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
                                <th class="center">Descripcion</th>
                                <th class="center">Fecha</th>
                                <th class="center">Empleado</th>
                                <th class="center">Fecha Inicio</th>
                                <th class="center">Fecha Fin</th>
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
                                    $query = mysqli_query($mysqli, "SELECT * FROM v_promociones")
                                                                or die('Error: '.mysqli_error($mysqli));
                                } else{
                                    $query = mysqli_query($mysqli, "SELECT * FROM v_promociones WHERE suc_cod = $_SESSION[suc_cod]")
                                                                or die('Error: '.mysqli_error($mysqli));
                                }
                                while($data = mysqli_fetch_assoc($query)){
                                    $pro_cod = $data ['pro_cod'];
                                    $pro_descri = $data ['pro_descri'];
                                    $pro_fecha = $data ['pro_fecha'];
                                    $emp_nom_ape = $data ['emp_nom_ape'];
                                    $pro_fecha_in = $data ['pro_fecha_in'];
                                    $pro_fecha_fin = $data ['pro_fecha_fin'];
                                    $pro_estado = $data ['pro_estado'];
                                    $suc_descri_direc = $data ['suc_descri_direc'];
                                    $pro_porcen = $data ['pro_porcen'];

                                    echo "<tr>
                                            <td class='center'>$pro_cod</td>
                                            <td class='center'>$pro_descri</td>
                                            <td class='center'>$pro_fecha</td>
                                            <td class='center'>$emp_nom_ape</td>
                                            <td class='center'>$pro_fecha_in</td>
                                            <td class='center'>$pro_fecha_fin</td>
                                            <td class='center'>$pro_estado</td>";
                                            
                                            if(($_SESSION['usu_nivel']=='ADMINISTRADOR')&&($_SESSION['suc_cod']==1)){
                                                echo "<td class='center'>$suc_descri_direc</td>";
                                                
                                            }
                                            

                                    echo "
                                            <td class='center' width='120'>
                                            <div>
                                                
                                            ";
        
                                    if($pro_estado == 'ACTIVO'){
                                        echo "
                                            <a data-toggle='tooltip' data-placement='top' title='Imprimir Promo' class='btn btn-warning btn-sm' 
                                                href='modules/14_promociones/print.php?act=imprimir&pro_cod=$pro_cod&pro_porcen=$pro_porcen' target='_blank'>
                                                <i class='fa fa-print' style='color:#000'></i>
                                            </a>
                                            ";?>

                                            <a data-toggle="tooltip" data-placement="top" title="Anular Promo" class="btn btn-danger btn-sm"
                                            href="modules/14_promociones/proces.php?act=anular&pro_cod=<?php echo $pro_cod; ?>"
                                            onclick = "return confirm('Estas seguro/a de anular la promocion: <?php echo $pro_descri; ?>?');">
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