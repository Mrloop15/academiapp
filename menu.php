<?php

class menuPrincipal{

    function barraMenu(){
        ?>
<link rel="stylesheet" href="/css/style.css">
<body>
<nav>
      <div class="navbar">
        <div class="contenido nav-container">
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
            <li><a href="../inicio/principal.php">Inicio</a></li>
            <li><a href="../Formularios/frmCalendario.php">Calendario</a></li>
            <li><a href="../Formularios/frmHorario.php">Horario</a></li>
            <li><a href="../Formularios/frmForo.php">Foro Estudiantil</a></li>
            <hr>
            <h4>Academico</h4>
            <li><a href="../Formularios/frmMaterias.php">Materias</a></li>
            <li><a href="../Formularios/frmProfesores.php">Profesores</a></li>
            <li><a href="../Formularios/frmTareas.php">Tareas</a></li>
            <li><a href="../Formularios/frmNotas.php">Notas</a></li>
            <hr>
            <li ><a href="../Login/index.php"><h4>Cerrar sesión</h4></a>
          </div>
        </div>
      </div>
    </nav>
</body>


<?php    

    }//metodo

}//clase
?>


