<?php 
    include "config/database.php";

    $query = mysqli_query($mysqli, "SELECT * FROM funcionarios WHERE fun_cod = $_SESSION[fun_cod]")
    or die('error'.mysqli_error($mysqli));

    $data = mysqli_fetch_assoc($query);
?>

<li class="dropdown user user-menu" >
    <a href="#" class="dropdown-toggle" data-toggle="dropdown" >
        
        <span class="hidden-xs">
            <?php echo $data['fun_nom']; ?><i style="margin-left:5px" class="fa fa-angle-down"></i>
        </span>
    </a>

    <ul class="dropdown-menu" style="background:#676767">
        <li class="user-header" style="background:#676767">
            
            <p>
                <?php echo $data['fun_nom']; ?>
                <small>
                    <?php echo $data['fun_niv']; ?>
                </small>
            </p>
        </li>
        <li class="user-footer" style="background:#fff">
        
            <div class="pull-left">
                
                <a data-toggle='tooltip' data-toggle="modal" data-placement='top' title='Salir' style='margin-rigth:5px' 
                    class='btn btn-danger btn-sm' 
                    href="logout?act=salir"  onclick="return confirm('Deseas salir del ARea Virtual?)'">
                    Salir    
                </a>
            </div>
        </li>
    </ul>
</li>

