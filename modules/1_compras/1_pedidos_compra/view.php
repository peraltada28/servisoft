<section class="content-header">
    <ol class="breadcrumb">
        <li>
            <a href="?module=start">
                <i class="fa fa-home"></i>
                Inicio
            </a>
        </li>
        <li class="active">
            <a href="?module=pedidos_compras">
                Pedidos de compras
            </a>
        </li>
    </ol>
    <h1>
        <i class="fa fa-folder icon-title"></i>
        Registros                      <!--de aqui pasa a form=add mediante $_GET a from.php como la accion-->
        <a class="btn btn-primary btn-social pull-rigth" href="?module=form_pedidos_compras&form=add" title="Agregar" data-toggle="tooltip">
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
                        <h2>Pedidos registrados</h2>
                        <!------------------------------------------->
                        <thead>
                            <tr>
                                <th class="center">Codigo</th>
                                <th class="center">Fecha</th>
                                <th class="center">Estado</th> 
                                <th class="center">Descripcion</th> 
                                <th class="center">Condicion</th>                                
                                <th class="center">Acciones</th>
                            </tr>
                        </thead>
                        <!------------------------------------------->
                        <tbody>
                            <?php 
                                $nro=1;
                                
                                $query = mysqli_query($mysqli, "SELECT * FROM pedidos_compra ORDER BY ped_cod DESC")
                                or die('Error: '.mysqli_error($mysqli));
                                
                                while($data = mysqli_fetch_assoc($query)){
                                    $ped_cod = $data ['ped_cod'];
                                    $ped_fec = $data ['ped_fec'];
                                    $ped_est = $data ['ped_est'];
                                    $ped_desc = $data ['ped_desc'];
                                    $ped_cond = $data ['ped_cond'];


                                    echo "<tr>
                                            <td class='center'>$ped_cod</td>
                                            <td class='center'>$ped_fec</td>
                                            <td class='center'>$ped_est</td>
                                            <td class='center'>$ped_desc</td>
                                            <td class='center'>$ped_cond</td>
                                            <td class='center' width='80'>
                                            <div> ";
                                ?>
                                <a data-toggle="tooltip" data-placement="top" title="Anular pedido de compra" class="btn btn-danger btn-sm"
                                href="modules/1_compras/1_pedidos_compra/proces.php?act=anular&ped_cod=<?php echo $data['ped_cod']; ?>"
                                onclick = "return confirm('Estas seguro/a de anular el pedido nro: <?php echo $data['ped_cod']; ?>?');">
                                    <i style="color:#000" class="glyphicon glyphicon-trash"></i>

                                </a> 
                                <?php if($ped_est != 'ANULADO'){
                                ?>
                                <a data-toggle="tooltip" data-placement="top" title="Imprimir presupuesto" class="btn btn-warning btn-sm"
                                href="modules/1_compras/1_pedidos_compra/print.php?act=imprimir&ped_cod=<?php echo $data['ped_cod']; ?>" target="_blank">
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