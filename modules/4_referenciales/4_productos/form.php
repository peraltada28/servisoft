<?php
    if($_GET['form']=='add'){ ?>

        <section class="content-header">
            <h1>
                <i class="fa fa-edit icon-title"></i>
                Agregar Item
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
                    <a href="?module=items">
                        Item
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
                        <form role="form" class="form-horizontal" action="modules/5_items/proces.php?act=insert" method="POST">
                            <div class="box-body">
                                <?php //METODO PARA GENERAR CODIGO
                                    $query_cod =mysqli_query($mysqli, "SELECT MAX(ite_cod) AS id FROM items")
                                                                    or die('Error '.mysqli_error($mysqli));
                                    
                                    $count = mysqli_num_rows($query_cod);
                                    if($count<>0){
                                        $data_cod = mysqli_fetch_assoc($query_cod);
                                        $ite_cod = $data_cod['id'] + 1;
                                    } else {
                                        $ite_cod = 1;
                                    }
                                ?>
                                <!---------------------------------------------------->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Codigo</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="ite_cod" value="<?php echo $ite_cod; ?>" readonly>
                                    </div>
                                </div>
                                <!---------Combo tipo_items---------------------->
                                <div class="form-group">
                                <label class="col-sm-2 control-label">Tipo</label>
                                <div class="col-sm-5">
                                    <select class="chosen-select" name="tip_cod" data-placeholder="-- Seleccionar tipo --"
                                    autocomplete="off" required>
                                        <option value=""></option>
                                        <?php 
                                            $query_tp = mysqli_query($mysqli, "SELECT * FROM tipo_items ORDER BY tip_cod ASC") 
                                                                        or die ('Error'.mysqli_error($mysqli));
                                            while ($data_tp = mysqli_fetch_assoc($query_tp)){
                                                echo "<option value=\"$data_tp[tip_cod]\">$data_tp[tip_cod] - $data_tp[tip_des]</option>";
                                            }
                                        ?>
                                        </select>
                                    </div>
                                    
                                </div>
                                <!---------------------------------------------------->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Descripcion</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="ite_des" placeholder="Ingresa una descripcion" required>
                                    </div>
                                </div>
                                <!---------------------> 
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Precio</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="ite_pre" placeholder="Ingresa un precio"
                                        autocomplete="off" onkeyPress="return goodchars(event, '0123456789', this)" required>
                                    </div>
                                </div>                               
                                <!----------------------->
                                <div class="box-footer">
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                                            <a href="?module=items" class="btn btn-default btn-reset">Cancelar</a>
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
            $query = mysqli_query($mysqli, "SELECT * FROM items WHERE ite_cod = '$_GET[id]'")
                                            or die('Error '.mysqli_error($mysqli));
            
            $data = mysqli_fetch_assoc($query);

        } ?>

        <!----------------------MODIFICAR-------------------------->
        <section class="content-header">
            <h1>
                <i class="fa fa-edit icon-title"></i>
                Modificar items
            </h1>

            <ol class="breadcrumb">
                <!--------------------------------->
                <li>
                    <a href="?module=start">
                        <i class="fa fa-home"></i>
                        Items
                    </a>
                </li>
                <!--------------------------------->
                <li>
                    <a href="?module=items">
                        Items
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
                        <form role="form" class="form-horizontal" action="modules/5_items/proces.php?act=update" method="POST">
                            <div class="box-body">
                                <!---------------------------------------------------->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Codigo</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="ite_cod" 
                                            value="<?php echo $data['ite_cod']; ?>" readonly>
                                    </div>
                                </div>
                                <!---------------------------------------------------->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Tipo</label>
                                    <div class="col-sm-5">
                                        <select name="tip_cod" class="form-control">
                                            <?php
                                                 $query_tipo = mysqli_query($mysqli, "SELECT * FROM v_items
                                                                                WHERE ite_cod = '$_GET[id]'")
                                                 or die('Error '.mysqli_error($mysqli));
                                                $data_tp = mysqli_fetch_assoc($query_tipo);
                                            ?>
                                            <option value="<?php echo $data_tp['tip_cod']; ?>"><?php echo $data_tp['tip_cod']; echo " - "; echo $data_tp['tip_des']; ?></option>
                                            
                                            <?php 
                                                $query_tipo1 = mysqli_query($mysqli, "SELECT * FROM tipo_items ")
                                                                                or die('Error '.mysqli_error($mysqli));
                                            
                                                while ($data_tipo = mysqli_fetch_assoc($query_tipo1)){
                                                    echo "<option value=\"$data_tipo[tip_cod]\">$data_tipo[tip_cod] - $data_tipo[tip_des]</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                
                                <!---------------------------------------------------->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Descripcion</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="ite_des" 
                                            value="<?php echo $data['ite_des']; ?>" required>
                                    </div>
                                </div>
                                <!----------------------------------------------------> 
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Precio</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="ite_pre" value="<?php echo $data['ite_pre']; ?>"
                                        autocomplete="off" onkeyPress="return goodchars(event, '0123456789', this)">
                                    </div>
                                </div> 
                                <!---------------------------------------------------->
                                <div class="box-footer">
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                                            <a href="?module=items" class="btn btn-default btn-reset">Cancelar</a>
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
