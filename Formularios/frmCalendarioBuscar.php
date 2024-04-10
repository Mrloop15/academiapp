<!DOCTYPE html>
<html lang="es">
<head>

<style>
   body#formCalendario > main > div > div.container{
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
    font-size: 16px; /* Tamaño de fuente inicial */
    transition: all 0.6s ease; /* Transición suave */
  }

  .containerMenuCalendario div:hover {
    font-size: 20px; /* Tamaño de fuente aumentado */
    transform: scale(1.1); /* Aumenta el tamaño del div */
    color: white;
  }
  
  .containerMenuCalendario div a:hover {
    font-size: 20px; /* Tamaño de fuente aumentado */
    transform: scale(1.1); /* Aumenta el tamaño del div */
    color: white;
  }

    div#containerMenuCalendario{
    display: flex;
    flex-direction: row;
    margin-left: 19rem;
    
    div{
    margin-right: 10px;
    padding: 1rem;
    background: #f7b2ff;
    border: 1px #dee2e6 solid;
    border-radius: 20px 20px 0px 0px;
    
      a{
      text-decoration: inherit;
      color: #358b64;
      font-size: large;
      font-style: italic;
      font-weight: bold;
      }

      a:hover{
        color: white;
      }
      
    }

    }
  </style>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/calendario.css">
    <link href="../Formularios/custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <title>Buscar evento</title>
</head>

<body id="formCalendario"style= "overflow:auto;  background: #F5F5F5">
<header>
  <nav>
      <div class="navbar">
        <div class="container nav-container">
        <input class="checkbox" type="checkbox" name="" id="" />
            <div class="hamburger-lines">
              <span class="line line1"></span>
              <span class="line line2"></span>
              <span class="line line3"></span>
            </div>  
          <div class="logo">
            <h1>Academiapp</h1>
          </div>
          <div class="menu-items">
            <h4>Principal</h4>
            <li><a href="/Proyecto_final/inicio/principal.php">Inicio</a></li>
            <li><a href="http://localhost/Proyecto_final/Formularios/frmCalendario.php">Calendario</a></li>
            <li><a href="#">Horario</a></li>
            <hr>
            <h4>Academico</h4>
            <li><a href="http://localhost/Proyecto_final/Formularios/frmMaterias.php">Materias</a></li>
            <li><a href="http://localhost/Proyecto_final/Formularios/frmProfesores.php">Profesores</a></li>
            <li><a href="#">Calificaciones</a></li>
            <li><a href="#">Notas</a></li>
            <hr>
            <li ><a href="http://localhost/Proyecto_final/Login/index.php"><h4>Cerrar sesión</h4></a>
          </div>
        </div>
      </div>
    </nav>
</header>

<main class="contenido">
  <div class="principal">
    <div class="containerMenuCalendario" id="containerMenuCalendario">
      <div id="crear" >
        <a href="http://localhost/Proyecto_final/Formularios/frmCalendario.php">Agregar</a>
      </div>
      <div id="buscar">
        <a href="">Buscar</a>
      </div>
      <div  id="eliminar"> 
        <a href="">Eliminar</a>
      </div>
    </div>
  <div class="container">
        <h2>Búsqueda de Eventos Escolares</h2>
          <form action="procesar_registro_evento.php" method="POST">
              <div class="form-group">
                  <label for="nombre">Id del evento:</label><br>
                  <input type="text" id="id" name="id" required style="border-radius: 20px;">
              </div>
              <input type="submit" value="Buscar Evento">
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
