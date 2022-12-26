<?php 

require_once "config/database.php";
$username = mysqli_real_escape_string($mysqli,stripslashes(strip_tags(htmlspecialchars(trim(strtoupper($_POST['username']))))));//index.php username
$password = md5(mysqli_real_escape_string($mysqli,stripslashes(strip_tags(htmlspecialchars(trim($_POST['password']))))));//index.php password

if(!ctype_alnum($username) OR !ctype_alnum($password)){
    header("Location: index.php?alert=1");
}else{

    $query = mysqli_query($mysqli, "SELECT * FROM funcionarios WHERE fun_usu ='$username' 
                                    AND fun_pass='$password' AND fun_est='ACTIVO'")
                                    or die('error'.mysqli_error($mysqli));
    $rows = mysqli_num_rows($query);

    if($rows > 0){
        $data = mysqli_fetch_assoc($query);

        session_start();
        $_SESSION['fun_cod'] = $data['fun_cod'];
        $_SESSION['fun_nom'] = $data['fun_nom'];
        $_SESSION['fun_pass'] = $data['fun_pass'];
        $_SESSION['fun_est'] = $data['fun_est'];
        $_SESSION['fun_niv'] = $data['fun_niv'];

        $query_ret = mysqli_query($mysqli, "UPDATE funcionarios SET fun_blo= 0 WHERE fun_cod = $data[fun_cod]")
                            or die('error'.mysqli_error($mysqli));

        //echo "Existe el usuario sea bienvenido";
        header("Location: main.php?module=start");


    }else{
        header("Location: index.php?alert=1");

        //consulta si existe el usuario en la sucursal
        $query_bloqueo = mysqli_query($mysqli, "SELECT * FROM funcionarios WHERE fun_usu ='$username'")
                                            or die('error'.mysqli_error($mysqli));
        if($query_bloqueo){
            $data_blo = mysqli_fetch_assoc($query_bloqueo);

            $fun_est = $data_blo ['fun_est'];
            $bloqueo = $data_blo ['fun_blo'];

            if ($usu_estado == 'BLOQUEADO' ){
                header("Location: index.php?alert=4");

            } else {
                $bloqueo +=1;
                $query_estado = mysqli_query($mysqli, "UPDATE funcionarios SET fun_blo = $bloqueo WHERE fun_usu ='$username'")
                                                    or die('error'.mysqli_error($mysqli));

                //volver a consultar el bloqueo
                $query_2 = mysqli_query($mysqli, "SELECT * FROM funcionarios WHERE fun_usu ='$username'")
                                                    or die('error 53: '.mysqli_error($mysqli));
                if(query_2){
                    $data_con = mysqli_fetch_assoc($query_2);
                    $bloqueo_consulta = $data_con['fun_blo'];

                    //consultar si el bloqueo esta en 3 para bloquear dicho usuario
                    if($bloqueo_consulta > 2){

                        $query_bloqueo = mysqli_query($mysqli, "UPDATE funcionarios SET fun_est = 'BLOQUEADO' WHERE fun_usu ='$username'")
                                                                        or die('error 64: '.mysqli_error($mysqli));
                        if($query_bloqueo){
                            header("Location: index.php?alert=4");
                        }
                    } else {
                        //si no existe el usuario, alerta 1
                        header("Location: index.php?alert=1");
                    }
                } else {
                    //si no existe el usuario, alerta 1
                    header("Location: index.php?alert=1");
                }
            }
        }
    }
}
?>