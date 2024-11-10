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
    <link rel="stylesheet" href="../inicio/principal.css">
    <link rel="stylesheet" href="../css/calendario.css">
    <link rel="stylesheet" href="../Login/estilo.css">
    <link href="../Formularios/custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <title>Tareas academiapp</title>
</head>

<body id="formCalendario"style= "overflow:auto;">
<header>
<?php
  include '../menu.php';
  $menu = new menuPrincipal();
  $menu ->barraMenu();
  ?>
</header>

<main class="contenido">
  
    <h2>En este apartado podrás generar notas de forma rápida, como recordatorios o cualquier asunto
        de manera urgente sobre alguna materia.
    </h2>

  <div class="container">
          <form action="http://localhost/Proyecto_final/academiapp/Controlador/procesarMovimientoNotas.php" method="POST">
              <div class="form-group">
                  <label for="nombre">Titulo:</label><br>
                  <input type="text" id="Titulo" name="Titulo" required style="border-radius: 20px;"></input>
              </div>
              <div class="form-group">
                  <label for="nombre">Notas:</label><br>
                  <textarea id="Nota" name="Nota" rows="4" cols="50" required style="border-radius: 20px;"></textarea>
              </div>
              <button class="flip-card__btn" id="enviarNota" name="enviarNota">ENVIAR</button>
          </form>
        
  </div>
</main>
<div class="footer">
<footer style="padding: 15px; background-color: #a901f1; text-align: center; font-size: larger;">
<p style=" color: white;">&copy;Derechos Recervados AcademiApp</p>
</footer>
</div>
</body>
</html>