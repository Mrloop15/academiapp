<?php

session_start();
print_r($_POST);
//print_r($_POST);
//variables que pasamos del formulario de Login.php
$UserName=$_POST['usuario'];
$password=$_POST['contrasena'];


/*echo "Se reciben los siguientes datos: <br>";
echo "Usuario recibido: ".$UserName."<br>";
echo "Contraseña recibida: ".$password."<br>"; */
//echo "Se reciben los siguientes datos: <br>";
//echo "Usuario recibido: ".$usuario."<br>";
//echo "Contraseña recibida: ".$password."<br>";
//Validar si están vacios
/*if($UserName=='' || $password==''){
    //Dirigir a la página principal
    echo '<script>window.location.replace("../Login/index.php");</script>';
}else {*/
    try{
        include_once '../Modelo/usuarios.php';
        $usu = new Usuario();
        $usu->setUserName($_POST['usuario']);
        $usu->setContrasena($_POST['contrasena']);
        $datos = $usu->buscarUsuario();
        //Obtener el registro de la busqueda
        $registro = mysqli_fetch_array($datos);
        //Validar si los datos de la BD son vacios
        /*if($registro['UserName']=='' || $registro['password']==''){
            //echo "Verdadero. <br>";
            echo '<script>alert("Escriba usuario y contraseña válidos. Intente de nuevo.")</script>';
            echo '<script>location.href="../Login/index.php"</script>';
        }*/
        //else{
            //Valida contraseña
            if($password == $registro['Contrasena']) {
                $_SESSION['valido']=1;
                    
                echo '<script>location.href="../inicio/principal.php"</script>';

            }else{
                echo '<script>alert("El usuario o contraseña son incorrectos. Intente de nuevo.")</script>';
                echo '<script>location.href="../Login/index.php"</script>';
            }
        //}//else


    }catch(Exception $ex){
        echo 'Error: '.$ex->getMessage();
    }

//}//validar