<?php
//Comprueba que exista una sesion con los datos correctos
//Inicio la sesión
session_start();
//COMPRUEBA QUE EL USUARIO ESTA AUTENTIFICADO
if ($_SESSION['valido'] != '1') {
    //si existe, envio a la página principal
    echo '<script>alert("Falta autenticar usuario.")</script>';
    echo '<script>location.href="../inicio/principal.php"</script>';
    //además salgo de este script
    exit();
}
?>

