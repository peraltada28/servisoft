<?php 
require_once '../../config/database.php';

$action = (isset($_REQUEST['action']) && $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
    $x = mysqli_real_escape_string($mysqli,(strip_tags($_REQUEST['x'],ENT_QUOTES)));
    $aColumns = array('ped_cod', 'ped_fec', 'ped_cond', 'ped_desc');
    $sTable = "pedidos_compra";
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
                    <th>Fecha</th>
                    <th>Condicion</th>
                    <th>Descripción</th>
                    <th style="width:36px;">Seleccionar</th>
                </tr>
                <?php 
                while ($row=mysqli_fetch_array($query)){
                    $ped_cod = $row['ped_cod'];
                    $ped_fec = $row['ped_fec'];
                    $ped_cond = $row['ped_cond'];
                    $ped_desc = $row['ped_desc'];
                    
                    ?>
                <tr>
                    <td><?php echo $ped_cod; ?></td>
                    <td><?php echo $ped_fec; ?></td>
                    <td><?php echo $ped_cond; ?></td>
                    <td><?php echo $ped_desc; ?></td>
                    <td>
                        <span class="pull-right">
                            <a href="#" onclick="agregar('<?php echo $ped_cod; ?>')">
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