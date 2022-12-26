<section class="content-header">
    <ol class="breadcrumb">
        <li>
            <a href="?module=start">
                <i class="fa fa-home"></i>
                Inicio
            </a>
        </li>
        <li class="active">
            <a href="?module=entradas">
                Entradas
            </a>
        </li>
    </ol>
    <h1>
        <i class="fa fa-folder icon-title"></i>
        Datos de Entradas                      <!--de aqui pasa a form=add mediante $_GET a from.php como la accion-->
        <a class="btn btn-primary btn-social pull-rigth" href="?module=form_entradas&form=add" title="Agregar" data-toggle="tooltip">
            <i class="fa fa-plus"></i>
            Agregar 
        </a>
        <a class="btn btn-primary btn-social pull-rigth" href="?module=form_entradas_ac&form=add" title="Agregar" data-toggle="tooltip">
            <i class="fa fa-plus"></i>
            Lubricantes y Combustibles
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
            ?>
            <!------------------------------------------->
            <div class="box box-primary">
                <div class="box-body">
                    <section class="content-header">
                        
                    </section>

                    <table id="dataTables1" class="table table-bordered table-striped table-hover">
                        <h2>Lista de Entradas</h2>
                        <!------------------------------------------->
                        <thead>
                            <tr>
                                <th class="center">Cod</th>
                                <th class="center">Funcionario</th>
                                <th class="center">Fecha</th>
                                <th class="center">Hora</th>
                                <th class="center">Motivo</th>
                                <th class="center">Estado</th>
                                <th class="center">Accion</th>
                            </tr>
                        </thead>
                        <!------------------------------------------->
                        <tbody>
                            <?php 
                                $nro=1;
                                $query = mysqli_query($mysqli, "SELECT * FROM v_entrada")
                                                                or die('Error: '.mysqli_error($mysqli));
                                while($data = mysqli_fetch_assoc($query)){
                                    $cod = $data ['cod_entrada'];
                                    $funcionario_entrada = $data ['funcionario_entrada'];
                                    $fecha = $data ['fecha'];
                                    $hora = $data ['hora'];
                                    $mot_descrip = $data ['mot_descrip'];
                                    $estado = $data ['estado'];

                                    echo "<tr>
                                            <td class='center'>$cod</td>
                                            <td class='center'>$funcionario_entrada</td>
                                            <td class='center'>$fecha</td>
                                            <td class='center'>$hora</td>
                                            <td class='center'>$mot_descrip</td>
                                            <td class='center'>$estado</td>
                                            <td class='center' width='80'>
                                            <div>
                                                
                                            ";
                                ?>
                                
                                <a data-toggle="tooltip" data-placement="top" title="Anular entrada" class="btn btn-danger btn-sm"
                                href="modules/entradas/proces.php?act=anular&cod_entrada=<?php echo $data['cod_entrada']; ?>"
                                onclick = "return confirm('Estas seguro/a de anular la entrada de: <?php echo $data['funcionario_entrada']; ?>?');">
                                    <i style="color:#000" class="glyphicon glyphicon-trash"></i>

                                </a> 
                                <a data-toggle="tooltip" data-placement="top" title="Imprimir entrada" class="btn btn-warning btn-sm"
                                href="modules/entradas/print.php?act=imprimir&cod_entrada=<?php echo $data['cod_entrada']; ?>" target="_blank">
                                    <i style="color:#000" class="fa fa-print"></i>
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