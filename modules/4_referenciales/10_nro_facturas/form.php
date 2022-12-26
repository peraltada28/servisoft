<?php
    if($_GET['form']=='add'){ ?>

        <section class="content-header">
            <h1>
                <i class="fa fa-edit icon-title"></i>
                Agregar Tipo Item
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
                    <a href="?module=tipo_items">
                        Tipo de Item
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
                        <form role="form" class="form-horizontal" action="modules/6_tipo_items/proces.php?act=insert" method="POST">
                            <div class="box-body">
                                <?php //METODO PARA GENERAR CODIGO
                                    $query_cod = mysqli_query($mysqli, "SELECT MAX(tip_cod) AS id FROM tipo_items")
                                                                    or die('Error '.mysqli_error($mysqli));
                                    
                                    $count = mysqli_num_rows($query_cod);
                                    if($count<>0){
                                        $data_cod = mysqli_fetch_assoc($query_cod);
                                        $tit_cod = $data_cod['id'] + 1;
                                    } else {
                                        $tit_cod = 1;
                                    }
                                ?>
                                <!---------------------------------------------------->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Codigo</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="tip_cod" value="<?php echo $tit_cod; ?>" readonly>
                                    </div>
                                </div>
                                <!---------------------------------------------------->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Descripción</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="tip_des" placeholder="Ingresa un tipo de item" autocomplete="off" required>
                                    </div>
                                </div>
                                <!---------------------------------------------------->
                                <div class="box-footer">
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                                            <a href="?module=tipo_items" class="btn btn-default btn-reset">Cancelar</a>
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
            $query = mysqli_query($mysqli, "SELECT * FROM tipo_items WHERE tip_cod = '$_GET[id]'")
                                            or die('Error '.mysqli_error($mysqli));
            
            $data = mysqli_fetch_assoc($query);

        } ?>

        <!----------------------MODIFICAR-------------------------->
        <section class="content-header">
            <h1>
                <i class="fa fa-edit icon-title"></i>
                Modificar Tipo de Item
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
                    <a href="?module=tipo_items">
                        Tipo de item
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
                        <form role="form" class="form-horizontal" action="modules/6_tipo_items/proces.php?act=update" method="POST">
                            <div class="box-body">
                                <!---------------------------------------------------->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Codigo</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="tip_cod" value="<?php echo $data['tip_cod']; ?>" readonly>
                                    </div>
                                </div>
                                <!---------------------------------------------------->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Tipo de Producto</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="tip_des" autocomplete="off" value="<?php echo $data['tip_des']; ?>"  required>
                                    </div>
                                </div>
                                <!---------------------------------------------------->
                                <div class="box-footer">
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                                            <a href="?module=tipo_items" class="btn btn-default btn-reset">Cancelar</a>
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























