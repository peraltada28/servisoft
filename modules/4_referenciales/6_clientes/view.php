<section class="content-header">
    <ol class="breadcrumb">
        <li>
            <a href="?module=start">
                <i class="fa fa-home"></i>
                Inicio
            </a>
        </li>
        <li class="active">
            <a href="?module=clientes">
                Clientes
            </a>
        </li>
    </ol>
    <h1>
        <i class="fa fa-folder icon-title"></i>
        Datos de Clientes                     <!--de aqui pasa a form=add mediante $_GET a from.php como la accion-->
        <a class="btn btn-primary btn-social pull-rigth" href="?module=form_clientes&form=add" title="Agregar" data-toggle="tooltip">
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
            elseif($_GET['alert']==4){
                echo "<div class='alert alert=danger alert-dismissable'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden= 'true'>&times;</button>
                <h4><i class='icon fa fa-check-circle'></i>Error!!</h4>
                No se pudo realizar la operación
                </div>";
            }
            elseif($_GET['alert']==5){
                echo "<div class='alert alert-danger' role='alert'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden= 'true'>&times;</button>
                <h4><i class='icon fa fa-check-circle'></i>Error!!</h4>
                No se puede repetir el numero de C.I
                </div>";
            }

            ?>
            <div class="box box-primary">
                <div class="box-body">
                    <section class="content-header">
                        <a class="btn btn-warning btn-social pull-right" href="modules/1_clientes/print.php" target="_blank">
                            <i class="fa fa-print"></i>Imprimir
                        </a>
                    </section>
                    <table id="dataTables1" class="table table-bordered table-striped table-hover">
                        <h2>Lista de Cliente</h2>
                        <thead>
                            <tr>
                                <th class="center">Cod</th>
                                <th class="center">C.I</th>
                                <th class="center">Nombre y Apellido</th>
                                <th class="center">Teléfono</th>
                                <th class="center">Direccion</th>
                                <th class="center">Acción</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $nro=1;
                                $query = mysqli_query($mysqli, "SELECT * FROM v_clientes")
                                                                or die('error'.mysqli_error($mysqli));

                                while($data = mysqli_fetch_assoc($query)){
                                    $cli_cod = $data['cli_cod'];
                                    $cli_nom_ape = $data['cli_nom_ape'];
                                    $cli_ci = $data['cli_ci'];
                                    $cli_tel = $data['cli_tel'];
                                    $cli_dir = $data['cli_dir'];


                                    echo "<tr>
                                    <td class='center' width='50'>$cli_cod</td>
                                    <td class='center' width='90'>$cli_ci</td>
                                    <td class='center' width='320'>$cli_nom_ape</td>
                                    <td class='center' width='90'>$cli_tel</td>
                                    <td class='center'>$cli_dir</td>
                                    <td class='center' width='80'>
                                    <div>
                                        <a data-toggle='tooltip' data-placement='top' title='Modificar datos Cliente' style='margin-right:5px' 
                                        class='btn btn-primary btn-sm' href='?module=form_clientes&form=edit&id=$data[cli_cod]'>
                                            <i class='glyphicon glyphicon-edit' style='color:#fff'></i>
                                        </a>";
                                
                            ?>
                                <a data-toggle="tooltip" data-placement="top" title="Eliminar datos" class="btn btn-danger btn-sm"
                                href="modules/1_clientes/proces.php?act=delete&cli_cod=<?php echo $data['cli_cod']; ?>"
                                onclick="return confirm('¿Estas seguro/a de eliminar <?php echo $data['cli_nom_ape']; ?>?')">
                                <i class="glyphicon glyphicon-trash"></i>
                             </a>
                             <?php 
                                echo "</div>
                                    </td>
                                 </tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>