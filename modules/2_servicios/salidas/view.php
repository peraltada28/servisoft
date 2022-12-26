<section class="content-header">
    <ol class="breadcrumb">
        <li>
            <a href="?module=start">
                <i class="fa fa-home"></i>
                Inicio
            </a>
        </li>
        <li class="active">
            <a href="?module=salidas">
                Salidas
            </a>
        </li>
    </ol>
    <h1>
        <i class="fa fa-folder icon-title"></i>
        Datos de Salidas                      <!--de aqui pasa a form=add mediante $_GET a from.php como la accion-->
        <a class="btn btn-primary btn-social pull-rigth" href="?module=form_salidas&form=add" title="Agregar" data-toggle="tooltip">
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
                                <th class="center">Funcionario</th>
                                <th class="center">Vehiculo</th>
                                <th class="center">Chapa Nro</th>
                                <th class="center">Fecha</th>
                                <th class="center">Hora</th>
                                <th class="center">Motivo</th>
                                <th class="center">Accion</th>
                            </tr>
                        </thead>
                        <!------------------------------------------->
                        <tbody>
                            <?php 
                                $nro=1;
                                $query = mysqli_query($mysqli, "SELECT * FROM v_salida where estado!='anulado'")
                                                                or die('Error: '.mysqli_error($mysqli));
                                while($data = mysqli_fetch_assoc($query)){
                                    $cod = $data ['cod_salida'];
                                    $funcionario_salida = $data ['funcionario_salida'];
                                    $vehiculo = $data ['vehiculo'];
                                    $chapa_nro = $data ['chapa_nro'];
                                    $fecha = $data ['fecha'];
                                    $hora = $data ['hora'];
                                    $mot_descrip = $data ['mot_descrip'];

                                    echo "<tr>
                                            <td class='center'>$cod</td>
                                            <td class='center'>$funcionario_salida</td>
                                            <td class='center'>$vehiculo</td>
                                            <td class='center'>$chapa_nro</td>
                                            <td class='center'>$fecha</td>
                                            <td class='center'>$hora</td>
                                            <td class='center'>$mot_descrip</td>
                                            <td class='center' width='80'>
                                            <div>
                                                
                                            ";
                                ?>
                                
                                <a data-toggle="tooltip" data-placement="top" title="Anular salida" class="btn btn-danger btn-sm"
                                href="modules/salidas/proces.php?act=anular&cod_salida=<?php echo $data['cod_salida']; ?>"
                                onclick = "return confirm('Estas seguro/a de anular la entrada de: <?php echo $data['chapa_nro']; ?>?');">
                                    <i style="color:#000" class="glyphicon glyphicon-trash"></i>

                                </a> 
                                <a data-toggle="tooltip" data-placement="top" title="Imprimir Salida" class="btn btn-warning btn-sm"
                                href="modules/salidas/print.php?act=imprimir&cod_salida=<?php echo $data['cod_salida']; ?>" target="_blank">
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