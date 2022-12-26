<section class="content-header">
    <ol class="breadcrumb">
        <li>
            <a href="?module=start">
                <i class="fa fa-home"></i>
                Inicio
            </a>
        </li>
        <li class="active">
            <a href="?module=empleados">
                Funcionarios
            </a>
        </li>
    </ol>
    <h1>
        <i class="fa fa-folder icon-title"></i>
        Datos de Funcionarios                      <!--de aqui pasa a form=add mediante $_GET a from.php como la accion-->
        <a class="btn btn-primary btn-social pull-rigth" href="?module=form_funcionarios&form=add" title="Agregar" data-toggle="tooltip">
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
                            El CI ya estan registrados.
                        </div>";
                }else if($_GET['alert']==6){
                    echo "<div class='alert alert-success alert-dismissable'>
                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                            <h4><i class='icon fa fa-check-circle'></i>Exitoso</h4>
                            Desbloqueado correctamente
                        </div>";
                }
            ?>
            <!------------------------------------------->
            <div class="box box-primary">
                <div class="box-body">
                    <section class="content-header">
                        <a class="btn btn-warning btn-social pull-right" href="modules/4_referenciales/1_funcionarios/print.php" target="_blank">
                            <i class="fa fa-print"></i>Imprimir reporte
                        </a>
                    </section>

                    <table id="dataTables1" class="table table-bordered table-striped table-hover">
                        <h2>Lista de Funcionarios</h2>
                        <!------------------------------------------->
                        <thead>
                            <tr>
                                <th class="center">Codigo</th>
                                <th class="center">C.I.</th>
                                <th class="center">Nombre y Apellido</th>                                  
                                <th class="center">Nivel de usuario</th>                                 
                                <th class="center">Estado</th>                              
                                <th class="center">Acciones</th>
                            </tr>
                        </thead>
                        <!------------------------------------------->
                        <tbody>
                            <?php 
                                $nro=1;
                                
                                $query = mysqli_query($mysqli, "SELECT * FROM funcionarios")
                                                                or die('Error: '.mysqli_error($mysqli));
                                
                                
                                while($data = mysqli_fetch_assoc($query)){
                                    $fun_cod = $data ['fun_cod'];
                                    $fun_ci = $data ['fun_ci'];
                                    $fun_nom_ape = $data ['fun_nom'];
                                    $fun_niv = $data ['fun_niv'];
                                    $fun_est = $data ['fun_est'];

                                    echo "<tr>
                                            <td class='center' width='80'>$fun_cod</td>
                                            <td class='center' width='80'>$fun_ci</td>
                                            <td class='center'>$fun_nom_ape</td>
                                            <td class='center'>$fun_niv</td>
                                            <td class='center'>$fun_est</td>
                                            <td class='center' width='110'>
                                            <div>
                                                <a data-toggle='tooltip' data-placement='top' title='Modificar' style='margin-rigth:5px' 
                                                    class='btn btn-primary btn-sm' href='?module=form_funcionarios&form=edit&id=$data[fun_cod]'>
                                                    <i class='glyphicon glyphicon-edit' style='color:#000'></i>
                                                </a>
                                            ";
                                ?>
                                <a data-toggle='tooltip' data-placement='top' title='Eliminar usuario' style='margin-rigth:5px' 
                                    class='btn btn-danger btn-sm' 
                                    href="modules/4_referenciales/1_funcionarios/proces.php?act=delete&fun_cod=<?php echo $data['fun_cod']; ?>"
                                    onclick="return confirm('Estas seguro/a de eliminar a: <?php echo $data['fun_nom']; ?>?')">
                                        <i class="glyphicon glyphicon-trash"></i>    
                                </a>
                                <a data-toggle='tooltip' data-placement='top' title='Desbloquear usuario' style='margin-rigth:5px' 
                                    class='btn btn-success btn-sm' 
                                    href="modules/4_referenciales/1_funcionarios/proces.php?act=desbloquear&fun_cod=<?php echo $data['fun_cod']; ?>"
                                    onclick="return confirm('Estas seguro/a de desbloquear a: <?php echo $data['fun_nom']; ?>?')">
                                        <i class="glyphicon glyphicon-ok"></i>    
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