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
                        <form role="form" class="form-horizontal" action="modules/1_compras/2_presupuestos_prov/proces.php?act=insert" method="POST">
                            <div class="box-body">
                                <?php //METODO PARA GENERAR CODIGO
                                    $query_id =mysqli_query($mysqli, "SELECT MAX(prc_cod) AS id FROM pre_compras")
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
                                    <input type="hidden" class="form-control" name="prc_cod" value="<?php echo $codigo; ?>">
                                    <label class="col-sm-1 control-label">Fecha</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="prc_fec" autocomplete="off" 
                                        value="<?php echo date("y-m-d"); ?>" readonly>
                                    </div>

                                    <!---------Combo proveedores---------------------->
                                
                                    <label class="col-sm-2 control-label">Proveedores</label>
                                    <div class="col-sm-5">
                                        <SELECT class="chosen-select" name="prv_cod" data-placeholder="-- Seleccionar tipo --"
                                        autocomplete="off" required>
                                            <OPTION VALUE="" placeholder="-- Seleccionar Proveedor --"></OPTION>
                                            <?php 
                                                $query_prv = mysqli_query($mysqli, "SELECT * FROM proveedores ORDER BY prv_cod ASC") 
                                                                            OR die ('Error'.mysqli_error($mysqli));
                                                WHILE ($data_prv = mysqli_fetch_assoc($query_prv)){
                                                    echo "<option value=\"$data_prv[prv_cod]\">$data_prv[prv_cod] - $data_prv[prv_raz_soc]</option>";
                                                }
                                            ?>
                                            </SELECT>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <!---------------------------------------------->
                                <div class="form-group">  
                                    <div class="pull-rigth">
                                        <label class="col-sm-3 control-label">Listar pedidos registrados</label>
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
                                            <span class="glyphicon glyphicon-plus"></span> 
                                            Pedidos
                                        </button>
                                    </div>	
                                </div>
                                <!---------------------------------------------->     
                                
                                <!---------------------------------------------->
                                <div class="form-group">
                                    <div id="resultados" class='col-md-10'></div>  
                                </div>
                                <!----------------------------------------------> 
                                <div class="box-footer">
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                                            <a href="?module=pres_proveedor" class="btn btn-default btn-reset">Cancelar</a>
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
            url:'./ajax/pedidos_compras/pedidos_compras.php',
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
        
        var parametros={"id_src":id};
        $.ajax({
            type: "POST",
            url: "./ajax/pedidos_compras/agregar_pedidos.php",
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
            url: "./ajax/pedidos_compras/agregar_pedidos.php",
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
            <h4 class="modal-title" id="myModallabel">Buscar Pedidos</h4>
        </div>
        <div class="modal-body">
            <form class="form-horizontal">
            <div class="form-group">
                <div class="col-sm-6">
                    <input type="text" class="form-control" id="x" placeholder="Buscar pedidos" onkeyup="load(1)">
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


