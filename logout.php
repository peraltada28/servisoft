<?php 

session_start();

session_destroy();

//header('Location: index.php?alert=2');//esta en main alert 2

if($_GET['act']=='salir'){
    session_start();

    session_destroy();
    header('Location: index.php?alert=2');
}
?>