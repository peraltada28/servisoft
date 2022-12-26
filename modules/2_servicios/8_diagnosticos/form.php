<?php
    if($_GET['form']=='add'){ 
        $ord_cod = $_GET['ord_cod']; 
        ?>

        <section class="content-header">
            <h1>
                <i class="fa fa-edit icon-title"></i>
                Agregar Diagnostico
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
                    <a href="?module=diagnosticos">
                        Diagnosticos
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
                        <form role="form" class="form-horizontal" action="modules/8_diagnosticos/proces.php?act=insert" method="POST">
                            <div class="box-body">
                                <?php //METODO PARA GENERAR CODIGO
                                    $query_id =mysqli_query($mysqli, "SELECT MAX(dia_cod) AS id FROM diagnosticos")
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
                                    <label class="col-sm-1 control-label">CODIGO</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" name="dia_cod" value="<?php echo $codigo; ?>" readonly>
                                    </div>

                                    <label class="col-sm-1 control-label">FECHA</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="dia_fec" autocomplete="of" 
                                        value="<?php echo date("y-m-d"); ?>" readonly>
                                    </div>

                                    <label class="col-sm-1 control-label">FUNCIONARIO</label>
                                    <div class="col-sm-4">
                                        <input type="hidden" class="form-control" name="fun_cod" value="<?php echo $_SESSION['fun_cod']; ?>">
                                        <input type="text" class="form-control" name="fun_nom_ape" value="<?php echo $_SESSION['fun_nom_ape']; ?>" readonly>
                                    </div>
                                </div>
                                <hr>
                                <!--------------------------------------------------->
                                <h3>
                                    <i class="fa fa-edit icon-title"></i>
                                    Datos de la orden
                                </h3>
                                <hr>
                                <?php
                                
                                $query_id =mysqli_query($mysqli, "SELECT * FROM v_orden_trabajos WHERE ord_cod = $ord_cod;")
                                                                    or die('Error '.mysqli_error($mysqli));
                                    
                                $data_id = mysqli_fetch_assoc($query_id);
                                $codigo = $data_id['ord_cod'];
                                $veh_cod = $data_id['veh_cod'];
                                $ord_des = $data_id['ord_des'];
                                $veh_chapa_marca = $data_id['veh_chapa_marca'];
                                $cli_nom_ape = $data_id['cli_nom_ape'];
                                    
                                ?>

                                </div>
                                <div class="form-group">
                                    <label class="col-sm-1 control-label">CLIENTE</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="dia_cod" value="<?php echo $cli_nom_ape; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">

                                    <label class="col-sm-1 control-label">VEHICULO</label>
                                    <div class="col-sm-9">
                                        <input type="hidden" class="form-control date-picker" name="veh_cod" value="<?php echo $veh_cod; ?>">
                                        <input type="text" class="form-control date-picker" name="veh_chapa_marca" value="<?php echo $veh_chapa_marca; ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-1 control-label">DESCRIPCION</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control date-picker" name="veh_cod" value="<?php echo $ord_des; ?>" readonly>
                                    </div>
                                </div>    
                                <!----------------------------------------------> 
                                <div class="form-group">
                                    <label class="col-sm-1 control-label">Diagnostico</label>
                                    <div class="col-sm-10">
                                        
                                        <textarea class="form-control" name="dia_des" cols="90" rows="5" 
                                        placeholder="-- Ingresa el diagnostico --" required></textarea>

                                    </div>
                                </div>
                                <!---------------------------------------------------->
                                <div class="box-footer">
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                                            <a href="?module=diagnosticos" class="btn btn-default btn-reset">Cancelar</a>
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
            url:'./ajax/vehiculos/vehiculos.php',
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
        
        //pasar el id del vehiculo a agregar_vehiculos.php
        var parametros={"id_src":id};
        $.ajax({
            type: "POST",
            url: "./ajax/vehiculos/agregar_vehiculos.php",
            data: parametros,
            beforeSend: function(objeto){
                $("#resultados").html("Mensaje: Cargando...  [beforeSend(193:form)]");
            },
            success: function(datos){
                $("#resultados").html(datos);
            }
        });
    }
    function eliminar(id){
        $.ajax({
            type: "GET",
            url: "./ajax/vehiculos/agregar_vehiculos.php",
            data: "id="+id,
            beforeSend: function(objeto){
                $("#resultados").html("Mensaje: Cargando...   [beforeSend(206:form)]");
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
            <h4 class="modal-title" id="myModallabel">Buscar Vehiculos</h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal">
            <div class="form-group">
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="x" placeholder="Buscar Vehiculos" onkeyup="load(1)">
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



