<!DOCTYPE html>
<html>

<head>
  <?php
    include '../Controlador/seguridadLogin.php';
    ?>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../inicio/principal.css">
  <link rel="stylesheet" href="../css/calendario.css">
  <link rel="stylesheet" href="../Login/index.php">
  <link rel="stylesheet" href="../css/frm.css">

  <link href="../Formularios/custom.css">
  <title>Procesar Movimiento Materias</title>
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
            if(isset($_POST['RegMat'])){
                //Importamos el archivo php de la clase Alumnos
                include '../Modelo/materias.php';
                //Generamos una instancia de la clase Alumnos
                $materia = new Materias();
                //Registramos datos en el objeto
                $materia->setMateriaID($_POST['MateriaID']);
                $materia->setNombreMateria($_POST['NombreMateria']);
                $materia->setFechaInicio($_POST['FechaInicio']);
                $materia->setFechaFin($_POST['FechaFin']);
                $materia->setHoraClase($_POST['HoraClase']);
                $materia->setDescripcion($_POST['Descripcion']);
                $materia->setProfesor($_POST['Profesor']);
                //Llamada al método para registrar valores
                $materia->registrarMateria();
                //Mensaje informativo
                echo '<script>alert("Materia '.$materia->getMateriaID().' registrada.");</script>';
                //Dirigir a la página principal
                echo '<script>window.location.replace("../inicio/principal.php");</script>';
            }//enviarRegAlum

            //Efectuar la operación ACTUALIZAR
            if(isset($_POST['enviarActMat'])){
              //Importamos el archivo php de la clase Alumnos
              include '../Modelo/materias.php';
              //Generamos una instancia de la clase Alumnos
              $materia = new Materias();
              //Cambiar valores para actualizar
              $materia->setMateriaID($_POST['MateriaID']);
              $materia->setNombreMateria($_POST['NombreMateria']);
              $materia->setFechaInicio($_POST['FechaInicio']);
              $materia->setFechaFin($_POST['FechaFin']);
              $materia->setHoraClase($_POST['HoraClase']);
              $materia->setDescripcion($_POST['Descripcion']);
              $materia->setProfesor($_POST['Profesor']);
              //Llamada al método para actualizar valores
              $materia->actualizaMateria();
              //Mensaje informativo
              echo '<script>alert("Actualizados datos de la Materia.");</script>';
              //Dirigir a la página principal
              echo '<script>window.location.replace("../Formularios/frmMateriasBuscar.php");</script>';
          }//if-enviarActAlum

          //Efectuar la operación BUSCAR
          if(isset($_POST['BuscarMat'])){
            //Importamos el archivo php de la clase Alumnos
            include '../Modelo/materias.php';
            //Generamos una instancia de la clase Alumnos
            $materia = new Materias();
            //Cambiar valores para actualizar
            $materia->setNombreMateria($_POST['NombreMateria']);
            //Llamada al método para buscar valores
            $datos = $materia->BuscarMaterias();
            //Obtener el registro de la busqueda
            $registro = mysqli_fetch_array($datos);
            if($registro['NombreMateria']!=''){
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
          <div id="crear">
            <a href="http://localhost/Proyecto_final/academiapp/Formularios/frmMaterias.php">Agregar</a>
          </div>
          <div id="buscar">
            <a href="frmMateriasBuscar.php">Buscar</a>
          </div>
          <div id="eliminar">
            <a href="">Eliminar</a>
          </div>
        </div>
        <div class="container">
          <h1>Busqueda de Materias</h1>
          <form method="post" onsubmit="return confirm('¿Actualizar datos?');"
            action="../Controlador/procesarMovimientoMaterias.php">
            <div class="formleyenda"><label>ID de la Materia:</label></div>
            <input id="MateriaID" type="text" name="MateriaID" value="<?php echo $registro['MateriaID']?>">
            <div class="formleyenda"><label>Nombre de la materia:</label></div>
            <input id="NombreMateria" type="text" name="NombreMateria" value="<?php echo $registro['NombreMateria']?>">
            <div class="formleyenda"><label>Fecha de inicio:</label></div>
            <input id="FechaInicio" type="text" name="FechaInicio" value="<?php echo $registro['FechaInicio']?>">
            <div class="formleyenda"><label>Fecha de fin:</label></div>
            <input id="FechaFin" type="text" name="FechaFin" value="<?php echo $registro['FechaFin']?>">
            <div class="formleyenda"><label>Hora de la clase:</label></div>
            <input id="HoraClase" type="text" name="HoraClase" value="<?php echo $registro['HoraClase']?>">
            <div class="formleyenda"><label>Descripcion:</label></div>
            <input id="Descripcion" type="text" name="Descripcion" value="<?php echo $registro['Descripcion']?>">
            <div class="formleyenda"><label>Profesor:</label></div>
            <input id="Profesor" type="text" name="Profesor" value="<?php echo $registro['Profesor']?>">

            <div>
              <button class="flip-card__btn" id="enviarActMat" name="enviarActMat" type="submit">ACTUALIZAR</button>
              <button class="flip-card__btn" id="eliminarMat" name="eliminarMat" type="submit">ELIMINAR</button>
            </div>
          </form>
    </main>
    <?php
            } else {
                //Mensaje informativo
                echo '<script>alert("Nombre inexistente.");</script>';
                //Redirigir a página principal
                echo '<script>window.location.replace("../Formularios/frmMateriasBuscar.php");</script>';
            }//else
        }//if-enviarConsultaAlum

        //Efectuar la operación ELIMINAR
        if(isset($_POST['eliminarMat'])){
          //Importamos el archivo php de la clase Alumnos
          include '../Modelo/materias.php';
          //Generamos una instancia de la clase Alumnos
          $materia = new Materias();
          //Cambiar valores para actualizar
          $materia->setNombreMateria($_POST['NombreMateria']);
          //Llamada al método para actualizar valores
          $materia->borrarMateria();
          //Mensaje informativo
          echo '<script>alert("Eliminados datos del Profesor.");</script>';
          //Dirigir a la página principal
          echo '<script>window.location.replace("../Formularios/frmMateriasBuscar.php");</script>';
      }//if-enviarActAlum