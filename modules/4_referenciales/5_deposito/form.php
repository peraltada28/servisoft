<?php
    if($_GET['form']=='add'){ ?>
        <section class="content-header">
            <h1>
                <i class="fa fa-edit icon-title"></i>
                Agregar Departamento
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
                    <a href="?module=deposito">
                        Deposito
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
                        <form role="form" class="form-horizontal" action="modules/deposito/proces.php?act=insert" method="POST">
                            <div class="box-body">
                                <?php //METODO PARA GENERAR CODIGO
                                    $query_id =mysqli_query($mysqli, "SELECT MAX(cod) AS id FROM prueba")
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
                                    <label class="col-sm-2 control-label">Codigo</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="codigo" value="<?php echo $codigo; ?>" readonly>
                                    </div>
                                </div>
                                <!---------------------------------------------------->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Deposito</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="dep_descripcion" placeholder="Ingresa un deposito" required>
                                    </div>
                                </div>
                                <!---------------------------------------------------->
                                <!---------------------------------------------------->
                                <!---------------------------------------------------->
                                <!---------------------------------------------------->
                                <!---------------------------------------------------->
                                <!---------------------------------------------------->
                                <!---------------------------------------------------->
                                <!---------------------------------------------------->
                                <div class="form-group">
                                    <label class="col-sm-6 control-label"><b>Historia Médica</b> </label>
                                </div>

                                <!------------------------->

                                <div class="form-group">
                                    <label class="col-sm-4 control-label" name="1">¿Estas siendo sometido a algun tratamiento actualmente?</label>
                                    <div class="col-sm-1">
                                        <label><input type="radio" name="uno" value="No"> No &nbsp;&nbsp; </label>
                                        <label><input type="radio" name="uno" value="Si">Si</label> 
                                    </div>

                                    <label class="col-sm-1 control-label" name="1">¿Hace cuanto tiempo?</label>
                                    <div class="col-sm-1">
                                            <input type="text" class="form-control" name="uno_descrip" placeholder="" 
                                            autocomplete="off" required>
                                    </div>
                                </div>

                                <!------------------------->
                                <div class="form-group">
                                    <label class="col-sm-4 control-label" name="2">¿Estas haciendo uso algun tratamiento ?</label>
                                    <div class="col-sm-1">
                                        <label><input type="radio" name="dos" value="No"> No  &nbsp;&nbsp; </label>
                                        <label><input type="radio" name="dos" value="Si">Si</label> 
                                    </div>     
                                    <label class="col-sm-1 control-label" name="1">Cual es?</label>
                                    <div class="col-sm-1">
                                        <input type="text" class="form-control" name="dos_descrip" placeholder="" 
                                        autocomplete="off" required>
                                    </div>
                                </div>
                                <!------------------------->
                                <div class="form-group">
                                    <label class="col-sm-4 control-label" name="3">¿Fue afectado o es portador de algunas de las siguintes enfermedades?</label>
                                    <div class="col-sm-5">
                                        <input name="tres_1" value="Tuberculosis" type="checkbox" >Tuberculosis &nbsp; &nbsp;&nbsp;
                                        <input name="tres_2" value="Lepra" type="checkbox" >Lepra&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                        <input name="tres_3" value="Enf. Sexuales" type="checkbox" >Enf. Sexuales&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
                                        <input name="tres_4" value="Hepatitis" type="checkbox" >Hepatitis <br>
                                        <input name="tres_5" value="Malaria" type="checkbox" >Malaria&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      
                                        <input name="tres_6" value="S.I.D.A." type="checkbox" >S.I.D.A.&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
                                        <input name="tres_7" value="Enf. de Chagas" type="checkbox" >Enf. de Chagas&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;  &nbsp;
                                        <input name="tres_8" value="Fiebre Reumática" type="checkbox" >Fiebre Reumática <br>
                                        <input name="tres_9" value="Asma" type="checkbox" >Asma&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
                                        <input name="tres_10" value="Sinusitis" type="checkbox" >Sinusitis&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
                                        <input name="tres_11" value="Alergia" type="checkbox" >Alergia&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                        <input name="tres_12" value="Lesión de Hígado" type="checkbox" >Lesión de Hígado <br>
                                        <input name="tres_13" value="Ulceras" type="checkbox" >Ulceras&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
                                        <input name="tres_14" value="Enf. Cardiacas" type="checkbox" >Enf. Cardiacas&nbsp; &nbsp; &nbsp;&nbsp; 
                                        <input name="tres_15" value="Epilepsias" type="checkbox" >Epilepsias&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                        <input name="tres_16" value="Hipert. Arterial" type="checkbox" >Hipert. Arterial <br>
                                        <input name="tres_17" value="Anemia" type="checkbox" >Anemia&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
                                        <input name="tres_18" value="Hemofilia" type="checkbox" >Hemofilia&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
                                        <input name="tres_19" value="Disturbios Psiquicos" type="checkbox" >Disturbios Psiquicos &nbsp;
                                        <input name="tres_20" value="Convulsiones" type="checkbox" >Convulsiones <br>
                                        <input name="tres_21" value="Desmayos" type="checkbox" >Desmayos&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
                                        <input name="tres_22" value="Probl. de Coag." type="checkbox" >Probl. de Coag.&nbsp; &nbsp;
                                        <input name="tres_23" value="Diabetes" type="checkbox" >Diabetes&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
                                        <input name="tres_24" value="Otros" type="checkbox" >Otros
                                    </div>  
                                </div>
                                <!------------------------->
                                <div class="form-group">
                                    <label class="col-sm-4 control-label" name="1">¿Necesitó o necesita periodicamente de transfusión sanguínea o de derivados?</label>
                                    <div class="col-sm-1">
                                        <label><input type="radio" name="cuatro" value="No"> No &nbsp;&nbsp; </label>
                                        <label><input type="radio" name="cuatro" value="Si">Si</label> 
                                    </div>     
                                    <label class="col-sm-1 control-label" name="1">Motivo</label>
                                    <div class="col-sm-3">
                                            <input type="text" class="form-control" name="cuatro_descrip" placeholder="" 
                                            autocomplete="off" required>
                                    </div>
                                </div>
                                <!------------------------->
                                <div class="form-group">
                                    <label class="col-sm-4 control-label" name="1">¿Fue sometido a alguna cirugía? </label>
                                    <div class="col-sm-1">
                                        <label><input type="radio" name="cinco" value="No"> No &nbsp;&nbsp; </label>
                                        <label><input type="radio" name="cinco" value="Si">Si</label> 
                                    </div>     
                                    <label class="col-sm-1 control-label" name="1">¿Cuál es?</label>
                                    <div class="col-sm-3">
                                            <input type="text" class="form-control" name="cinco_descrip" placeholder="" 
                                            autocomplete="off" required>
                                    </div>
                                </div>
                                <!------------------------->
                                <div class="form-group">
                                    <label class="col-sm-4 control-label" name="1">¿Sangra mucho tiempo después de una extracción o corte?</label>
                                    <div class="col-sm-1">
                                        <label><input type="radio" name="seis" value="No"> No &nbsp;&nbsp; </label>
                                        <label><input type="radio" name="seis" value="Si"> Si</label> 
                                    </div>
                                </div>
                                <!------------------------->
                                <div class="form-group">
                                    <label class="col-sm-4 control-label" name="1">¿Fuma?</label>
                                    <div class="col-sm-1">
                                        <label><input type="radio" name="siete" value="No"> No &nbsp;&nbsp; </label>
                                        <label><input type="radio" name="siete" value="Si"> Si</label> 
                                    </div>
                                    <label class="col-sm-1 control-label" name="1">¿Hace cuanto tiempo?</label>
                                    <div class="col-sm-2">
                                            <input type="text" class="form-control" name="siete_des_1" placeholder="" 
                                            autocomplete="off" required>
                                    </div>
                                    <label class="col-sm-1 control-label" name="1">Cantidad por día</label>
                                    <div class="col-sm-1">
                                            <input type="text" class="form-control" name="siete_des_2" placeholder="" 
                                            autocomplete="off" required>
                                    </div>
                                </div>
                                <!------------------------->
                                <div class="form-group">
                                    <label class="col-sm-4 control-label" name="1">¿Toma bebidas alcohólicas?</label>
                                    <div class="col-sm-1">
                                        <label><input type="radio" name="ocho" value="No"> No &nbsp;&nbsp; </label>
                                        <label><input type="radio" name="ocho" value="Si">Si</label> 
                                    </div>
                                    <label class="col-sm-1 control-label" name="1">¿Hace cuanto tiempo?</label>
                                    <div class="col-sm-2">
                                            <input type="text" class="form-control" name="ocho_descrip" placeholder="" 
                                            autocomplete="off" required>
                                    </div>
                                </div>
                                <!------------------------->
                                <div class="form-group">
                                    <label class="col-sm-4 control-label" name="1">Declara estar embarazada</label>
                                    <div class="col-sm-1">
                                        <label><input type="radio" name="nueve" value="No"> No &nbsp;&nbsp; </label>
                                        <label><input type="radio" name="nueve" value="Si"> Si</label> 
                                    </div>
                                    <label class="col-sm-1 control-label" name="1">¿Hace cuanto tiempo?</label>
                                    <div class="col-sm-2">
                                            <input type="text" class="form-control" name="nueve_descrip" placeholder="" 
                                            autocomplete="off" required>
                                    </div>
                                </div>
                                <!------------------------->
                                <div class="form-group">
                                    <label class="col-sm-4 control-label" name="1">¿Tolera la anestesia de uso odontológico?</label>
                                    <div class="col-sm-2">
                                        <label><input type="radio" name="diez" value="No"> No &nbsp;&nbsp; </label>
                                        <label><input type="radio" name="diez" value="Si">Si &nbsp; &nbsp; </label> 
                                        <label><input type="radio" name="diez" value="Nunca tomo"> Nunca tomó</label> 
                                    </div>
                                </div>
                                <!------------------------->
                                <div class="form-group">
                                    <label class="col-sm-4 control-label" name="1">¿Se hizo alguna vez el TEST DE ELISA?</label>
                                    <div class="col-sm-1">
                                        <label><input type="radio" name="once" value="No"> No &nbsp;&nbsp; </label>
                                        <label><input type="radio" name="once" value="Si"> Si</label> 
                                    </div>
                                    <label class="col-sm-1 control-label" name="1">¿Hace cuanto tiempo?</label>
                                    <div class="col-sm-2">
                                            <input type="text" class="form-control" name="once_descrip" placeholder="" 
                                            autocomplete="off" required>
                                    </div>
                                </div>
                <!------------------------------------------------------------------------->
                                <div class="box box-primary">
                                    <div class="box-body">
                                    </div>
                <!---------------------------------------------------------------->
                                <div class="form-group">
                                    <label class="col-sm-6 control-label"><b>Antecedentes Odontológicos</b> </label>
                                </div>
                                <!------------------------->
                                <div class="form-group">
                                <label class="col-sm-5 control-label" name="1">Fecha de su ultima consulta Odontológica: </label>
                                    <div class="col-sm-5">
                                        <label><input type="radio" name="doce" value="6 Meses"> 6 Meses &nbsp;&nbsp; </label>
                                        <label><input type="radio" name="doce" value="1 año">1 año &nbsp;&nbsp;</label> 
                                        <label><input type="radio" name="doce" value="2 Años">2 Años &nbsp;&nbsp;</label> 
                                        <label><input type="radio" name="doce" value="Más">Más</label> 
                                    </div>
                                </div>
                                <!------------------------->
                                <div class="form-group">
                                <label class="col-sm-5 control-label" name="1">La pérdida de su/s diente/s fue por: </label>
                                    <div class="col-sm-5">
                                        <label><input type="radio" name="trece" value="Caries"> Caries &nbsp;&nbsp; </label>
                                        <label><input type="radio" name="trece" value="Accidente">Accidente &nbsp;&nbsp;</label> 
                                        <label><input type="radio" name="trece" value="Movilidad">Movilidad</label> 
                                    </div>
                                </div>
                                <!------------------------->
                                <div class="form-group">
                                <label class="col-sm-5 control-label" name="1">No trato sus dientes por:</label>
                                    <div class="col-sm-5">
                                        <label><input type="radio" name="catorce" value="Falta de Tiempo">Falta de Tiempo &nbsp;&nbsp; </label>
                                        <label><input type="radio" name="catorce" value="Problemas económicos">Problemas económicos &nbsp;&nbsp;</label> 
                                        <label><input type="radio" name="catorce" value="Desinteres"> Desinteres &nbsp;&nbsp;</label> 
                                        <label><input type="radio" name="catorce" value="Otros">Otros</label> 
                                    </div>
                                </div>
                                <!------------------------->
                                <div class="form-group">
                                <label class="col-sm-5 control-label" name="1"> ¿Cuanto veces al dia se cepilla?</label>
                                    <div class="col-sm-5">
                                        <label><input type="radio" name="quince" value="1 vez">1 vez &nbsp;&nbsp;</label>
                                        <label><input type="radio" name="quince" value="2 veces">2 veces &nbsp;&nbsp;</label> 
                                        <label><input type="radio" name="quince" value="3 veces">3 veces &nbsp;&nbsp;</label> 
                                        <label><input type="radio" name="quince" value="Más veces">Más veces &nbsp;&nbsp;</label> 
                                        <label><input type="radio" name="quince" value="No se cepilla">No se cepilla</label> 
                                    </div>
                                </div>
                                <!------------------------->
                                <div class="form-group">
                                    <label class="col-sm-5 control-label" name="1">¿Que elementos usa para su higiene dental?</label>
                                    <div class="col-sm-5">
                                        <label><input type="checkbox" name="dieciseis_1" value="Cepillo">Cepillo &nbsp;&nbsp;</label>
                                        <label><input type="checkbox" name="dieciseis_2" value="Hilo">Hilo &nbsp;&nbsp;</label> 
                                        <label><input type="checkbox" name="dieciseis_3" value="Enjuagues">Enjuagues &nbsp;&nbsp;</label> 
                                        <label><input type="checkbox" name="dieciseis_4" value="Otros">Otros</label> 
                                    </div>
                                </div>
                                <!------------------------->
                                <div class="box-footer">
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                                            <a href="?module=deposito" class="btn btn-default btn-reset">Cancelar</a>
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
            $query = mysqli_query($mysqli, "SELECT * FROM deposito WHERE cod_deposito = '$_GET[id]'")
                                            or die('Error '.mysqli_error($mysqli));
            
            $data = mysqli_fetch_assoc($query);

        } ?>

        <!----------------------MODIFICAR-------------------------->
        <section class="content-header">
            <h1>
                <i class="fa fa-edit icon-title"></i>
                Modificar Deposito
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
                    <a href="?module=deposito">
                        Deposito
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
                        <form role="form" class="form-horizontal" action="modules/deposito/proces.php?act=update" method="POST">
                            <div class="box-body">
                                <!---------------------------------------------------->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Codigo</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="codigo" value="<?php echo $data['cod_deposito']; ?>" readonly>
                                    </div>
                                </div>
                                <!---------------------------------------------------->
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">Departamento</label>
                                    <div class="col-sm-5">
                                        <input type="text" class="form-control" name="dep_descripcion" value="<?php echo $data['dep_descrip']; ?>" required>
                                    </div>
                                </div>
                                <!---------------------------------------------------->
                                <div class="box-footer">
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <input type="submit" class="btn btn-primary btn-submit" name="Guardar" value="Guardar">
                                            <a href="?module=deposito" class="btn btn-default btn-reset">Cancelar</a>
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
