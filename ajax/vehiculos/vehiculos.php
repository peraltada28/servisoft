<?php 
require_once '../../config/database.php';

$action = (isset($_REQUEST['action']) && $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
    $x = mysqli_real_escape_string($mysqli,(strip_tags($_REQUEST['x'],ENT_QUOTES)));
    $aColumns = array('veh_cod', 'veh_chapa', 'veh_marca', 'veh_estado', 'cli_nom_ape', 'cli_ci');
    $sTable = " v_vehiculos ";
    $estado = " WHERE veh_estado = 'INGRESADO' ";
    $sWhere = " ";
    if($_GET['x'] != ""){
       $sWhere = " AND (";
       for ($i=0; $i<count($aColumns); $i++){
           $sWhere .=$aColumns[$i]." LIKE '%".$x."%' OR ";
       }
       $sWhere = substr_replace($sWhere, "", -3);
       $sWhere .= ') ';
    }
    //paginación
    include 'paginacion.php';
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page']))?$_REQUEST['page']:1;
    $per_page = 5;
    $adjacents = 4;
    $offset = ($page -1) * $per_page;

    $count_query = mysqli_query($mysqli, "SELECT count(*) AS numrows FROM $sTable $estado $sWhere");
    $row=mysqli_fetch_array($count_query);
    $numrows = $row['numrows'];
    $total_pages = ceil($numrows/$per_page);
    $reload='./index.php';

    $sql = "SELECT * FROM $sTable $estado $sWhere LIMIT $offset, $per_page";
    $query = mysqli_query($mysqli,$sql);

    if($numrows>0){ ?>
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover">
                <tr style="background-color:#8A8A8A">
                    <th>Código</th>
                    <th>Chapa</th>
                    <th>Marca</th>
                    <th>Estado</th>
                    <th>Cliente</th>
                    <th>C.I.</th>
                    <th style="width:36px;">Seleccionar</th>
                </tr>
                <?php 
                while ($row=mysqli_fetch_array($query)){
                    $veh_cod=$row['veh_cod'];
                    $veh_chapa=$row['veh_chapa'];
                    $veh_marca=$row['veh_marca'];
                    $veh_estado=$row['veh_estado'];
                    $cli_nom_ape=$row['cli_nom_ape'];
                    $cli_ci=$row['cli_ci'];

                    ?>
                    <tr>
                        <td><?php echo $veh_cod; ?></td>
                        <td><?php echo $veh_chapa; ?></td>
                        <td><?php echo $veh_marca; ?></td>
                        <td><?php echo $veh_estado; ?></td>
                        <td><?php echo $cli_nom_ape; ?></td>
                        <td><?php echo $cli_ci; ?></td>
                        
                        <td>
                            <span class="pull-right">
                                <a href="#" onclick="agregar('<?php echo $veh_cod; ?>')">
                                    <i class="glyphicon glyphicon-plus"></i>
                                </a>
                            </span>
                        </td>
                    </tr>    
                <?php 
                }
                ?>
                <tr>
                    <td colspan=5><span class="pull-right">
                    <?php echo paginate($reload, $page, $total_pages, $adjacents);?>
                    </span></td>
                </tr>
            </table>
        </div>
    <?php 
    }
}
?>