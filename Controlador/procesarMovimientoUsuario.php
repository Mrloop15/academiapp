<!DOCTYPE html>
<html>
<head>
    <?php
<<<<<<< HEAD
    /*include '../Controlador/seguridadLogin.php';*/
=======
    include '../Controlador/seguridadLogin.php';
>>>>>>> ed5bedc7bcd680e5510cd0f769629a92ebdad600
    ?>
	<meta charset="utf-8">
	<title>Proyecto EPA</title>
    <link rel="stylesheet" href="../css/menu.css" type="text/css">
    <link rel="stylesheet" href="../css/formularios.css" type="text/css">
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
            if(isset($_POST['enviarRegUsu'])){
                //Importamos el archivo php de la clase Alumnos
                include '../Modelo/usuarios.php';
                //Generamos una instancia de la clase Alumnos
                $usuario = new Usuario();
                //Registramos datos en el objeto
<<<<<<< HEAD
                $usuario->setNombre($_POST['nombre']);
                $usuario->setApellidos($_POST['apellidos']);
                $usuario->setCorreoElectronico($_POST['correoelectronico']);
                $usuario->setUserName($_POST['username']);
                $usuario->setContrasena($_POST['contrasena']);
=======
                $usuario->setCuenta($_POST['cuenta']);
                $usuario->setContrasena($_POST['contrasena']);
                $usuario->setNombre($_POST['nombre']);
                $usuario->setApellidos($_POST['apellidos']);
                $usuario->setEstatus($_POST['estatus']);
>>>>>>> ed5bedc7bcd680e5510cd0f769629a92ebdad600
                //Llamada al método para registrar valores
                $usuario->registrarUsuario();
                //Mensaje informativo
                echo '<script>alert("Usuario '.$usuario->getCuenta().' registrado.");</script>';
                //Dirigir a la página principal
<<<<<<< HEAD
                echo '<script>window.location.replace("Proyecto_final/Login/index.php");</script>';
=======
                echo '<script>window.location.replace("../Formularios/frmUsuariosRegistro.php");</script>';
>>>>>>> ed5bedc7bcd680e5510cd0f769629a92ebdad600
            }//enviarRegAlum
            
        //Efectuar la operación ACTUALIZAR
            if(isset($_POST['enviarActAlum'])){
                //Importamos el archivo php de la clase Alumnos
                include '../Modelo/alumnos.php';
                //Generamos una instancia de la clase Alumnos
                $alum = new Usuario();
                //Cambiar valores para actualizar
                $alum->setMatricula($_POST['matricula']);
                $alum->setNombre($_POST['nombre']);
                $alum->setApellidos($_POST['apellidos']);
                $alum->setPromedio($_POST['promedio']);
                //Llamada al método para actualizar valores
                $alum->actualizaAlumno();
                //Mensaje informativo
                echo '<script>alert("Actualizados datos del Alumno.");</script>';
                //Dirigir a la página principal
                echo '<script>window.location.replace("../Formularios/frmAlumnosBusqueda.php");</script>';
            }//if-enviarActAlum
        
        //Efectuar la operación BUSCAR
            if(isset($_POST['enviarConsultaAlum'])){
                    //Importamos el archivo php de la clase Alumnos
                    include '../Modelo/alumnos.php';
                    //Generamos una instancia de la clase Alumnos
                    $alum = new Usuario();
                    //Cambiar valores para actualizar
                    $alum->setMatricula($_POST['matricula']);
                    //Llamada al método para buscar valores
                    $datos = $alum->consultaAlumno();
                    //Obtener el registro de la busqueda
                    $registro = mysqli_fetch_array($datos);
                    if($registro['nombre']!=''){
                        //Mostrar los datos obtenidos
                    ?>
                    <h1>Busqueda de alumno</h1>
                    <form method="post" onsubmit="return confirm('¿Actualizar datos?');" action="../Controlador/procesaMovimiento.php">
                    <div class="formleyenda"><label>Matrícula:</label></div>
                    <input id="matricula" type="number" name="matricula" value="<?php echo $registro['matricula']?>">
                    <div class="formleyenda"><label>Nombre:</label></div>
                    <input id="nombre" type="text" name="nombre" value="<?php echo $registro['nombre']?>">
                    <div class="formleyenda"><label>Apellidos:</label></div>
                    <input id="apellidos" type="text" name="apellidos" value="<?php echo $registro['apellidos']?>">
                    <div class="formleyenda"><label>Promedio:</label></div>
                    <input id="promedio" type="number" name="promedio" value="<?php echo $registro['promedio']?>">
                    <div>
                        <button id="enviarActAlum" name="enviarActAlum" type="submit">Actualizar</button>
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
        
        //Efectuar la operación ELIMINAR
            if(isset($_GET['matricula'])){
                //Importamos el archivo php de la clase Alumnos
                include '../Modelo/alumnos.php';
                //Generamos una instancia de la clase Alumnos
                $alum = new Alumno();
                //Cambiar valores para actualizar
                $alum->setMatricula($_GET['matricula']);
                //Llamada al método para actualizar valores
                $alum->borrarAlumno();
                //Mensaje informativo
                echo '<script>confirm("Alumno deshabilitado.");</script>';
                //Dirigir a la página principal
                echo '<script>window.location.replace("http://localhost/PROYECTO_EPA/Formularios/frmAlumnosConsultas.php");</script>';
            }
        ?>
    </section>
</body>
</html>