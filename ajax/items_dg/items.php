<?php 
require_once '../../config/database.php';

$action = (isset($_REQUEST['action']) && $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
    $x = mysqli_real_escape_string($mysqli,(strip_tags($_REQUEST['x'],ENT_QUOTES)));
    $aColumns = array('ite_cod', 'ite_descri', 'ite_precio', 'tit_cod');
    $sTable = "items";
    $sWhere = "";
    if($_GET['x'] != ""){
       $sWhere = "WHERE (";
       for ($i=0; $i<count($aColumns); $i++){
           $sWhere .=$aColumns[$i]." LIKE '%".$x."%' OR ";
       }
       $sWhere = substr_replace($sWhere, "", -3);
       $sWhere .= ')';
    }
    //paginación
    include 'paginacion.php';
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
    $per_page = 5;
    $adjacents = 4;
    $offset = ($page -1) * $per_page;

    $count_query = mysqli_query($mysqli, "SELECT count(*) AS numrows FROM $sTable $sWhere");
    $row=mysqli_fetch_array($count_query);
    $numrows = $row['numrows'];
    $total_pages = ceil($numrows/$per_page);
    $reload='./index.php';

    $sql = "SELECT * FROM $sTable $sWhere LIMIT $offset, $per_page";
    $query = mysqli_query($mysqli,$sql);

    if($numrows>0){ ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <tr class="warning">
                    <th>Código</th>
                    <th>Tipo</th>
                    <th>Descripcion</th>
                    <th><span class="pull-right">Cantidad</span></th>
                    <th><span class="pull-right">Precio</span></th>
                    <th style="width:36px;">Seleccionar</th>
                </tr>
                <?php 
                while ($row=mysqli_fetch_array($query)){
                    $ite_cod=$row['ite_cod'];
                    $ite_descri=$row['ite_descri'];
                    $ite_precio=$row['ite_precio'];

                    $tit_cod=$row['tit_cod'];
                    $sql_tit = mysqli_query($mysqli, "SELECT tit_descrip FROM tipo_items WHERE tit_cod='$tit_cod'");
                    $rw_tit = mysqli_fetch_array($sql_tit);
                    $tit_descrip= $rw_tit['tit_descrip'];

                    ?>
                <tr>
                    <td><?php echo $ite_cod; ?></td>
                    <td><?php echo $tit_descrip; ?></td>
                    <td><?php echo $ite_descri; ?></td>
                    <td class="col-xs-1">
                        <div class="pull-right">
                            <input type="text" class="form-control" style="text-align:right" id="cantidad_<?php echo $ite_cod;?>" value="1">
                        </div>
                    </td>
                    <td class="col-xs-2">
                        <div class="pull-right">
                            <input type="text" class="form-control" style="text-align:right" id="precio_compra_<?php echo $ite_cod;?>" value="<?php echo $ite_precio; ?>">
                        </div>
                    </td>
                    <td>
                        <span class="pull-right">
                            <a href="#" onclick="agregar('<?php echo $ite_cod; ?>')">
                                <i class="glyphicon glyphicon-plus"></i>
                            </a>
                        </span>
                    </td>
                </tr>    
                <?php }
                ?>
                <tr>
                    <td colspan=5><span class="pull-right">
                    <?php echo paginate($reload, $page, $total_pages, $adjacents);?>
                    </span></td>
                </tr>
            </table>
        </div>
    <?php }
}
?>