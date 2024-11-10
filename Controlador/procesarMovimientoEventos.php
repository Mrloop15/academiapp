<!DOCTYPE html>
<html>
<head>
    <?php
    include '../Controlador/seguridadLogin.php';
    ?>
	<meta charset="utf-8">
	<title>Procesar Movimiento Eventos</title>
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
            if(isset($_POST['enviarEvento'])){
                //Importamos el archivo php de la clase Alumnos
                include '../Modelo/eventos.php';
                //Generamos una instancia de la clase Alumnos
                $evento = new Eventos();
                //Registramos datos en el objeto
                $evento->setTitulo($_POST['Titulo']);
                $evento->setFechaInicio($_POST['FechaInicio']);
                $evento->setHoraEvento($_POST['HoraEvento']);
                $evento->setDescripcion($_POST['Descripcion']);
                $evento->setLugar($_POST['Lugar']);
                $evento->setOrganizador($_POST['Organizador']);
                //Llamada al método para registrar valores
                $evento->registrarEvento();
                //Mensaje informativo
                echo '<script>alert("Evento '.$evento->getTitulo().' registrado.");</script>';
                //Dirigir a la página principal
                echo '<script>window.location.replace("../inicio/principal.php");</script>';
            }//enviarRegAlum

                  //Efectuar la operación BUSCAR
                  if(isset($_POST['buscarEvento'])){
                    //Importamos el archivo php de la clase Alumnos
                    include '../Modelo/eventos.php';
                    //Generamos una instancia de la clase Alumnos
                    $evento = new Eventos();
                    //Cambiar valores para actualizar
                    $evento->setTitulo($_POST['Titulo']);
                    //Llamada al método para buscar valores
                    $datos = $evento->consultarEventos();
                    //Obtener el registro de la busqueda
                    $registro = mysqli_fetch_array($datos);
                    if($registro['Titulo']!=''){
                        //Mostrar los datos obtenidos
                    ?>
                    <h1>Busqueda de evento</h1>
                    <form method="post" onsubmit="return confirm('¿Actualizar datos?');" action="../Controlador/procesaMovimiento.php">
                    <div class="formleyenda"><label>Matrícula:</label></div>
                    <input id="Titulo" type="text" name="Titulo" value="<?php echo $registro['Titulo']?>">
                    <div class="formleyenda"><label>Nombre:</label></div>
                    <input id="nombre" type="text" name="nombre" value="<?php echo $registro['nombre']?>">
                    <div class="formleyenda"><label>Apellidos:</label></div>
                    <input id="apellidos" type="text" name="apellidos" value="<?php echo $registro['apellidos']?>">
                    <div class="formleyenda"><label>Promedio:</label></div>
                    <input id="promedio" type="number" name="promedio" value="<?php echo $registro['promedio']?>">
                    <div>
                        <button id="enviarActAlum" name="" type="submit">Actualizar</button>
                    </div>
                    </form>
                    <?php
                    } else {
                        //Mensaje informativo
                        echo '<script>alert("Matricula inexistente.");</script>';
                        //Redirigir a página principal
                        echo '<script>window.location.replace("../Formularios/frmAlumnosBusqueda.php");</script>';
                    }//else
                }//if-enviarConsultaAlum