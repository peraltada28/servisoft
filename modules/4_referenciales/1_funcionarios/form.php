<?php
    if($_GET['form']=='add'){ ?>

        <section class="content-header">
            <h1>
                <i class="fa fa-edit icon-title"></i>
                Agregar Funcionarios
            </h1>

            <ol class="breadcrumb">
                <!--------------------------------->
                <li>
                    <a href="?module=start">
                        <i class="fa fa-home"></i>
                        Inicio
                    </a>
                </li>
                <!--------------------------------->
                <li>
                    <a href="?module=funcionarios">
                    Funcionarios
                    </a>
                </li>
                <!--------------------------------->
                <li class="active">
                    Mas
                </li>
                <!--------------------------------->
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <form role="form" class="form-horizontal" action="modules/4_referenciales/1_funcionarios/proces.php?act=insert" method="POST">
                            <div class="box-body">
                                <?php //METODO PARA GENERAR CODIGO
                                    $query_id =mysqli_query($mysqli, "SELECT MAX(fun_cod) AS id FROM funcionarios")
                                                                    or die('Error '.mysqli_error($mysqli));
                                    
                                    $count = mysqli_num_rows($query_id);
                                    if($count<>0){
                                        $data_id = mysqli_fetch_assoc($query_id);
                                        $fun_cod = $data_id['id'] + 1;
                                    } else {
                                        $fun_cod = 1;
                                    }
                                ?>
                                <!---------------------------------------------------->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Codigo</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="fun_cod" value="<?php echo $fun_cod; ?>" readonly>
                                    </div>
                                </div>
                                <!---------------------------------------------------->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Nombres y apellidos</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="fun_nom" placeholder="Ingresa el/los nombres" 
                                        onkeyPress="return goodchars(event, 'q wertyuiopasdfghjklñzxcvbnm', this)" autocomplete="off" required>
                                    </div>
                                </div>
                                <!---------------------------------------------------->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">C.I.</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="fun_ci" placeholder="Ingresa un ruc o ci"
                                        autocomplete="off" onkeyPress="return goodchars(event, '0123456789', this)" required>
                                        <!--por js, onkeyPress, para solo ingresar nros-->
                                    </div>
                                </div>
                                <!---------------------------------------------------->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Direccion</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="fun_dir" placeholder="Ingresa la direccion" autocomplete="off" required>
                                    </div>
                                </div>
                                <!---------------------------------------------------->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Telefono</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="fun_tel" placeholder="Ingresa un telefono"
                                        autocomplete="off" onkeyPress="return goodchars(event, '0123456789', this)" required>
                                    </div>
                                </div>
                                <!---------------------------------------------------->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Usuario</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="fun_usu" placeholder="Ingresa el usuario" autocomplete="off" required>
                                    </div>
                                </div>
                                <!---------------------------------------------------->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Contraseña</label>
                                    <div class="col-sm-5">
                                    <input type="password" class="form-control" name="fun_pass" placeholder="Ingresa la contraseña" autocomplete="off" required>
                                    </div>
                                </div>
                                <!---------------------------------------------------->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Nivel de usuario</label>
                                    <div class="col-sm-5">
                                        
                                        <select class="chosen-select" name="fun_niv" data-placeholder="--Seleccionar nivel de usuario--" autocomplete="off" required>
                                            <option value=""></option>
                                            <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                                            <option value="MECANICO">MECANICO</option>
                                            <option value="RECEPCIONISTA">RECEPCIONISTA</option>
                                            <option value="CAJERO">CAJERO</option>
                                        </select> 
                                    </div>
                                </div>
                                <!---------------------------------------------------->
                                <div class="box-footer">
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                                            <a href="?module=funcionarios" class="btn btn-default btn-reset">Cancelar</a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

    <?php
    } else if($_GET['form']=='edit'){
        if(isset($_GET['id'])){
            $query = mysqli_query($mysqli, "SELECT * FROM funcionarios WHERE fun_cod = '$_GET[id]'")
                                            or die('Error '.mysqli_error($mysqli));
            
            $data = mysqli_fetch_assoc($query);

        } ?>

        <!----------------------MODIFICAR-------------------------->
        <section class="content-header">
            <h1>
                <i class="fa fa-edit icon-title"></i>
                Modificar Funcionarios
            </h1>

            <ol class="breadcrumb">
                <!--------------------------------->
                <li>
                    <a href="?module=start">
                        <i class="fa fa-home"></i>
                        Inicio
                    </a>
                </li>
                <!--------------------------------->
                <li>
                    <a href="?module=funcionarios">
                    Funcionarios
                    </a>
                </li>
                <!--------------------------------->
                <li class="active">
                    Modificar
                </li>
                <!--------------------------------->
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <form role="form" class="form-horizontal" action="modules/4_referenciales/1_funcionarios/proces.php?act=update" method="POST">
                            <div class="box-body">
                                <!---------------------------------------------------->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Codigo</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="fun_cod" 
                                            value="<?php echo $data['fun_cod']; ?>" readonly><!--Solo lectura-->
                                    </div>
                                </div>
                                <!---------------------------------------------------->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Nombres</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="fun_nom" value="<?php echo $data['fun_nom']; ?>" 
                                        onkeyPress="return goodchars(event, 'q wertyuiopasdfghjklñzxcvbnm', this)" autocomplete="off" required>
                                    </div>
                                </div>
                                <!---------------------------------------------------->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">C.I.</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="fun_ci" value="<?php echo $data['fun_ci']; ?>"
                                        autocomplete="off" onkeyPress="return goodchars(event, '0123456789', this)" readonly>
                                    </div>
                                </div>
                                <!---------------------------------------------------->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Telefono</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="fun_tel" value="<?php echo $data['fun_tel']; ?>"
                                        autocomplete="off" onkeyPress="return goodchars(event, '0123456789', this)" required>
                                    </div>
                                </div>
                                <!---------------------------------------------------->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Usuario</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="fun_usu" value="<?php echo $data['fun_usu']; ?>" 
                                        autocomplete="off" readonly>
                                    </div>
                                </div>
                                <!---------------------------------------------------->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Contraseña</label>
                                    <div class="col-sm-5">
                                    <input type="password" class="form-control" name="fun_pass" value="<?php echo $data['fun_pass']; ?>" 
                                    autocomplete="off" required>
                                    </div>
                                </div>
                                <!---------------------------------------------------->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Nivel de usuario</label>
                                    <div class="col-sm-5">
                                        
                                        <select class="chosen-select" name="fun_niv" data-placeholder="--Seleccionar nivel de usuario--" autocomplete="off" required>
                                            
                                            <?php   
                                                $query_niv = mysqli_query($mysqli, "SELECT * FROM funcionarios
                                                                                    WHERE fun_cod = $data[fun_cod];") 
                                                                                    or die('Error'.mysqli_error($mysqli)); 
                                                $data_niv = mysqli_fetch_assoc($query_niv);
                                            ?>

                                            <!--CARGAR LO SELECCIONADO Y VALIDAR SOLO MATRIZ PUEDA CARGAR A SUCURSALES-->
                                            <option value="<?php echo $data_niv['fun_niv']; ?>">
                                                <?php echo $data_niv['fun_niv'];?>
                                            </option>

                                            <option value="ADMINISTRADOR">ADMINISTRADOR</option>
                                            <option value="MECANICO">MECANICO</option>
                                            <option value="RECEPCIONISTA">RECEPCIONISTA</option>
                                            <option value="CAJERO">CAJERO</option>
                                        </select> 
                                    </div>
                                </div>
                                <!---------------------------------------------------->
                                <div class="box-footer">
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                                            <a href="?module=funcionarios" class="btn btn-default btn-reset">Cancelar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    <?php
    }

?>
