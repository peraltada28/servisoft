<?php 
require_once '../../config/database.php';

$action = (isset($_REQUEST['action']) && $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
    $x = mysqli_real_escape_string($mysqli,(strip_tags($_REQUEST['x'],ENT_QUOTES)));
    $aColumns = array('pro_cod', 'pro_desc', 'pro_puc', 'tpr_cod');
    $sTable = "productos";
    $sWhere = " ";
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
                    <th><span class="pull-right">Precio de ultima compra</span></th>
                    <th style="width:36px;">Seleccionar</th>
                </tr>
                <?php 
                while ($row=mysqli_fetch_array($query)){
                    $pro_cod=$row['pro_cod'];
                    $pro_desc=$row['pro_desc'];
                    $pro_puc=$row['pro_puc'];

                    $tpr_cod=$row['tpr_cod'];
                    $sql_tit = mysqli_query($mysqli, "SELECT tpr_desc FROM tipo_productos WHERE tpr_cod='$tpr_cod'");
                    $rw_tit = mysqli_fetch_array($sql_tit);
                    $tpr_desc= $rw_tit['tpr_desc'];

                    ?>
                <tr>
                    <td><?php echo $pro_cod; ?></td>
                    <td><?php echo $tpr_desc; ?></td>
                    <td><?php echo $pro_desc; ?></td>
                    <td class="col-xs-1">
                        <div class="pull-right">
                            <input type="text" class="form-control" style="text-align:right" id="cantidad_<?php echo $pro_cod;?>" value="1">
                        </div>
                    </td>
                    <td class="col-xs-2">
                        <div class="pull-right">
                            <input type="text" class="form-control" style="text-align:right" id="precio_compra_<?php echo $pro_cod;?>" value="<?php echo $pro_puc; ?>">
                        </div>
                    </td>
                    <td>
                        <span class="pull-right">
                            <a href="#" onclick="agregar('<?php echo $pro_cod; ?>')">
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