<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Signup Form</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>

<div class='ripple-background'>
  <div class='circle xxlarge shade1'></div>
  <div class='circle xxlargo shade7'></div>
  <div class='circle xlarge shade2'></div>
  <div class='circle large shade3'></div>
  <div class='circle largo shade6'></div>
  <div class='circle medium shade4'></div>
  <div class='circle small shade5'></div>
</div>
   
<section>
		<div class="wrapper formulario">
        <div class="card-switch">
            <label class="switch">
               <input type="checkbox" class="toggle">
               <span class="slider"></span>
               <span class="card-side"></span>
               <div class="flip-card__inner">
                  <div class="flip-card__front">
                     <div class="title">Iniciar Sesión</div>
                     <form class="flip-card__form form" action="http://localhost/Proyecto_final/Controlador/validarLogin.php" method="post">
                        <input class="flip-card__input" id="usuario" name="usuario" placeholder="Usuario" type="text" required>
                        <input class="flip-card__input" id="contrasena"  name="contrasena" placeholder="Contraseña" type="password" required>
                        <button class="flip-card__btn" id="enviarUsr" name="enviarUsr">INICIAR</button>
                     </form>
                  </div>
                  <div class="flip-card__back">
                     <div class="title">Crear Cuenta</div>
                     <form class="flip-card__form" action="">
                        <input class="flip-card__input" placeholder="Usuario" type="text">
                        <input class="flip-card__input" name="email" placeholder="Email" type="email">
                        <input class="flip-card__input" name="contrasena" placeholder="Contraseña" type="password">
                        <button class="flip-card__btn">CREAR</button>
                     </form>
                  </div>
               </div>
            </label>
        </div>   
      </div>
   </section>
</body>
</html>