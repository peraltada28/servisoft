<?php 

require_once "config/database.php";
$username = mysqli_real_escape_string($mysqli,stripslashes(strip_tags(htmlspecialchars(trim(strtoupper($_POST['username']))))));//index.php username
$password = md5(mysqli_real_escape_string($mysqli,stripslashes(strip_tags(htmlspecialchars(trim($_POST['password']))))));//index.php password
$suc_cod = mysqli_real_escape_string($mysqli,stripslashes(strip_tags(htmlspecialchars(trim($_POST['suc_cod'])))));

if(!ctype_alnum($username) OR !ctype_alnum($password)){
    header("Location: index.php?alert=1");
}else{

    //consulta si existe el usuario en la sucursal
    $query_bloqueo = mysqli_query($mysqli, "SELECT * FROM v_usuarios WHERE usu_nombre ='$username'
                                                                        AND usu_estado='ACTIVO'
                                                                        AND usu_pass !='$password' 
                                                                        AND suc_cod = $suc_cod")
                                            or die('error'.mysqli_error($mysqli));
    $row_1 = mysqli_num_rows($query_bloqueo);

    if($row_1 > 0){//si exixte el usuario en la sucursal y esta activo e ingreso mal su contraseña
        $data = mysqli_fetch_assoc($query_bloqueo);

        $bloqueo = $data['bloqueo'];//capturar el bloqueo del usuario
        $usu_pass = $data['usu_pass'];


        if($bloqueo > 2){//si el bloqueo ya es 3 o mas, imprime usuario bloqueado
            header("Location: index.php?alert=4");

        } else {//si no, aumenta en 1 el bloqueo y lo actualiza mediante su usu_nombre
            $bloqueo +=1;
            $query_estado = mysqli_query($mysqli, "UPDATE usuario SET bloqueo='$bloqueo', usu_estado = 'BLOQUEADO' 
                                                    WHERE usu_nombre ='$username'")
                                    or die('error'.mysqli_error($mysqli));

            header("Location: index.php?alert=3");
        }

    } else{//si el acceso es correcto entonces capturar sus datos
        $query = mysqli_query($mysqli, "SELECT * FROM v_usuarios WHERE usu_nombre ='$username' 
                                    AND usu_pass='$password' AND usu_estado='ACTIVO' and suc_cod = $suc_cod")
                                    or die('error'.mysqli_error($mysqli));
        $rows = mysqli_num_rows($query);

        if($rows > 0){
            $data = mysqli_fetch_assoc($query);

            session_start();
            $_SESSION['usu_cod'] = $data['usu_cod'];
            $_SESSION['usu_nombre'] = $data['usu_nombre'];
            $_SESSION['usu_pass'] = $data['usu_pass'];
            $_SESSION['usu_estado'] = $data['usu_estado'];
            $_SESSION['usu_nivel'] = $data['usu_nivel'];
            $_SESSION['emp_cod'] = $data['emp_cod'];
            $_SESSION['emp_nom_ape'] = $data['emp_nom_ape'];
            $_SESSION['suc_cod'] = $data['suc_cod'];
            $_SESSION['suc_descri'] = $data['suc_descri'];
            $_SESSION['suc_direc'] = $data['suc_direc'];

            $query_estado = mysqli_query($mysqli, "UPDATE usuario SET bloqueo='0' WHERE usu_cod ='$usu_cod'")
                                or die('error'.mysqli_error($mysqli));

            //echo "Existe el usuario sea bienvenido";
            header("Location: main.php?module=start");


        }else{
            header("Location: index.php?alert=1");
        }
        
    }
}
?>