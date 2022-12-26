<?php 
    if($_GET['form']=='add'){ ?>
        <section class="content-header">
        <h1>
            <i class="fa fa-edit icon-title">
                Agregar Orden de trabajo
            </i>
        </h1>
        <ol class="breadcrumb">
            <li>
                <a href="?module=start">
                    <i class="fa fa-home"></i>
                    Inicio
                </a>
            </li>
            <li>
                <a href="?module=orden_trabajos"> 
                    Orden de trabajo
                </a>
            </li>
            <li class="active">
                Agregar
            </li>
        </ol>
        </section>      

        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <form role="form" class="form-horizontal" action="modules/7_orden_trabajos/proces.php?act=insert" method="POST">
                            <div class="box-body">
                                <?php
                                //Método para generar código
                                    $query_id = mysqli_query($mysqli, "SELECT MAX(ord_cod) as id FROM orden_trabajos")
                                                            or die('Error'.mysqli_error($mysqli));

                                    $count = mysqli_num_rows($query_id);  
                                    if($count <> 0){
                                        $data_id = mysqli_fetch_assoc($query_id);
                                        $codigo = $data_id['id']+1;
                                    } else{
                                        $codigo=1;
                                    }                      
                                ?>
                                <!---------------------------------------->
                                <div class="form-group">
                                    <label class="col-sm-1 control-label">Código</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control" name="ord_cod" value="<?php echo $codigo; ?>" readonly>
                                    </div>
                                    <!---------------------------------------->
                                    <label class="col-sm-1 control-label">Fecha</label>
                                    <div class="col-sm-2">
                                        <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="ord_fec" autocomplete="of" 
                                        value="<?php echo date("y-m-d"); ?>" readonly>
                                    </div>
                                    <!---------------------------------------->
                                    <label class="col-sm-1 control-label">Condición</label>
                                    <div class="col-sm-3">
                                       <select class="chosen-select" name="ord_con" data-placeholder="-- Seleccionar una condicion--" >
                                            <option value=""></option>    
                                            <option value="PRESUPUESTAR">PRESUPUESTAR</option>
                                            <option value="GARANTIA">GARANTIA</option>
                                            <option value="VERIFICAR">VERIFICAR</option>
                                            <option value="ENTREGADO A CLIENTE">ENTREGADO A CLIENTE</option>
                                       </select>
                                   </div>
                                </div>
                                <!---------------------------------------------------->

                                <!---------Combo buscador----------------------------->
                                <div class="form-group">             
                                    <label class="col-sm-1 control-label">Cliente</label>
                                    <div class="col-sm-5">
                                        <select class="chosen-select" name="cli_cod" data-placeholder="-- Seleccionar un Cliente--" >
                                           <option value=""></option>
                                           <?php
                                               $query_cli = mysqli_query($mysqli, "  SELECT * FROM clientes") 
                                               or die ('Error'.mysqli_error($mysqli));
                                               
                                               while ($data_cli = mysqli_fetch_assoc($query_cli)){
                                                   echo "<option value=\"$data_cli[cli_cod]\">$data_cli[cli_ci] | $data_cli[cli_nom] $data_cli[cli_ape] - $data_cli[cli_tel]</option>";
                                               }
                                           ?>
                                       </select>
                                    </div>
                                    <!---------------------------------------->
                                    <label class="col-sm-1 control-label">Vehículo</label>
                                    <div class="col-sm-5">
                                        <select class="chosen-select" name="veh_cod" data-placeholder="-- Seleccionar un vehículo--" >
                                            <option value=""></option>
                                            <?php
                                               $query_veh = mysqli_query($mysqli, "SELECT * FROM vehiculos") 
                                                                       or die ('Error'.mysqli_error($mysqli));
                                               while ($data_veh = mysqli_fetch_assoc($query_veh)){
                                                   echo "<option value=\"$data_veh[veh_cod]\"> $data_veh[veh_chapa] - $data_veh[veh_marca] $data_veh[veh_color]</option>";
                                               }
                                           ?>
                                       </select>
                                   </div>
                                </div>
                                <!---------------------------------------->
                                <hr>
                                <!---------------------------------------->
                                <div class="form-group">
                                    <label class="col-sm-1 control-label">Descripción</label>
                                    <div class="col-sm-5">
                                        <textarea class="form-control" name="ord_des" placeholder="-- Ingrese observaciones de ingreso--" required></textarea>
                                    </div>
                                    
                                </div>
                                                                    
                                <hr>
                                
                                <div class="box-footer">
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-12">
                                            <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                                            <a href="?module=orden_trabajos" class="btn btn-default btn-reset">Cancelar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!---------------------------------------->
                        </form>
                    </div>
                </div>
            </div>
        </section>  

<?php } else if($_GET['form']=='edit'){ ?>
    <section class="content-header">
    <h1>
        <i class="fa fa-edit icon-title">
            Editar Orden de trabajo
        </i>
    </h1>
    <ol class="breadcrumb">
        <li>
            <a href="?module=start">
                <i class="fa fa-home"></i>
                Inicio
            </a>
        </li>
        <li>
            <a href="?module=orden_trabajos"> 
                Orden de trabajo
            </a>
        </li>
        <li class="active">
            Editar
        </li>
    </ol>
    </section>      

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <form role="form" class="form-horizontal" action="modules/7_orden_trabajos/proces.php?act=edit" method="POST">
                        <div class="box-body">
                            <?php
                            //Método para generar código
                                $query_id = mysqli_query($mysqli, "SELECT * FROM v_orden_trabajos WHERE ord_cod = $_GET[ord_cod]")
                                                        or die('Error'.mysqli_error($mysqli));

                                $count = mysqli_num_rows($query_id);  
                                if($count <> 0){
                                    $data_id = mysqli_fetch_assoc($query_id);
                                    $ord_cod = $data_id['ord_cod'];
                                    $ord_fec = $data_id['ord_fec'];
                                    $ord_con = $data_id['ord_con'];
                                    $ord_des = $data_id['ord_des'];
                                    $cli_cod = $data_id['cli_cod'];
                                    $veh_cod = $data_id['veh_cod'];
                                } else{
                                    $ord_cod=1;
                                }                      
                            ?>
                            <!---------------------------------------->
                            <div class="form-group">
                                <label class="col-sm-1 control-label">Código</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control" name="ord_cod" value="<?php echo $ord_cod; ?>" readonly>
                                </div>
                                <!---------------------------------------->
                                <label class="col-sm-1 control-label">Fecha</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="ord_fec" autocomplete="off" 
                                    value="<?php echo $ord_fec ?>" readonly>
                                </div>
                                <!---------------------------------------->
                                <label class="col-sm-1 control-label">Condición</label>
                                <div class="col-sm-3">
                                    <select class="chosen-select" name="ord_con" data-placeholder="-- Seleccionar una condicion--" >
                                        <?php echo "<option value='$ord_con'>$ord_con</option>";?>   
                                        <option value="PRESUPUESTAR">PRESUPUESTAR</option>
                                        <option value="GARANTIA">GARANTIA</option>
                                        <option value="VERIFICAR">VERIFICAR</option>
                                        <option value="ENTREGADO A CLIENTE">ENTREGADO A CLIENTE</option>
                                    </select>
                                </div>
                            </div>
                            <!---------------------------------------------------->

                            <!---------Combo buscador----------------------------->
                            <div class="form-group">             
                                <label class="col-sm-1 control-label">Cliente</label>
                                <div class="col-sm-5">
                                    <select class="chosen-select" name="cli_cod">
                                        <?php
                                            //traer el cliente seleccionado
                                            $query_cli = mysqli_query($mysqli, " SELECT * FROM clientes WHERE cli_cod = $cli_cod") 
                                                                    or die ('Error'.mysqli_error($mysqli));
                                            
                                            while ($data_cli = mysqli_fetch_assoc($query_cli)){
                                                echo "<option value=\"$data_cli[cli_cod]\">$data_cli[cli_ci] | $data_cli[cli_nom] $data_cli[cli_ape] - $data_cli[cli_tel]</option>";
                                            }

                                            //traer los demas clientes
                                            $query_cli_2 = mysqli_query($mysqli, "  SELECT * FROM clientes") or die ('Error'.mysqli_error($mysqli));
                                            
                                            while ($data_cli_2 = mysqli_fetch_assoc($query_cli_2)){
                                                echo "<option value=\"$data_cli_2[cli_cod]\">$data_cli_2[cli_ci] | $data_cli_2[cli_nom] $data_cli_2[cli_ape] - $data_cli_2[cli_tel]</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <!----------------------------------------------------------------------------------->
                                <label class="col-sm-1 control-label">Vehículo</label>
                                <div class="col-sm-5">
                                    <select class="chosen-select" name="veh_cod" data-placeholder="-- Seleccionar un vehículo--" >
                                        
                                        <?php
                                            //traer el vehiculo seleccionado
                                            $query_veh = mysqli_query($mysqli, "SELECT * FROM vehiculos WHERE veh_cod = $veh_cod") 
                                                                    or die ('Error'.mysqli_error($mysqli));
                                            while ($data_veh = mysqli_fetch_assoc($query_veh)){
                                                echo "<option value=\"$data_veh[veh_cod]\"> $data_veh[veh_chapa] - $data_veh[veh_marca] $data_veh[veh_color]</option>";
                                            }
                                            //Agreegar los demas vehiculos<!---------------------------------------->
                                            $query_veh = mysqli_query($mysqli, "SELECT * FROM vehiculos") 
                                                                    or die ('Error'.mysqli_error($mysqli));
                                            while ($data_veh = mysqli_fetch_assoc($query_veh)){
                                                echo "<option value=\"$data_veh[veh_cod]\"> $data_veh[veh_chapa] - $data_veh[veh_marca] $data_veh[veh_color]</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <!---------------------------------------->
                            <hr>
                            <!---------------------------------------->
                            <div class="form-group">
                                <label class="col-sm-1 control-label">Descripción</label>
                                <div class="col-sm-5">
                                    <textarea class="form-control" name="ord_des" required><?php echo $ord_des; ?></textarea>
                                </div>
                                
                            </div>
                                                            
                            <div class="box-footer">
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-12">
                                        <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                                        <a href="?module=orden_trabajos" class="btn btn-default btn-reset">Cancelar</a>
                                        
                                        <a data-toggle="tooltip" data-placement="top" title="Imprimir Solicitud" class="btn btn-warning btn-sm"
                                        href="modules/7_orden_trabajos/informe.php?act=print_soli&ord_cod=<?php echo $ord_cod; ?>" target="_blank">
                                            <i style="color:#000" class="fa fa-print"></i>
                                            Solicitud
                                        </a>

                                        <a data-toggle="tooltip" data-placement="top" title="Imprimir Informe" class="btn btn-success btn-sm"
                                        href="modules/7_orden_trabajos/informe.php?act=print_inf&ord_cod=<?php echo $ord_cod; ?>" target="_blank">
                                            <i style="color:#000" class="fa fa-print"></i>
                                            Informe
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!---------------------------------------->
                    </form>
                </div>
            </div>
        </div>

        <!---------------------------------------->
        <!----AREA DE ASIGNACION DE PERSONAL------>
        <!---------------------------------------->
        <h3>
            <i class="fa fa-edit icon-title">
                Asignacion de Personal
            </i>
        </h3>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <form role="form" class="form-horizontal" action="modules/7_orden_trabajos/proces.php?act=insert_per" method="POST">
                        <!---------------------------------------->
                        <div class="box-body">
                            <!---------------------------------------->
                            <div class="form-group">
                                <div class="col-sm-2">
                                    <input type="hidden" class="form-control" name="ord_cod" value="<?php echo $ord_cod; ?>" readonly>
                                </div>
                                <label class="col-sm-1 control-label">Fecha</label>
                                <div class="col-sm-2">
                                    <input type="text" class="form-control date-picker" data-date-format="dd-mm-yyyy" name="asi_fec" autocomplete="off" 
                                    value="<?php echo date("y-m-d"); ?>" readonly>
                                </div>
                            </div>
                            <!---------------------------------------->
                            
                            <div class="form_group">
                                <table id="dataTables1" class="table table-bordered table-striped table-hover">
                                    <!------------------------------------------->
                                    <thead>
                                        <tr>
                                            <th class="center">Cod</th>
                                            <th class="center">Fecha</th>
                                            <th class="center">Funcionarios</th>
                                            <th class="center">Accion</th>
                                        </tr>
                                    </thead>
                                    <!------------------------------------------->
                                    <tbody>

                                    <?php 
                                $nro=1;
                                
                                $query = mysqli_query($mysqli, "SELECT * FROM v_funcionarios vf, asignacion_personal ap, orden_trabajos ot 
                                                                WHERE ap.ord_cod=$ord_cod AND ap.ord_cod = ot.ord_cod AND vf.fun_cod = ap.fun_cod")
                                                   or die('Error: '.mysqli_error($mysqli));
                                

                                
                                while($data = mysqli_fetch_assoc($query)){
                                    $fun_cod = $data ['fun_cod'];
                                    $asi_fec = $data ['asi_fec'];
                                    $fun_nom_ape = $data ['fun_nom_ape'];

                                    echo "<tr>
                                            <td class='center' width='40'>$fun_cod</td>
                                            <td class='center'>$asi_fec</td>
                                            <td class='center'>$fun_nom_ape</td>
                                            <td>
                                            <a data-toggle='tooltip' data-placement='top' title='Eliminar datos' class='btn btn-danger btn-sm'
                                                href='modules/7_orden_trabajos/proces.php?act=delete_asig&fun_cod=$fun_cod&ord_cod=$ord_cod'
                                                onclick='return confirm(¿Estas seguro/a de eliminar a $fun_nom_ape)'>
                                                <i class='glyphicon glyphicon-trash'></i>
                                            </a>
                                            </td>
                                        </tr>";
                                }
                            ?>

                                    </tbody>
                                </div>
                            </div>
                        
                            <!---------------------------------------->
                            <div class="form_group">
                                <label class="col-sm-2 control-label">Mecanicos</label>
                                <div class="col-sm-2">
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal_a">
                                        <span class="glyphicon glyphicon-plus">Agregar</span>
                                    </button>
                                </div>
                            </div>
                            

                            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
                            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
                            <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.2/js/select2.min.js"></script>

                            <!--------------------------------------------->
                            <script>
                                $(document).ready(function(){
                                load_(1);  
                                });

                                function load_(page){
                                    var y = $("#y").val();
                                    var parametros={"action":"ajax","page":page,"y":y};
                                    $("#loader").fadeIn('slow');
                                    $.ajax({
                                        url:'./ajax/mecanicos/mecanicos.php',//vehiculos_productos_pedidos
                                        data: parametros,
                                        beforeSend: function(objeto){
                                            $('#loader').html('<img src="./images/ajax-loader.gif"> Cargando...');
                                        },
                                        success:function(data){
                                            $(".outer_div_a").html(data).fadeIn('slow');
                                            $('#loader').html('');
                                        }
                                    })

                                }
                            </script>

                            <!--------------------------------------------->
                            <script>
                                function agregar_(id){

                                var parametros={"fun_cod":id};
                                $.ajax({
                                    type: "POST",
                                    url: "./ajax/mecanicos/agregar_mecanicos.php",//agregar_veh
                                    data: parametros,
                                    beforeSend: function(objeto){
                                        $("#resultados_a").html("Mensaje: Cargando...");
                                    },
                                    success: function(datos){
                                        $("#resultados_a").html(datos);
                                    }
                                });
                                }
                                function eliminar_(id){
                                    $.ajax({
                                        type: "GET",
                                        url: "./ajax/mecanicos/agregar_mecanicos.php",
                                        data: "fun_cod="+id,
                                        beforeSend: function(objeto){
                                        $("#resultados_a").html("Mensaje: Cargando...");
                                    },
                                    success: function(datos){
                                        $("#resultados_a").html(datos);
                                    }
                                    });
                                }
                            </script>


                            <!--------------------------------------------->                  
                            <div class="modal fade bs-example-modal-lg" id="myModal_a" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <h4 class="modal-title" id="myModallabel">Buscar Mecanicos</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form class="form-horizontal">
                                                    <div class="form-group">
                                                        <div class="col-sm-6">
                                                            <input type="text" class="form-control" id="y" placeholder="Buscar Mecanicos" onkeyup="load_(1)">
                                                        </div>
                                                        <button type="button" class="btn btn-default" onclick="load_(1)">
                                                            <span class="glyphicon glyphicon-search"></span>
                                                            Buscar
                                                        </button>
                                                    </div>                            
                                                </form>
                                                <div id="loader" style="position:absolute; text-align:center; top:55px; width:100%; display:none;"></div>
                                                <div class="outer_div_a"></div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">
                                                    Cerrar
                                                </button>
                                            </div>                                
                                        </div>
                                    </div>                                      
                                </div>
                            
                            <!---------------------------------------->
                            <div id="resultados_a" class="col-md-9"></div>
                            <!---------------------------------------->
                            <div class="box-footer">
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-12">
                                            <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                                            <a href="?module=orden_trabajos" class="btn btn-default btn-reset">Cancelar</a>
                                        </div>
                                    </div>
                                </div>
                                <!---------------------------------------->
                            </div>
                        </div>
                        <!---------------------------------------->
                    </form>
                </div>
            </div>
        </div>
    </section>  
<?php } ?>


