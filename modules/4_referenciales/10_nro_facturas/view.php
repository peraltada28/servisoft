<section class="content-header">
    <ol class="breadcrumb">
        <li>
            <a href="?module=start">
                <i class="fa fa-home"></i>
                Inicio
            </a>
        </li>
        <li class="active">
            <a href="?module=tipo_items">
                Tipos de Items 
            </a>
        </li>
    </ol>
    <h1>
        <i class="fa fa-folder icon-title"></i>
        Datos de Tipos de Items                      <!--de aqui pasa a form=add mediante $_GET a from.php como la accion-->
        <a class="btn btn-primary btn-social pull-rigth" href="?module=form_tipo_items&form=add" title="Agregar" data-toggle="tooltip">
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
                            El tipo de item ya se encuentra realizado.
                        </div>";
                }
            ?>
            <!------------------------------------------->
            <div class="box box-primary">
                <div class="box-body">

                    <section class="content-header">
                        <a class="btn btn-warning btn-social pull-right" href="modules/6_tipo_items/print.php" target="_blank">
                            <i class="fa fa-print"></i>Imprimir
                        </a>
                    </section>

                    <table id="dataTables1" class="table table-bordered table-striped table-hover">
                        <h2>Lista de Tipos de Items </h2>
                        <!------------------------------------------->
                        <thead>
                            <tr>
                                <th class="center">Código</th>
                                <th class="center">Descripción</th>
                                <th class="center">Acciones</th>
                            </tr>
                        </thead>
                        <!------------------------------------------->
                        <tbody>
                            <?php 
                                $nro=1;
                                $query = mysqli_query($mysqli, "SELECT * FROM tipo_items")
                                                                or die('Error: '.mysqli_error($mysqli));
                                while($data = mysqli_fetch_assoc($query)){
                                    $tip_cod = $data ['tip_cod'];
                                    $tip_des = $data ['tip_des'];

                                    echo "<tr>
                                            <td class='center'>$tip_cod</td>
                                            <td class='center'>$tip_des</td>
                                            <td class='center' width='80'>
                                            <div>
                                                <a data-toggle='tooltip' data-placement='top' title='Modificar' style='margin-rigth:5px' 
                                                    class='btn btn-primary btn-sm' href='?module=form_tipo_items&form=edit&id=$data[tip_cod]'>
                                                    <i class='glyphicon glyphicon-edit' style='color:#000'></i>
                                                </a>
                                            ";
                                ?>
                                <a data-toggle='tooltip' data-placement='top' title='Eliminar datos' style='margin-rigth:5px' 
                                    class='btn btn-danger btn-sm' 
                                    href="modules/6_tipo_items/proces.php?act=delete&tip_cod=<?php echo $data['tip_cod'];?>"
                                    onclick="return confirm('Estas seguro/a de eliminar <?php echo $data['tip_des'];?>?')">
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