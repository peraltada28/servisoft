<?php
    if($_GET['form']=='add'){ ?>

        <section class="content-header">
            <h1>
                <i class="fa fa-edit icon-title"></i>
                Agregar Cliente
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
                    <a href="?module=clientes">
                        Clientes
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
                        <form role="form" class="form-horizontal" action="modules/1_clientes/proces.php?act=insert" method="POST">
                            <div class="box-body">
                                <?php 
                                    $query_id =mysqli_query($mysqli, "SELECT MAX(cli_cod) AS id FROM clientes")
                                                                    or die('Error '.mysqli_error($mysqli));
                                    
                                    $count = mysqli_num_rows($query_id);
                                    if($count<>0){
                                        $data_id = mysqli_fetch_assoc($query_id);
                                        $codigo = $data_id['id'] + 1;
                                    } else {
                                        $codigo = 1;
                                    }
                                ?>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Codigo</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="cli_cod" value="<?php echo $codigo; ?>" readonly>
                                    </div>
                                </div>
                                <!--------------------->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">C.I</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="cli_ci" placeholder="Ingresa un C.I"
                                        autocomplete="off" onkeyPress="return goodchars(event, '0123456789', this)" required >
                                    </div>
                                </div>
                                <!--------------------->    
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Nombre</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="cli_nom" placeholder="Ingresa el/los nombres" 
                                        onkeyPress="return goodchars(event, 'q wertyuiopasdfghjklñzxcvbnm', this)" autocomplete="off" required>
                                    </div>
                                </div>
                                <!---------------------> 
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Apellido</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="cli_ape"  placeholder="Ingresa el/los apellidos"
                                        onkeyPress="return goodchars(event, 'q wertyuiopasdfghjklñzxcvbnm', this)" autocomplete="off" required>
                                    </div>
                                </div>
                                <!---------------------> 
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Direccion</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="cli_dir" placeholder="Ingresa la direccion" autocomplete="off" required>
                                    </div>
                                </div>
                                <!---------------------> 
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Telefono</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="cli_tel" placeholder="Ingresa un telefono"
                                        autocomplete="off" onkeyPress="return goodchars(event, '0123456789', this)">
                                    </div>
                                </div>
                                <!---------------------> 
                                <div class="box-footer">
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                                            <a href="?module=clientes" class="btn btn-default btn-reset">Cancelar</a>
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
            $query = mysqli_query($mysqli, "SELECT * FROM clientes WHERE cli_cod = '$_GET[id]'")
                                            or die('Error '.mysqli_error($mysqli));
            
            $data = mysqli_fetch_assoc($query);

        } ?>

        <section class="content-header">
            <h1><i class="fa fa-edit icon-title"></i>Modificar Cliente</h1>
            <ol class="breadcrumb">
                <li><a href="?module=start"><i class="fa fa-home"></i>Inicio</a></li>
                <li><a href="?module=clientes">Cliente</a></li>
                <li class="active">Modificar</li>
            </ol>
        </section>

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <form role="form" class="form-horizontal" action="modules/1_clientes/proces.php?act=update" method="POST">
                            <div class="box-body">
                                <!---------------------------------------------------->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Codigo</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="cli_cod" value="<?php echo $data['cli_cod']; ?>" readonly>
                                    </div>
                                </div>
                                
                
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">C.I</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="cli_ci" value="<?php echo $data['cli_ci']; ?>"
                                        autocomplete="off" onkeyPress="return goodchars(event, '0123456789', this)" readonly>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Nombre</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="cli_nom" value="<?php echo $data['cli_nom']; ?>"
                                        onkeyPress="return goodchars(event, 'q wertyuiopasdfghjklñzxcvbnm', this)" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Apellido</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="cli_ape" value="<?php echo $data['cli_ape']; ?>"
                                        onkeyPress="return goodchars(event, 'q wertyuiopasdfghjklñzxcvbnm', this)" autocomplete="off" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Direccion</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="cli_dir" value="<?php echo $data['cli_dir']; ?>" autocomplete="off" required>
                                    </div>
                                </div>
                                <!---------------------> 
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Telefono</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="cli_tel" value="<?php echo $data['cli_tel']; ?>"
                                        autocomplete="off" onkeyPress="return goodchars(event, '0123456789', this)">
                                    </div>
                                </div>
                                <div class="box-footer">
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                                            <a href="?module=clientes" class="btn btn-default btn-reset">Cancelar</a>
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