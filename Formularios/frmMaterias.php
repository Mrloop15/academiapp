<!DOCTYPE html>
<html lang="es">

<head>

  <style>
  body#formCalendario>main>div>div.container {
    margin-top: inherit;
    max-width: 800px;
    border-radius: 2rem;

  }

  .containerMenuCalendario {
    display: flex;
    justify-content: start;
    align-items: center;
  }

  .containerMenuCalendario div {
    font-size: 16px;
    /* Tamaño de fuente inicial */
    transition: all 0.6s ease;
    /* Transición suave */
  }

  .containerMenuCalendario div:hover {
    font-size: 20px;
    /* Tamaño de fuente aumentado */
    transform: scale(1.1);
    /* Aumenta el tamaño del div */
    color: white;
  }

  .containerMenuCalendario div a:hover {
    font-size: 20px;
    /* Tamaño de fuente aumentado */
    transform: scale(1.1);
    /* Aumenta el tamaño del div */
    color: white;
  }

  div#containerMenuCalendario {
    display: flex;
    flex-direction: row;
    margin-left: 19rem;

    div {
      margin-right: 10px;
      padding: 1rem;
      background: #f7b2ff;
      border: 1px #dee2e6 solid;
      border-radius: 20px 20px 0px 0px;

      a {
        text-decoration: inherit;
        color: #358b64;
        font-size: large;
        font-style: italic;
        font-weight: bold;
      }

      a:hover {
        color: white;
      }

    }

  }
  </style>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../inicio/principal.css">
  <link rel="stylesheet" href="../css/calendario.css">
  <link rel="stylesheet" href="../Formularios/custom.css">
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
  <title>Materias</title>
</head>

<body id="formCalendario" style="overflow:scroll; height: 70rem; background: #F5F5F5">
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
          <a href="../Formularios/frmMaterias.php">Agregar</a>
        </div>
        <div id="buscar">
          <a href="../Formularios/frmMateriasBuscar.php">Materias</a>
        </div>
        <div id="eliminar">
          <a href="">Eliminar</a>
        </div>
      </div>
      <div class="container">
        <h2>Registro materias</h2>
        <form action="http://localhost/Proyecto_final/academiapp/Controlador/procesarMovimientoMaterias.php"
          method="POST">
          <div class="form-group">
            <label for="nombre">Nombre de la clase:</label><br>
            <input type="text" id="NombreMateria" name="NombreMateria" required style="border-radius: 20px;">
          </div>

          <div class="form-group">
            <label for="fecha">Fecha de inicio:</label><br>
            <input type="date" id="FechaInicio" name="FechaInicio" required style="border-radius: 20px;">
          </div>

          <div class="form-group">
            <label for="fecha">Fecha de fin:</label><br>
            <input type="date" id="FechaFin" name="FechaFin" required style="border-radius: 20px;">
          </div>

          <div class="form-group">
            <label for="hora">Hora inicio de clase:</label><br>
            <input type="time" id="HoraClase" name="HoraClase" required style="border-radius: 20px;">
          </div>

          <div class="form-group">
            <label for="descripcion">Descripción de la clase:</label><br>
            <textarea id="Descripcion" name="Descripcion" rows="4" cols="50" required
              style="border-radius: 20px;"></textarea>
          </div>

          <div class="form-group">
            <label for="organizador">Maestro:</label><br>
            <input type="text" id="Profesor" name="Profesor" required style="border-radius: 20px;">
          </div>
          <div style="margin-top: 20px; display: flex; justify-content: center;">
            <button type="submit" id="RegMat" name="RegMat">Registrar</button>
          </div>
          <!-- <input type="submit" value="Registrar materia nueva"> -->
        </form>


      </div>
  </main>
  <div class="footer">
    <footer style="padding: 15px; background-color: #a901f1; text-align: center; font-size: larger;">
      <p style=" color: white;">&copy;Todo el que lea el footer es joto xd</p>
    </footer>
  </div>
</body>

</html>