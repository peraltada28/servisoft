<?php 
require_once '../../config/database.php';

$action = (isset($_REQUEST['action']) && $_REQUEST['action'] !=NULL)?$_REQUEST['action']:'';
if($action == 'ajax'){
    $x = mysqli_real_escape_string($mysqli,(strip_tags($_REQUEST['y'],ENT_QUOTES)));
    $aColumns = array('fun_cod', 'fun_nom_ape', 'fun_ci', 'fun_tel', 'fun_niv');
    $sTable = " v_funcionarios ";
    $estado = " WHERE fun_niv = 'MECANICO' ";
    $sWhere = " ";
    if($_GET['y'] != ""){
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
                <tr style="background-color:#676767">
                    <th>Código</th>
                    <th>Nombre y Apellido</th>
                    <th>C.I.</th>
                    <th>Telefono</th>
                    <th>Cargo</th>
                    <th style="width:36px">Seleccionar</th>
                </tr>
                <?php 
                while ($row=mysqli_fetch_array($query)){
                    $fun_cod=$row['fun_cod'];
                    $fun_nom_ape=$row['fun_nom_ape'];
                    $fun_ci=$row['fun_ci'];
                    $fun_tel=$row['fun_tel'];
                    $fun_niv=$row['fun_niv'];

                    ?>
                    <tr>
                        <td style="width:20px"><?php echo $fun_cod; ?></td>
                        <td><?php echo $fun_nom_ape ; ?></td>
                        <td><?php echo $fun_ci; ?></td>
                        <td><?php echo $fun_tel; ?></td>
                        <td><?php echo $fun_niv; ?></td>
                        
                        <td>
                            <span class="pull-right">
                                <a href="#" onclick="agregar_('<?php echo $fun_cod; ?>')">
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