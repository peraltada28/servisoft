<?php 
    if($_GET['form']=='add'){ ?>
    <section class="content-header">
        <h1>
            <i class="fa fa-edit icon-title">Agregar Salida de Vehiculo</i>
        </h1>
        <!------------------------------>
        <ol class="breadcrumb">
            <li>
                <a href="?module=start">
                    <i class="fa fa-home"></i>
                    Inicio
                </a>
            </li>
            <!------------------------------>
            <li>
                <a href="?module=salida">
                    Salida de Vehiculo
                </a>
            </li>
            <!------------------------------>
            <li class="active">
                Agregar
            </li>
        </ol>
    </section>      

    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <form role="form" class="form-horizontal" action="modules/15_salida/proces.php?act=insert" method="POST">
                        <div class="box-body">
                            <?php
                            //Método para generar código
                                $query_id = mysqli_query($mysqli, "SELECT MAX(sal_cod) as id FROM salida")
                                                        or die('Error'.mysqli_error($mysqli));

                                $count = mysqli_num_rows($query_id);  
                                if($count <> 0){
                                    $data_id = mysqli_fetch_assoc($query_id);
                                    $codigo = $data_id['id']+1;
                                } else{
                                    $codigo=1;
                                }                      
                            ?>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Código</label>
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="sal_cod" value="<?php echo $codigo; ?>" readonly>
                                </div>

                                <label class="col-sm-2 control-label">Fecha</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="sal_fecha" autocomplete="of" 
                                    value="<?php echo date("y-m-d"); ?>" readonly>
                                </div>
                            </div>

                            <!---------------->
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Empleado</label>
                                <div class="col-sm-9">
                                    <input type="hidden" class="form-control" name="emp_cod" value="<?php echo $_SESSION['emp_cod']; ?>" readonly>
                                    <input type="text" class="form-control" name="emp_nom_ape" value="<?php echo $_SESSION['emp_nom_ape']; ?>" readonly>
                                </div>

                            </div>
                            <!---------------------------------------------->                            
                            <hr>               
                        
                            <!---------------------------------------------->  
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Vehículo</label>
                                <div class="col-sm-9">
                                    <select class="chosen-select" name="veh_cod" data-placeholder="-- Seleccionar un vehículo--" >
                                        <option value=""></option>
                                        <?php
                                            $query_u = mysqli_query($mysqli, "SELECT * FROM v_vehiculos WHERE veh_estado = 'SERVICIO RELIZADO'") 
                                                                    or die ('Error'.mysqli_error($mysqli));
                                            while ($data_dep = mysqli_fetch_assoc($query_u)){
                                                echo "<option value=\"$data_dep[veh_cod]\">C.I: $data_dep[cli_ci]  $data_dep[veh_chapa] - $data_dep[veh_marca]</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <!---------------------------------------------->
                            <div class="box-footer">
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                                        <a href="?module=salida" class="btn btn-default btn-reset">Cancelar</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
      
    </section>  

    <?php } ?>
