<!DOCTYPE html>
<html>
<head>
    <?php
    include '../Controlador/seguridadLogin.php';
    ?>
	<meta charset="utf-8">
	<title>Procesar Movimiento Tareas</title>
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
            if(isset($_POST['enviarTarea'])){
                //Importamos el archivo php de la clase Alumnos
                include '../Modelo/tareas.php';
                //Generamos una instancia de la clase Alumnos
                $tarea = new Tareas();
                //Registramos datos en el objeto
                $tarea->setTitulo($_POST['Titulo']);
                $tarea->setNombreMateria($_POST['NombreMateria']);
                $tarea->setDescripcion($_POST['Descripcion']);
                $tarea->setFechaEntrega($_POST['FechaEntrega']);
                //Llamada al método para registrar valores
                $tarea->registrarTarea();
                //Mensaje informativo
                echo '<script>alert("Tarea '.$tarea->getTitulo().' registrado.");</script>';
                //Dirigir a la página principal
                echo '<script>window.location.replace("../inicio/principal.php");</script>';
            }//enviarRegAlum