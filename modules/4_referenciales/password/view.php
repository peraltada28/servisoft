<section class="content-header">
    <h1>
     <i class="fa fa-lock icon-title"></i>Modificar Contraseña
    </h1>
    <ol class="breadcrumb">
        <li><a href="?module=start"><i class="fa fa-home"></i>Inicio</a></li>
        <li class="active">Contraseña</li>
        <li class="active">Modificar</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!--Agregar los mensajes de errores-->
            <?php 
                if(empty($_GET['alert'])){
                    echo "";
                }elseif($_GET['alert'] ==1){
                    echo "<div class='alert alert-danger' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4> <i class='icon fa fa-times-circle'></i>Error!</h4>
                    En contraseña
                    </div>";
                }elseif($_GET['alert'] ==2){
                    echo "<div class='alert alert-danger' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4> <i class='icon fa fa-times-circle'></i>Error!</h4>
                    La nueva contraseña ingresada no coincide.
                    </div>";
                }elseif($_GET['alert'] ==3){
                    echo "<div class='alert alert-success' role='alert'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4> <i class='icon fa fa-times-circle'></i>Exitoso!</h4>
                    La nueva contraseña cambiada exitosamente
                    </div>";
                }
            ?>
            <div class="box box-primary">
                <form role="form" class="form-horizontal" method="POST" action="modules/password/procesar.php">
                    <div class="box-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Contraseña antigua</label>
                            <div class="col-sm-5">
                                <input type="password" class="form-control" name="old_pass" placeholder="contraseña antigua" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Contraseña nueva</label>
                            <div class="col-sm-5">
                                <input type="password" class="form-control" name="new_pass" placeholder="contraseña nueva" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Repertir la nueva contraseña</label>
                            <div class="col-sm-5">
                                <input type="password" class="form-control" name="retype_pass" placeholder="repetir contraseña" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                    <div class="box-footer bg-btn-action">
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>