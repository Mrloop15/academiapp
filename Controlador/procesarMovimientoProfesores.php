<!DOCTYPE html>
<html>
<head>
    <?php
    include '../Controlador/seguridadLogin.php';
    ?>
	<meta charset="utf-8">
    <link rel="stylesheet" href="../css/calendario.css">
    <link rel="stylesheet" href="../inicio/principal.css">
    <link rel="stylesheet" href="../css/frm.css">
	<title>Procesar Movimiento Usuario</title>
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
            if(isset($_POST['RegProf'])){
                //Importamos el archivo php de la clase Alumnos
                include '../Modelo/profesores.php';
                //Generamos una instancia de la clase Alumnos
                $profesor = new Profesores();
                //Registramos datos en el objeto
                $profesor->setNombre($_POST['Nombre']);
                $profesor->setApellido($_POST['Apellido']);
                $profesor->setMateria($_POST['Materia']);
                $profesor->setTelefono($_POST['Telefono']);
                $profesor->setCorreo($_POST['Correo']);
                $profesor->setHoraDeAtencion($_POST['HoraDeAtencion']);
                //Llamada al método para registrar valores
                $profesor->registrarProfesor();
                //Mensaje informativo
                echo '<script>alert("Profesor '.$profesor->getNombre().' registrado.");</script>';
                //Dirigir a la página principal
                echo '<script>window.location.replace("../inicio/principal.php");</script>';
            }//enviarRegAlum

             //Efectuar la operación ACTUALIZAR
             if(isset($_POST['enviarActProf'])){
                //Importamos el archivo php de la clase Alumnos
                include '../Modelo/profesores.php';
                //Generamos una instancia de la clase Alumnos
                $profesor = new Profesores();
                //Cambiar valores para actualizar
                $profesor->setNombre($_POST['Nombre']);
                $profesor->setApellido($_POST['Apellido']);
                $profesor->setMateria($_POST['Materia']);
                $profesor->setTelefono($_POST['Telefono']);
                $profesor->setCorreo($_POST['Correo']);
                $profesor->setHoraDeAtencion($_POST['HoraDeAtencion']);
                //Llamada al método para actualizar valores
                $profesor->actualizaProfesor();
                //Mensaje informativo
                echo '<script>alert("Actualizados datos del Profesor.");</script>';
                //Dirigir a la página principal
                echo '<script>window.location.replace("../Formularios/frmBuscarProfesores.php");</script>';
            }//if-enviarActAlum
        
        //Efectuar la operación BUSCAR
            if(isset($_POST['BuscarProf'])){
                    //Importamos el archivo php de la clase Alumnos
                    include '../Modelo/profesores.php';
                    //Generamos una instancia de la clase Alumnos
                    $profesor = new Profesores();
                    //Cambiar valores para actualizar
                    $profesor->setNombre($_POST['Nombre']);
                    //Llamada al método para buscar valores
                    $datos = $profesor->BuscarProfesores();
                    //Obtener el registro de la busqueda
                    $registro = mysqli_fetch_array($datos);
                    if($registro['Nombre']!=''){
                        //Mostrar los datos obtenidos
                    ?>
                    <header>
                    <?php
                    include '../menu.php';
                    $menu = new menuPrincipal();
                    $menu ->barraMenu();
                    ?>
                    </header>
                    <main class="contenido">
                    <div class="principal">
    <div class="containerMenuCalendario" id="containerMenuCalendario">
      <div id="crear" >
        <a href="http://localhost/Proyecto_final/academiapp/Formularios/frmProfesores.php">Agregar</a>
      </div>
      <div id="buscar">
        <a href="frmBuscarProfesores.php">Buscar</a>
      </div>
      <div  id="eliminar"> 
        <a href="">Eliminar</a>
      </div>
    </div>
  <div class="container">
                    <h1>Busqueda de Profesores</h1>
                    <form method="post" onsubmit="return confirm('¿Actualizar datos?');" action="../Controlador/procesarMovimientoProfesores.php">
                    <div class="formleyenda"><label>Nombre:</label></div>
                    <input id="Nombre" type="text" name="Nombre" value="<?php echo $registro['Nombre']?>">
                    <div class="formleyenda"><label>Apellido:</label></div>
                    <input id="Apellido" type="text" name="Apellido" value="<?php echo $registro['Apellido']?>">
                    <div class="formleyenda"><label>Materia:</label></div>
                    <input id="Materia" type="text" name="Materia" value="<?php echo $registro['Materia']?>">
                    <div class="formleyenda"><label>Telefono:</label></div>
                    <input id="Telefono" type="text" name="Telefono" value="<?php echo $registro['Telefono']?>">
                    <div class="formleyenda"><label>Correo:</label></div>
                    <input id="Correo" type="text" name="Correo" value="<?php echo $registro['Correo']?>">
                    <div class="formleyenda"><label>Hora Atencion:</label></div>
                    <input id="HoraDeAtencion" type="text" name="HoraDeAtencion" value="<?php echo $registro['HoraDeAtencion']?>">
                    <div>
                        <button class="flip-card__btn" id="enviarActProf" name="enviarActProf" type="submit">ACTUALIZAR</button>
                        <button class="flip-card__btn" id="eliminarProf" name="eliminarProf" type="submit">ELIMINAR</button>
                    </div>
                    </form>
                    </main>
                    <?php
                    } else {
                        //Mensaje informativo
                        echo '<script>alert("Nombre inexistente.");</script>';
                        //Redirigir a página principal
                        echo '<script>window.location.replace("../Formularios/frmBuscarProfesores.php");</script>';
                    }//else
                }//if-enviarConsultaAlum
        
        //Efectuar la operación ELIMINAR
        if(isset($_POST['eliminarProf'])){
            //Importamos el archivo php de la clase Alumnos
            include '../Modelo/profesores.php';
            //Generamos una instancia de la clase Alumnos
            $profesor = new Profesores();
            //Cambiar valores para actualizar
            $profesor->setNombre($_POST['Nombre']);
            //Llamada al método para actualizar valores
            $profesor->borrarProfesor();
            //Mensaje informativo
            echo '<script>alert("Eliminados datos del Profesor.");</script>';
            //Dirigir a la página principal
            echo '<script>window.location.replace("../Formularios/frmBuscarProfesores.php");</script>';
        }//if-enviarActAlum
            ?>
    </section> 
</body>
</html>
   