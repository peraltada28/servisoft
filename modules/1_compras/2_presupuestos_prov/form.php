<?php
    if($_GET['form']=='add'){ ?>

        <section class="content-header">
            <h1>
                <i class="fa fa-edit icon-title"></i>
                Agregar Presupuesto
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
                    <a href="?module=presupuestos">
                        Presupuestos
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
                        <form role="form" class="form-horizontal" action="modules/11_presupuestos/proces.php?act=insert" method="POST">
                            <div class="box-body">
                                <?php //METODO PARA GENERAR CODIGO
                                    $query_id =mysqli_query($mysqli, "SELECT MAX(dia_cod) AS id FROM presupuestos")
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
                                        <input type="text" class="form-control" name="pre_cod" value="<?php echo $codigo; ?>" readonly>
                                    </div>

                                    <label class="col-sm-1 control-label">Fecha</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="pre_fecha" autocomplete="of" 
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
                                   
                                    <label class="col-sm-1 control-label">Diagnostico</label>
                                    <div class="col-sm-10">
                                        <select class="chosen-select" name="dia_cod" data-placeholder="-- Seleccionar una Solicitud--" >
                                            <option value=""></option>
                                            <?php
                                                if($_SESSION['suc_cod'] == 1){
                                                    $query_sse = mysqli_query($mysqli, "  SELECT * FROM v_diagnosticos 
                                                                                    WHERE dia_estado = 'ACTIVO'") 
                                                                        or die ('Error'.mysqli_error($mysqli));
                                                } else {
                                                    $query_sse = mysqli_query($mysqli, "  SELECT * FROM v_diagnosticos 
                                                                                    WHERE dia_estado = 'ACTIVO' AND suc_cod = $_SESSION[suc_cod]") 
                                                                        or die ('Error'.mysqli_error($mysqli));
                                                }
                                                
                                                while ($data_sse = mysqli_fetch_assoc($query_sse)){
                                                    echo "<option value=\"$data_sse[dia_cod]\">$data_sse[dia_estado] | Cliente: $data_sse[cli_ci] - $data_sse[ddi_descri]</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <!---------Combo buscador----------------------------->
                                <div class="form-group">
                                   
                                    <label class="col-sm-1 control-label">Vehículo</label>
                                    <div class="col-sm-10">
                                        <select class="chosen-select" name="veh_cod" data-placeholder="-- Seleccionar un vehículo--" >
                                            <option value=""></option>
                                            <?php
                                                
                                                $query_u = mysqli_query($mysqli, "SELECT * FROM v_vehiculos WHERE veh_estado = 'DIAGNOSTICADO'") 
                                                                        or die ('Error'.mysqli_error($mysqli));
                                                while ($data_dep = mysqli_fetch_assoc($query_u)){
                                                    echo "<option value=\"$data_dep[veh_cod]\">C.I: $data_dep[cli_ci]  $data_dep[veh_chapa] - $data_dep[veh_marca]</option>";
                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                               <hr>
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
                                            <a href="?module=presupuestos" class="btn btn-default btn-reset">Cancelar</a>
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
            url:'./ajax/items_dg/items.php',
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
            url: "./ajax/items_dg/agregar_items.php",
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
            url: "./ajax/items_dg/agregar_items.php",
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


