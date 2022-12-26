<?php 
    if($_GET['form']=='add'){ ?>
      <section class="content-header">
      <h1>
        <i class="fa fa-edit icon-title">Lubricantes y Combustibles</i>
      </h1>
      <ol class="breadcrumb">
        <li><a href="?module=start"><i class="fa fa-home"></i>Inicio</a></li>
        <li><a href="?module=entradas"> Entradas</a></li>
        <li class="active">Agregar</li>
      </ol>
      </section>      

      <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <form role="form" class="form-horizontal" action="modules/entradas/proces.php?act=insert_ac" method="POST">
                        <div class="box-body">
                            <?php
                            //Método para generar código
                                $query_id = mysqli_query($mysqli, "SELECT MAX(cod_entrada) as id FROM entradas")
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
                                <label class="col-sm-2 control-label">Código</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="codigo" value="<?php echo $codigo; ?>" readonly>
                                </div>
                                
                                <label class="col-sm-1 control-label">Fecha</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="fecha" autocomplete="of" 
                                    value="<?php echo date("yy-m-d"); ?>" readonly>
                                </div>

                                <label class="col-sm-1 control-label">Hora</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control date-picker" data-date-format="H-mm-ss" name="hora" autocomplete="of" 
                                    value="<?php echo date("H:i:s"); ?>" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Funcionario</label>
                                <div class="col-sm-4">
                                    <select class="chosen-select" name="codigo_funcionario" data-placeholder="-- Seleccionar  Funcionario --"
                                    autocomplete="off" required>
                                        <option value=""></option>
                                        <?php 
                                            $query_fun = mysqli_query($mysqli, "SELECT * FROM v_funcionarios WHERE carg_descrip ='Chofer'
                                            ORDER BY cod_funcionario ASC") or die ('Error'.mysqli_error($mysqli));
                                            while ($data_fun = mysqli_fetch_assoc($query_fun)){
                                                echo "<option value=\"$data_fun[cod_funcionario]\">$data_fun[cod_funcionario]. $data_fun[funcionario] - $data_fun[fun_ci]</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <!---tipo_item combustible--->
                                <label class="col-sm-2 control-label">Tipo de insumo</label>
                                <div class="col-sm-4">
                                    <select class="chosen-select" name="codigo_item" data-placeholder="-- Seleccionar insumo --"
                                    autocomplete="off" required>
                                        <option value=""></option>
                                        <?php 
                                            $query_it = mysqli_query($mysqli, "SELECT * FROM v_items WHERE cod_tip_item = 3 or cod_tip_item = 4
                                            ORDER BY cod_item ASC") or die ('Error'.mysqli_error($mysqli));
                                            while ($data_it = mysqli_fetch_assoc($query_it)){
                                                echo "<option value=\"$data_it[cod_item]\">$data_it[cod_item]. $data_it[tip_ins_descrip] - $data_it[item_descrip]</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                               
                            </div>
                            <!---------------------------------------------->
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Cant. Litros</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="cant_litros" required>
                                </div>
                            </div>
                            <!---------------------------------------------->                            
                             <hr>               
                            
                            <div class="form-group">
                                <div class="col-sm-12">
                                <label class="col-sm-2 control-label">Vehículo</label>
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal">
                                        <span class="glyphicon glyphicon-plus">Agregar Vehículos</span>
                                    </button>
                                </div>
                                
                            </div>


                            <div id="resultados" class="col-md-9"></div>
                               
                            <div class="box-footer">
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                                        <a href="?module=entradas" class="btn btn-default btn-reset">
                                            Cancelar
                                        </a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
        </div>
      
    </section>  

    <?php } ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>

    <!--------------------------------------------->
    <script>
        $(document).ready(function(){
          load(1);  
        });

        function load(page){
            var x = $("#x").val();
            var parametros={"action":"ajax","page":page,"x":x};
            $("#loader").fadeIn('slow');
            $.ajax({
                url:'./ajax/vehiculos_ac.php',//vehiculos_productos_pedidos
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
    <!--------------------------------------------->
    <script>
        function agregar(id){
           var parametros={"id":id};
           $.ajax({
               type: "POST",
               url: "./ajax/agregar_vehiculo.php",//agregar_veh
               data: parametros,
               beforeSend: function(objeto){
                   $("#resultados").html("Mensaje: Cargando...");
               },
               success: function(datos){
                   $("#resultados").html(datos);
               }
           });
        }
        function eliminar(id){
            $.ajax({
                type: "GET",
                url: "./ajax/agregar_vehiculo.php",
                data: "id="+id,
                beforeSend: function(objeto){
                   $("#resultados").html("Mensaje: Cargando...");
               },
               success: function(datos){
                   $("#resultados").html(datos);
               }
            });
        }
    </script>
    <!--------------------------------------------->                  
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
                            <button type="button" class="btn btn-default" onclick="load(1)">
                                <span class="glyphicon glyphicon-search"></span>
                                Buscar
                            </button>
                        </div>                            
                    </form>
                    <div id="loader" style="position:absolute; text-align:center; top:55px; width:100%; display:none;"></div>
                    <div class="outer_div"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">
                        Cerrar
                    </button>
                </div>                                
            </div>
        </div>                                      
    </div>

    