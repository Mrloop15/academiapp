<!DOCTYPE html>
<html lang="es">

<head>
  <?php
  include '../Controlador/seguridadLogin.php';
  ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="principal.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
    integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
    integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
  </script>
  <title>AcademiApp</title>
</head>

<body class="cuerpo">

  <header>
    <?php
  //llamada al menu de navegacion
  include '../menu.php';
  $menu = new menuPrincipal();
  $menu ->barraMenu();
  ?>
  </header>

  <main class="contenido">

    <div class="principal">
      <section>
        <!--tabla de consulta-->
        <div style="overflow-x: auto;">
          <h1 style="text-align:center">Listado de Profesores</h1>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>ID Profesor</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Materia</th>
                <th>Telefono</th>
                <th>Correo</th>
                <th>Horario De Atencion</th>
              </tr>
            </thead>
            <tbody>
              <?php
                        include '../Modelo/profesores.php';
                        $profesor = new Profesores();
                        $datos = $profesor->consultarProfesores();
                    
                        while($fila = mysqli_fetch_array($datos)){
                            echo "<tr><td>".$fila['ProfesorID']."</td><td>".$fila['Nombre']."</td><td>".$fila['Apellido']."</td><td>".$fila['Materia']."</td><td>".$fila['Telefono']."</td><td>".$fila['Correo']."</td><td>".$fila['HoraDeAtencion']."</td>";
                        }//while
                    ?>
            </tbody>
          </table>

          <h2 style="text-align:center">Listado Tareas</h2>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>ID Tarea</th>
                <th>Titulo</th>
                <th>Descripcion</th>
                <th>Fecha De Entrega</th>
              </tr>
            </thead>
            <tbody>
              <?php
                        include '../Modelo/tareas.php';
                        $tareas = new Tareas();
                        $datos = $tareas->consultarTareas();
                    
                        while($fila = mysqli_fetch_array($datos)){
                            echo "<tr><td>".$fila['TareaID']."</td><td>".$fila['Titulo']."</td><td>".$fila['Descripcion']."</td><td>".$fila['FechaEntrega']."</td>";
                        }//while
                    ?>
            </tbody>
          </table>

          <h2 style="text-align:center">Listado Eventos</h2>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>ID Evento</th>
                <th>Titulo</th>
                <th>Fecha De Inicio</th>
                <th>Hora De Inicio</th>
                <th>Descripcion</th>
                <th>Lugar</th>
                <th>Organizador</th>
              </tr>
            </thead>
            <tbody>
              <?php
                        include '../Modelo/eventos.php';
                        $evento = new Eventos();
                        $datos = $evento->consultarEventos();
                    
                        while($fila = mysqli_fetch_array($datos)){
                            echo "<tr><td>".$fila['EventoID']."</td><td>".$fila['Titulo']."</td><td>".$fila['FechaInicio']."</td><td>".$fila['HoraEvento']."</td><td>".$fila['Descripcion']."</td><td>".$fila['Lugar']."</td><td>".$fila['Organizador']."</td>";
                        }//while
                    ?>
            </tbody>
          </table>

          <h2 style="text-align:center">Listado Notas</h2>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Nota ID</th>
                <th>Titulo</th>
                <th>Nota</th>
              </tr>
            </thead>
            <tbody>
              <?php
                        include '../Modelo/notas.php';
                        $nota = new Notas();
                        $datos = $nota->consultarNotas();
                    
                        while($fila = mysqli_fetch_array($datos)){
                            echo "<tr><td>".$fila['NotaID']."</td><td>".$fila['Titulo']."</td><td>".$fila['Nota']."</td>";
                        }//while
                    ?>
            </tbody>
          </table>

          <h2 style="text-align:center">Listado Materias</h2>
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Materia ID</th>
                <th>Nombre Materia</th>
                <th>Fecha Inicio</th>
                <th>Fecha Fin</th>
                <th>Hora Inicio</th>
                <th>Descripcion</th>
                <th>Profesor</th>
              </tr>
            </thead>
            <tbody>
              <?php
                        include '../Modelo/materias.php';
                        $materia = new Materias();
                        $datos = $materia->consultarMaterias();
                    
                        while($fila = mysqli_fetch_array($datos)){
                            echo "<tr><td>".$fila['MateriaID']."</td><td>".$fila['NombreMateria']."</td><td>".$fila['FechaInicio']."</td><td>".$fila['FechaFin']."</td><td>".$fila['HoraClase']."</td><td>".$fila['Descripcion']."</td><td>".$fila['Profesor']."</td>";
                        }//while
                    ?>
            </tbody>
          </table>
        </div>
        <!--tabla de consulta-->
      </section>
    </div>

  </main>

  <footer style="padding: 15px; background-color: #a901f1; text-align: center; font-size: larger; margin-top:20%;">
    <p style=" color: white;">&copy;Derechos Recervados AcademiApp</p>
  </footer>

</body>

</html>