<?php 
    if($_GET['form']=='add'){ ?>
        <section class="content-header">
            <h1>
                <i class="fa fa-edit icon-title">
                    Agregar Solicitud de Servicios </i>
            </h1>
            <ol class="breadcrumb">
                <li>
                    <a href="?module=start"><i class="fa fa-home"></i>Inicio</a>
                </li>
                <li>
                    <a href="?module=solicitud_recepcion"> Solicitud de Servicios </a>
                </li>
                <li class="active">Agregar</li>
            </ol>
        </section>      

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <form role="form" class="form-horizontal" action="modules/8_solicitud_recepcion/proces.php?act=insert" method="POST">
                            <div class="box-body">
                                <?php
                                //Método para generar código
                                    $query_id = mysqli_query($mysqli, "SELECT MAX(sse_cod) as id FROM solicitud_servicio")
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
                                    <label class="col-sm-1 control-label">Código</label>
                                    <div class="col-sm-1">
                                        <input type="text" class="form-control" name="sse_cod" value="<?php echo $codigo; ?>" readonly>
                                    </div>

                                    <label class="col-sm-1 control-label">Fecha</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control date-picker" data-date-format="dd-mm-yy" name="sse_fecha" autocomplete="of" 
                                        value="<?php echo date("y-m-d"); ?>" readonly>
                                    </div>
                                </div>
                                <!---------------->
                                <div class="form-group">
                                    <label class="col-sm-1 control-label">Empleado</label>
                                    <div class="col-sm-5">
                                        <input type="hidden" class="form-control" name="emp_cod" value="<?php echo $_SESSION['emp_cod']; ?>" readonly>
                                        <input type="text" class="form-control" name="emp_nom_ape" value="<?php echo $_SESSION['emp_nom_ape']; ?>" readonly>
                                    </div>

                                </div>
                                
                                <!---------Combo Sucursal---------------------->
                                <div class="form-group">
                                    <label class="col-sm-1 control-label">Sucursal</label>
                                    <div class="col-sm-5">
                                        <select class="chosen-select" name="suc_cod" data-placeholder="-- Seleccionar Sucursal --"
                                        autocomplete="off" required>
                                            <option value=""></option>
                                            <?php 
                                                if($_SESSION['suc_cod'] == 1){
                                                $query_tp = mysqli_query($mysqli, " SELECT suc_cod, suc_descri, suc_direc FROM sucursales 
                                                                                    ORDER BY suc_cod ASC") or die ('Error'.mysqli_error($mysqli));
                                                } else {
                                                $query_tp = mysqli_query($mysqli, " SELECT suc_cod, suc_descri, suc_direc
                                                                                    FROM sucursales WHERE suc_cod = $_SESSION[suc_cod]
                                                                                    ORDER BY suc_cod ASC") or die ('Error'.mysqli_error($mysqli));
                                                }
                                                
                                                
                                                while ($data_tp = mysqli_fetch_assoc($query_tp)){
                                                    echo "<option value=\"$data_tp[suc_cod]\">$data_tp[suc_cod] - $data_tp[suc_descri] $data_tp[suc_direc]</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <!---------------->
                                <div class="form-group">
                                    <!----------------------->
                                    <label class="col-sm-1 control-label">Cliente</label>
                                    <div class="col-sm-5">
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
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-1 control-label">Vehículo</label>
                                    <div class="col-sm-5">
                                        <select class="chosen-select" name="veh_cod" data-placeholder="-- Seleccionar un vehículo--"
                                        autocomplete="off" required>
                                            <option value=""></option>
                                            <?php 
                                                $query_u = mysqli_query($mysqli, "SELECT * FROM v_vehiculos ORDER BY veh_cod ASC") 
                                                                        or die ('Error'.mysqli_error($mysqli));
                                                while ($data_dep = mysqli_fetch_assoc($query_u)){
                                                    echo "<option value=\"$data_dep[veh_cod]\">C.I: $data_dep[cli_ci] : $data_dep[veh_chapa] - $data_dep[veh_marca]</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <!---------------->
                                <div class="form-group">
                                    <label class="col-sm-1 control-label">Observación</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="obs" value="" placeholder="-- Ingrese una observacion--">
                                    </div>
                                </div>
                                <!---------------------------------------------->
                                <div class="form-group">
                                    <div id="resultados" class='col-md-10'></div>  
                                </div>    
                                <!----------------------------------------------> 

                                <div class="form-group">  
                                    <div class="pull-rigth">
                                        <label class="col-sm-2 control-label">Items</label>
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
                                        <span class="glyphicon glyphicon-plus"></span> Agregar items
                                        </button>
                                    </div>	
                                </div>
                                <!---------------------------------------------->                  
                                              
                                <div class="box-footer">
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                                            <a href="?module=solicitud_recepcion" class="btn btn-default btn-reset">Cancelar</a>
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
        if(isset($_GET['sse_cod'])){
            $sse_cod = $_GET['sse_cod'];
            $query = mysqli_query($mysqli, "SELECT * FROM solicitud_servicio WHERE sse_cod = '$sse_cod'")
                                            or die('Error '.mysqli_error($mysqli));
            
            $data = mysqli_fetch_assoc($query);

        } ?>

        <!----------------------MODIFICAR-------------------------->
        <section class="content-header">
            <h1>
                <i class="fa fa-edit icon-title"></i>
                Modificar Solicitud
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
                    <a href="?module=solicitud_recepcion">
                        Solicitud
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
                        <form role="form" class="form-horizontal" action="modules/8_solicitud_recepcion/proces.php?act=edit" method="POST">
                            <div class="box-body">
                                <!---------------------------------------------------->
                                <div class="form-group">
                                    <label class="col-sm-1 control-label">Código</label>
                                    <div class="col-sm-1">
                                        <input type="text" class="form-control" name="sse_cod" value="<?php echo $sse_cod; ?>" readonly>
                                    </div>

                                    <label class="col-sm-1 control-label">Fecha</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control date-picker" data-date-format="dd-mm-yy" name="sse_fecha" autocomplete="of" 
                                        value="<?php echo date("y-m-d"); ?>" readonly>
                                    </div>
                                </div>
                                <!---------------->
                                <div class="form-group">
                                    <label class="col-sm-1 control-label">Empleado</label>
                                    <div class="col-sm-5">
                                        <input type="hidden" class="form-control" name="emp_cod" value="<?php echo $_SESSION['emp_cod']; ?>" readonly>
                                        <input type="text" class="form-control" name="emp_nom_ape" value="<?php echo $_SESSION['emp_nom_ape']; ?>" readonly>
                                    </div>

                                </div>
                                <!---------------------------------------------------->

                                <!---------Combo Sucursal---------------------->
                                <div class="form-group">
                                    <label class="col-sm-1 control-label">Sucursal</label>
                                    <div class="col-sm-5">
                                        <select class="chosen-select" name="suc_cod" data-placeholder="-- Seleccionar Sucursal --"
                                        autocomplete="off" required>

                                            <?php 
                                                $query_vs = mysqli_query($mysqli, " SELECT * FROM v_solicitud_servicio WHERE sse_cod = $sse_cod") 
                                                                or die ('Error'.mysqli_error($mysqli));

                                                while ($data_vs = mysqli_fetch_assoc($query_vs)){
                                                    echo "<option value=\"$data_vs[suc_cod]\">$data_vs[suc_descri_direc] </option>";
                                                }

                                                if($_SESSION['suc_cod'] == 1){
                                                    $query_tp = mysqli_query($mysqli, " SELECT suc_cod, suc_descri, suc_direc FROM sucursales 
                                                                                    ORDER BY suc_cod ASC") or die ('Error'.mysqli_error($mysqli));
                                                } else {
                                                    $query_tp = mysqli_query($mysqli, " SELECT suc_cod, suc_descri, suc_direc
                                                                                    FROM sucursales WHERE suc_cod = $_SESSION[suc_cod]
                                                                                    ORDER BY suc_cod ASC") or die ('Error'.mysqli_error($mysqli));
                                                }
                                                
                                                
                                                while ($data_tp = mysqli_fetch_assoc($query_tp)){
                                                    echo "<option value=\"$data_tp[suc_cod]\">$data_tp[suc_cod] - $data_tp[suc_descri] $data_tp[suc_direc]</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <!---------------->
                                <div class="form-group">
                                    <!----------------------->
                                    <label class="col-sm-1 control-label">Cliente</label>
                                    <div class="col-sm-5">
                                        <select class="chosen-select" name="cli_cod" data-placeholder="-- Seleccionar un cliente--"
                                        autocomplete="off" readonly>

                                            <?php
                                                $query_cl = mysqli_query($mysqli, " SELECT * FROM v_solicitud_servicio WHERE sse_cod = $sse_cod") 
                                                                or die ('Error'.mysqli_error($mysqli));

                                                while ($data_cl = mysqli_fetch_assoc($query_cl)){
                                                    echo "<option value=\"$data_cl[cli_cod]\">$data_cl[cli_nom_ape_ci] </option>";
                                                }

                                                $query_u = mysqli_query($mysqli, "SELECT * FROM clientes ORDER BY cli_cod ASC") 
                                                                        or die ('Error'.mysqli_error($mysqli));
                                                while ($data_dep = mysqli_fetch_assoc($query_u)){
                                                    echo "<option value=\"$data_dep[cli_cod]\">$data_dep[cli_ci] - $data_dep[cli_nom] $data_dep[cli_ape]</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-1 control-label">Vehículo</label>
                                    <div class="col-sm-5">
                                        <select class="chosen-select" name="veh_cod" data-placeholder="-- Seleccionar un vehículo--"
                                        autocomplete="off" readonly>
                                        <?php
                                                $query_ve = mysqli_query($mysqli, " SELECT * FROM v_solicitud_servicio WHERE sse_cod = $sse_cod") 
                                                                or die ('Error'.mysqli_error($mysqli));

                                                while ($data_cl = mysqli_fetch_assoc($query_ve)){
                                                    echo "<option value=\"$data_cl[veh_cod]\">$data_cl[veh_chapa_marca] </option>";
                                                }


                                                $query_u = mysqli_query($mysqli, "SELECT * FROM v_vehiculos ORDER BY veh_cod ASC") 
                                                                        or die ('Error'.mysqli_error($mysqli));
                                                while ($data_dep = mysqli_fetch_assoc($query_u)){
                                                    echo "<option value=\"$data_dep[veh_cod]\">C.I: $data_dep[cli_ci] : $data_dep[veh_chapa] - $data_dep[veh_marca]</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>

                                <!---------------->
                                <div class="form-group">
                                    <label class="col-sm-1 control-label">Observación</label>
                                    <div class="col-sm-5">
                                        <?php
                                        $query_obs = mysqli_query($mysqli, "SELECT * FROM v_solicitud_servicio where sse_cod = $sse_cod") 
                                        or die ('Error'.mysqli_error($mysqli));

                                        while ($data_obs = mysqli_fetch_assoc($query_obs)){
                                            $obs = $data_obs['obs'];
                                        }
                                        ?>
                                        <input type="text" class="form-control" name="obs" value="<?php echo $obs;?>" 
                                            placeholder="-- Ingrese una observacion--" require>
                                    </div>
                                </div>
                                
                                <!----------------------------------------------> 

                                <div class="form-group">  
                                    <div class="pull-rigth">
                                        <label class="col-sm-2 control-label">Items</label>
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
                                        <span class="glyphicon glyphicon-plus"></span> Agregar items
                                        </button>
                                    </div>	
                                </div>  
                                                
                                <!---------------------------------------------->
                                <div class="form-group">
                                    <div id="resultados" class='col-md-10'></div>  
                                </div>    
                                <!---------------------------------------------->             
                                <div class="box-footer">
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                                            <a href="?module=solicitud_recepcion" class="btn btn-default btn-reset">Cancelar</a>
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


<!--------------------------------------------->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>

<script>
    $(document).ready(function(){
        load(1);  
    });

    function load(page){
        var x = $("#x").val();
        var parametros={"action":"ajax","page":page,"x":x};
        $("#loader").fadeIn('slow');
        $.ajax({
            url:'./ajax/items/items.php',
            data: parametros,
            beforeSend: function(objeto){
                $('#loader').html('<img src="./images/ajax-loader.gif"> Cargando...');
            },
            success:function(data){
                $(".outer_div").html(data).fadeIn('slow');
                $('#loader').html('');
            }
        })
    }
</script>
<script>
    function agregar(id){
        var precio=$('#precio_compra_'+id).val();
        var cantidad=$('#cantidad_'+id).val();
        if(isNaN(cantidad)){
            alert('Esto no es un nro');
            document.getElementById('cantidad_'+id).focus();
            return false;
        }
        if(isNaN(precio)){
            alert('Esto no es un nro');
            document.getElementById('precio_'+id).focus();
            return false;
        }
        //fin de la validación
        var parametros={"id_src":id,"precio_compra_src":precio,"cantidad_src":cantidad};
        $.ajax({
            type: "POST",
            url: "./ajax/items/agregar_items.php",
            data: parametros,
            beforeSend: function(objeto){
                $("#resultados").html("Mensaje: Cargando...[beforeSend(402:form)]");
            },
            success: function(datos){
                $("#resultados").html(datos);
            }
        });
    }
    function eliminar(id){
        $.ajax({
            type: "GET",
            url: "./ajax/items/agregar_items.php",
            data: "id="+id,
            beforeSend: function(objeto){
                $("#resultados").html("Mensaje: Cargando...[beforeSend(415:form)]");
            },
            success: function(datos){
                $("#resultados").html(datos);
            }
        });
    }

</script>

                            
<div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModallabel">Buscar Productos</h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal">
            <div class="form-group">
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="x" placeholder="Buscar productos" onkeyup="load(1)">
                </div>
                <button type="button" class="btn btn-default" onclick="load(1)"><span class="glyphicon glyphicon-search"></span>Buscar</button>
            </div>                            
            </form>
            <div id="loader" style="position: absolute; text-align: center; top: 55px; width:100%; display:none;"></div>
            <div class="outer_div"></div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        </div>                                
        </div>
    </div>                                      
</div>


