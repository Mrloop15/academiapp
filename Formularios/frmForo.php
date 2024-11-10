<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../inicio/principal.css">
    <link rel="stylesheet" href="../css/calendario.css">
    <link rel="stylesheet" href="../Formularios/custom.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <title>Foro de la Comunidad</title>
    <style>
        body { 
            font-family: Arial, sans-serif;
            background: #f4a0fff0;
            color: #fff; /* Texto blanco */
            margin: 0;
            padding: 0;
        }
        .container { 
            width: 80%; 
            margin: auto; 
            background-color: #361d46; /* Fondo morado */
            padding: 20px;
            border-radius: 20px;
            margin-top: 20px;
        }
        h1 {
            text-align: center;
        }
        button {
            background-color: #d5a5ff; /* Morado claro */
            color: #2e1437; /* Texto morado oscuro */
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #af7ede; /* Morado más claro al pasar el ratón */
        }
        .post { 
            background-color: #492752; /* Fondo morado más oscuro */
            border: 1px solid #69326d; /* Borde morado oscuro */
            padding: 20px; 
            margin-bottom: 20px; 
            border-radius: 10px;
        }
        .post:nth-child(odd) { 
            background-color: #3a1c42; /* Fondo morado más oscuro */
        }
        .post-header { 
            margin-bottom: 15px; 
        }
        .post-title { 
            font-size: 24px; 
            margin-bottom: 10px;
            color: #fff; /* Texto blanco */
        }
        .post-meta { 
            font-size: 14px; 
            color: #ccc; /* Texto gris claro */
        }
        .post-body { 
            font-size: 16px; 
            color: #ddd; /* Texto gris */
        }
        .edit-delete-buttons { 
            display: flex; 
            justify-content: flex-end; 
            margin-top: 10px;
        }
        .edit-delete-buttons button { 
            margin-left: 10px; 
            color: #2e1437; /* Texto morado oscuro */
        }
        .edit-delete-buttons button:hover {
            background-color: #d5a5ff; /* Morado claro al pasar el ratón */
        }
        .comment-container {
            border: 1px solid #69326d; /* Borde morado oscuro */
            border-radius: 5px;
            padding: 10px;
            margin-top: 10px;
        }
        .comment { 
            margin-left: 40px; 
            color: #ccc; /* Texto gris claro */
            position: relative;
        }
        .comment .delete-comment {
            position: absolute;
            top: 5px;
            right: 5px;
            background: none;
            border: none;
            color: #ccc;
            cursor: pointer;
            font-size: 14px;
            transition: color 0.3s ease;
        }
        .comment .delete-comment:hover {
            color: #fff; /* Texto blanco al pasar el ratón */
        }
        .add-comment input[type="text"], .add-comment textarea {
            width: calc(100% - 20px); /* Ancho del 100% menos el padding */
            margin-top: 10px;
            margin-bottom: 10px;
            padding: 10px;
            background-color: #3a1c42; /* Fondo morado más oscuro */
            border: 1px solid #69326d; /* Borde morado oscuro */
            color: #ddd; /* Texto gris */
            border-radius: 5px;
        }
        .add-comment button {
            background-color: #d5a5ff; /* Morado claro */
            color: #2e1437; /* Texto morado oscuro */
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .add-comment button:hover {
            background-color: #af7ede; /* Morado más claro al pasar el ratón */
        }
        .editable {
            border: 1px solid #69326d; /* Borde morado oscuro */
            padding: 5px;
            border-radius: 5px;
            color: #ddd; /* Texto gris */
            background-color: #3a1c42; /* Fondo morado más oscuro */
        }
    </style>
</head>
<body>
    <header>
        <?php
            include '../menu.php';
            $menu = new menuPrincipal();
            $menu ->barraMenu();
        ?>
    </header>
    
    <div class="container">
        <h1 style="color: white;">Bienvenidos al Foro de la Comunidad</h1>
        <!-- Botón para agregar un nuevo tema -->
        <button onclick="addNewPost()">Agregar Nuevo Tema</button>
        <!-- Posts existentes -->
        <div id="posts-container">
            <!-- Aquí se agregarán los posts -->
        </div>
    </div>

    <script>
        function addNewPost() {
            var newPost = document.createElement('div');
            newPost.classList.add('post');
            newPost.innerHTML = `
                <div class="post-header">
                    <h2 class="post-title editable" contenteditable="true">Título del Tema</h2>
                    <p class="post-meta">Publicado por Usuario el ${getCurrentDate()}</p>
                </div>
                <div class="post-body editable" contenteditable="true">Contenido del tema...</div>
                <div class="edit-delete-buttons">
                    <button onclick="toggleEditMode(this)">Guardar</button>
                    <button onclick="deletePost(this)">Eliminar</button>
                </div>
                <div class="comments">
                </div>
                <div class="add-comment">
                    <input type="text" placeholder="Tu nombre">
                    <textarea placeholder="Añadir un comentario..."></textarea>
                    <button onclick="addComment(this)">Comentar</button>
                </div>
            `;
            document.getElementById('posts-container').appendChild(newPost);
        }

        function getCurrentDate() {
            var currentDate = new Date();
            var day = currentDate.getDate();
            var month = currentDate.getMonth() + 1;
            var year = currentDate.getFullYear();
            return `${day}/${month}/${year}`;
        }

        function toggleEditMode(button) {
            var post = button.parentNode.parentNode;
            var title = post.querySelector('.post-title');
            var body = post.querySelector('.post-body');
            if (title.contentEditable === "true") {
                title.contentEditable = "false";
                body.contentEditable = "false";
                title.classList.remove('editable');
                body.classList.remove('editable');
                button.innerText = 'Editar';
            } else {
                title.contentEditable = "true";
                body.contentEditable = "true";
                title.classList.add('editable');
                body.classList.add('editable');
                button.innerText = 'Guardar';
            }
        }

        function deletePost(button) {
            var post = button.parentNode.parentNode;
            post.remove();
            console.log('Eliminar post');
            // Aquí se enviaría la solicitud de eliminación al servidor
        }

        function addComment(button) {
            var usernameInput = button.previousElementSibling.previousElementSibling;
            var commentText = button.previousElementSibling.value;
            var username = usernameInput.value;
            if (commentText.trim() !== '') {
                var commentContainer = button.parentNode.parentNode.querySelector('.comments');
                var newComment = document.createElement('div');
                newComment.classList.add('comment-container');
                newComment.innerHTML = `
                    <div class="comment">
                        <strong>${username}:</strong> ${commentText}
                    </div>
                `;
                commentContainer.appendChild(newComment);
                button.previousElementSibling.value = '';
                usernameInput.value = '';
            }
        }
    </script>
</body>
</html>












