<?php
    if($_GET['form']=='add'){ ?>

        <section class="content-header">
            <h1>
                <i class="fa fa-edit icon-title"></i>
                Agregar Reclamos
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
                    <a href="?module=reclamos">
                        Reclamos
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
                        <form role="form" class="form-horizontal" action="modules/16_reclamos/proces.php?act=insert" method="POST">
                            <div class="box-body">
                                <?php //METODO PARA GENERAR CODIGO
                                    $query_id =mysqli_query($mysqli, "SELECT MAX(rec_cod) AS id FROM reclamos")
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
                                    <label class="col-sm-1 control-label">Codigo</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" name="rec_cod" value="<?php echo $codigo; ?>" readonly>
                                    </div>

                                    <label class="col-sm-1 control-label">Fecha</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" data-date-format="dd-mm-yyyy" name="rec_fecha" autocomplete="of" 
                                        value="<?php echo date("y-m-d"); ?>" readonly>
                                    </div>

                                    <label class="col-sm-1 control-label">Empleado</label>
                                    <div class="col-sm-4">
                                        <input type="hidden" class="form-control" name="emp_cod" value="<?php echo $_SESSION['emp_cod']; ?>" readonly>
                                        <input type="text" class="form-control" name="emp_nom_ape" value="<?php echo $_SESSION['emp_nom_ape']; ?>" readonly>
                                    </div>
                                </div>
                                <hr>
                                <!---------Combo buscador----------------------------->

                                <div class="form-group">
                                   
                                    <label class="col-sm-1 control-label">Salida</label>
                                    <div class="col-sm-10">
                                        <select class="chosen-select" name="sal_cod" data-placeholder="-- Seleccionar una Salida--" >
                                            <option value=""></option>
                                            <?php
                                                if($_SESSION['suc_cod'] == 1){
                                                    $query_sse = mysqli_query($mysqli, "  SELECT * FROM v_salidas
                                                                                    WHERE sal_estado = 'GARANTIA OPERATIVO'") 
                                                                        or die ('Error'.mysqli_error($mysqli));
                                                } else {
                                                    $query_sse = mysqli_query($mysqli, "  SELECT * FROM v_salidas
                                                                                    WHERE sal_estado = 'GARANTIA OPERATIVO' AND suc_cod = $_SESSION[suc_cod]") 
                                                                        or die ('Error'.mysqli_error($mysqli));
                                                }
                                                
                                                while ($data_sal = mysqli_fetch_assoc($query_sse)){
                                                    echo "<option value=\"$data_sal[sal_cod]\">Nro: $data_sal[sal_cod] | Cliente: $data_sal[cli_nom_ape] --/-- $data_sal[veh_chapa_marca]</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <!---------------------------------------------------->
                                <hr>
                                <!---------------------------------------------->
                                 
                                <div class="form-group">
                                    <label class="col-sm-1 control-label">Cliente</label>
                                    <div class="col-sm-4">
                                        <select class="chosen-select" name="cli_cod" data-placeholder="-- Seleccionar un cliente--"
                                        autocomplete="off" required>
                                            <option value=""></option>
                                            <?php 
                                                $query_u = mysqli_query($mysqli, "SELECT * FROM clientes ORDER BY cli_cod ASC") 
                                                                        or die ('Error'.mysqli_error($mysqli));
                                                while ($data_dep = mysqli_fetch_assoc($query_u)){
                                                    echo "<option value=\"$data_dep[cli_cod]\">$data_dep[cli_ci] - $data_dep[cli_nom] $data_dep[cli_ape]</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                    
                                    <!---------------------------------------------->
                                
                                    <label class="col-sm-1 control-label">Asunto</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="rec_asunto" placeholder="-- Ingresa el asunto --" required>
                                    </div>
                                </div>
                                <!---------------------------------------------->
                                <div class="form-group">
                                    <label class="col-sm-1 control-label">Descripcion</label>
                                    <div class="col-sm-10">
                                        
                                        <textarea class="form-control" name="rec_descri" cols="90" rows="5" 
                                        placeholder="-- Ingresa el reclamo --" required></textarea>

                                    </div>
                                </div>
                                <!---------------------------------------------------->
                                <div class="box-footer">
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                                            <a href="?module=reclamos" class="btn btn-default btn-reset">Cancelar</a>
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
