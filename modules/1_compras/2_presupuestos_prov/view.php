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
                Presupuestos de Proveedores
            </a>
        </li>
    </ol>
    <h1>
        <i class="fa fa-folder icon-title"></i>
        Datos de Presupuestos                      <!--de aqui pasa a form=add mediante $_GET a from.php como la accion-->
        <a class="btn btn-primary btn-social pull-rigth" href="?module=form_pres_proveedor&form=add" title="Agregar" data-toggle="tooltip">
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
                        <h2>Presupuestos Registrados</h2>
                        <!------------------------------------------->
                        <thead>
                            <tr>
                                <th class="center">Codigo</th>
                                <th class="center">Fecha</th>
                                <th class="center">Proveedor</th>                              
                                <th class="center">Pedido Nro</th>
                                <th class="center">Estado</th>                                
                                <th class="center">Acciones</th>
                            </tr>
                        </thead>
                        <!------------------------------------------->
                        <tbody>
                            <?php 
                                
                                $query = mysqli_query($mysqli, "SELECT * FROM v_presupuestos_compra")
                                or die('Error: '.mysqli_error($mysqli));
                                
                                
                                while($data = mysqli_fetch_assoc($query)){
                                    $prc_cod = $data ['prc_cod'];
                                    $prc_fec = $data ['prc_fec'];
                                    $prv_raz_soc = $data ['prv_raz_soc'];
                                    $prc_est = $data ['prc_est'];
                                    $ped_cod = $data ['ped_cod'];


                                    echo "<tr>
                                            <td class='center'>$prc_cod</td>
                                            <td class='center'>$prc_fec</td>
                                            <td class='center'>$prv_raz_soc</td>
                                            <td class='center'>$ped_cod</td>
                                            <td class='center'>$prc_est</td>
                                            <td class='center' width='80'>
                                            <div> ";
                                ?>
                                <a data-toggle="tooltip" data-placement="top" title="Anular presupuesto" class="btn btn-danger btn-sm"
                                href="modules/1_compras/2_presupuestos_prov/proces.php?act=anular&prc_cod=<?php echo $data['prc_cod']; ?>"
                                onclick = "return confirm('Estas seguro/a de anular el presupuesto de: <?php echo $data['prv_raz_soc']; ?>?');">
                                    <i style="color:#000" class="glyphicon glyphicon-trash"></i>

                                </a> 
                                <?php if($prc_est != 'ANULADO'){
                                ?>
                                <a data-toggle="tooltip" data-placement="top" tit2_presupuestos_provle="Imprimir presupuesto" class="btn btn-warning btn-sm"
                                href="modules/1_compras/2_presupuestos_prov/print.php?act=imprimir&prc_cod=<?php echo $data['prc_cod']; ?>" target="_blank">
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