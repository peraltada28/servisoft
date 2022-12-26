<?php 
    if($_GET['form']=='add'){ ?>
      <section class="content-header">
      <h1>
        <i class="fa fa-edit icon-title">Agregar Recepcion de Vehiculo</i>
      </h1>
      <ol class="breadcrumb">
        <li><a href="?module=start"><i class="fa fa-home"></i>Inicio</a></li>
        <li><a href="?module=recepcion"> Recepcion de Vehiculo</a></li>
        <li class="active">Agregar</li>
      </ol>
      </section>      

      <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box box-primary">
                    <form role="form" class="form-horizontal" action="modules/9_recepcion/proces.php?act=insert" method="POST">
                        <div class="box-body">
                            <?php
                            //Método para generar código
                                $query_id = mysqli_query($mysqli, "SELECT MAX(rec_cod) as id FROM recepciones")
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
                                <div class="col-sm-3">
                                    <input type="text" class="form-control" name="rec_cod" value="<?php echo $codigo; ?>" readonly>
                                </div>

                                <label class="col-sm-2 control-label">Fecha</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="rec_fecha" autocomplete="of" 
                                    value="<?php echo date("y-m-d"); ?>" readonly>
                                </div>
                            </div>

                            <!---------------->
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Empleado</label>
                                <div class="col-sm-9">
                                    <input type="hidden" class="form-control" name="emp_cod" value="<?php echo $_SESSION['emp_cod']; ?>" readonly>
                                    <input type="text" class="form-control" name="emp_nom_ape" value="<?php echo $_SESSION['emp_nom_ape']; ?>" readonly>
                                </div>

                            </div>
                            <!---------------------------------------------->                            
                            <hr>               
                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Cliente</label>
                                <div class="col-sm-9">
                                    <select class="chosen-select" name="cli_cod" data-placeholder="-- Seleccionar un cliente--" required>
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
                
                            <!---------------------------------------------->                            
                               
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Vehículo</label>
                                <div class="col-sm-9">
                                    <select class="chosen-select" name="veh_cod" data-placeholder="-- Seleccionar un vehículo--" required>
                                        <option disable selected></option>
                                        <?php
                                            
                                            $query_u = mysqli_query($mysqli, "SELECT * FROM v_vehiculos WHERE veh_estado = 'SOLICITUD'") 
                                                                    or die ('Error'.mysqli_error($mysqli));
                                            while ($data_dep = mysqli_fetch_assoc($query_u)){
                                                echo "<option value=\"$data_dep[veh_cod]\">C.I: $data_dep[cli_ci]  $data_dep[veh_chapa] - $data_dep[veh_marca]</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <!---------------------------------------------->
                            <div class="box-footer">
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                                        <a href="?module=recepcion" class="btn btn-default btn-reset">Cancelar</a>
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
                url:'./ajax_rec/vehiculos.php',//vehiculos_productos_pedidos
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
               type: "GET",
               url: "./ajax_rec/agregar_vehiculo.php",
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
                url: "./ajax_rec/agregar_vehiculo.php",
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
                                <input type="text" class="form-control" id="x" placeholder="Buscar vehiculos" onkeyup="load(1)">
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

    