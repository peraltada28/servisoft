<?php 
    session_start();
    require "../../config/database.php";
    if(empty($_SESSION['fun_usu']) && empty($_SESSION['fun_pass'])){
        echo "<meta http-equiv='refresh' content='0; url=index.php?alert=3'>";
    }else{
        if(isset($_POST['Guardar'])){
            if(isset($_SESSION['fun_usu'])){
                $old_pass = md5($_POST['old_pass']);
                $new_pass = md5($_POST['new_pass']);
                $retype_pass = md5($_POST['retype_pass']);
                $id_user=$_SESSION['fun_cod'];

                if($old_pass == $new_pass){
                    header("Location: ../../main.php?module=password&alert=1");
                }else{
                    if($new_pass != $retype_pass ){
                        header("Location: ../../main.php?module=password&alert=2");
                    }else{
                        $query = mysqli_query($mysqli, "UPDATE funcionarios SET fun_pass = '$new_pass' WHERE fun_cod='$id_user'")
                            or die('error'.mysqli_error($mysqli));
                        if($query){
                            header("Location: ../../main.php?module=password&alert=3");
                        }
                    }
                }
            }
        }
    }
?>