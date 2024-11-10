<!DOCTYPE html>
<html>
<head>
    <?php
    include '../Controlador/seguridadLogin.php';
    ?>
	<meta charset="utf-8">
	<title>Procesar Movimiento Notas</title>
</head>
<body>
    <header>
        <?php
        //Instrucciones para ver errores en navegador
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);
        ?>
    </header>
    <!-- Separación del menu con el resto de la página-->
    <div style="clear:both;"></div>
    <section>
        <?php
            //Efectuar la operación REGISTRAR
            if(isset($_POST['enviarNota'])){
                //Importamos el archivo php de la clase Alumnos
                include '../Modelo/notas.php';
                //Generamos una instancia de la clase Alumnos
                $nota = new Notas();
                //Registramos datos en el objeto
                $nota->setTitulo($_POST['Titulo']);
                $nota->setNota($_POST['Nota']);
                //Llamada al método para registrar valores
                $nota->registrarNotas();
                //Mensaje informativo
                echo '<script>alert("Nota '.$nota->getTitulo().' registrada.");</script>';
                //Dirigir a la página principal
                echo '<script>window.location.replace("../inicio/principal.php");</script>';
            }//enviarRegAlum