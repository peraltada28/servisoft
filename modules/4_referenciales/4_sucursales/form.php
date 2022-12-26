<?php
    if($_GET['form']=='add'){ ?>

        <section class="content-header">
            <h1>
                <i class="fa fa-edit icon-title"></i>
                Agregar Sucursal
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
                    <a href="?module=sucursales">
                        Sucursal
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
                        <form role="form" class="form-horizontal" action="modules/4_sucursales/proces.php?act=insert" method="POST">
                            <div class="box-body">
                                <?php //METODO PARA GENERAR CODIGO
                                    $query_id =mysqli_query($mysqli, "SELECT MAX(suc_cod) AS id FROM sucursales")
                                                                    or die('Error '.mysqli_error($mysqli));
                                    
                                    $count = mysqli_num_rows($query_id);
                                    if($count<>0){
                                        $data_id = mysqli_fetch_assoc($query_id);
                                        $codigo = $data_id['id'] + 1;
                                    } else {
                                        $codigo = 1;
                                    }
                                ?>
                                <!---------------------------------------------------->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Codigo</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="suc_cod" value="<?php echo $codigo; ?>" readonly>
                                    </div>
                                </div>
                                <!---------------------------------------------------->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Descripción</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="suc_nom" placeholder="Ingresa una nueva sucursal" required>
                                    </div>
                                </div>
                                <!---------------------------------------------------->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Dirección</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="suc_dir" placeholder="Ingresa su direccion" required>
                                    </div>
                                </div>
                                <!---------------------------------------------------->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Factura</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="suc_fac" placeholder="Ingresa su direccion" required>
                                    </div>
                                </div>
                                <!---------------------------------------------------->
                                <div class="box-footer">
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                                            <a href="?module=sucursales" class="btn btn-default btn-reset">Cancelar</a>
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
            $query = mysqli_query($mysqli, "SELECT * FROM sucursales WHERE suc_cod = '$_GET[id]'")
                                            or die('Error '.mysqli_error($mysqli));
            
            $data = mysqli_fetch_assoc($query);

        } ?>

        <!----------------------MODIFICAR-------------------------->
        <section class="content-header">
            <h1>
                <i class="fa fa-edit icon-title"></i>
                Modificar Sucursal
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
                    <a href="?module=sucursales">
                    Sucursal
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
                        <form role="form" class="form-horizontal" action="modules/4_sucursales/proces.php?act=update" method="POST">
                            <div class="box-body">
                                <!---------------------------------------------------->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Codigo</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="suc_cod" value="<?php echo $data['suc_cod']; ?>" readonly>
                                    </div>
                                </div>
                                <!---------------------------------------------------->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Descripción</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="suc_nom" value="<?php echo $data['suc_nom']; ?>" required>
                                    </div>
                                </div>
                                <!---------------------------------------------------->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Dirección</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="suc_dir" value="<?php echo $data['suc_dir']; ?>" required>
                                    </div>
                                </div>
                                <!---------------------------------------------------->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Factura</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="suc_fac" value="<?php echo $data['suc_fac']; ?>" required>
                                    </div>
                                </div>
                                <!---------------------------------------------------->
                                <div class="box-footer">
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                                            <a href="?module=sucursales" class="btn btn-default btn-reset">Cancelar</a>
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
