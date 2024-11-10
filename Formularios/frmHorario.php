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
    <title>Horario escolar academiapp</title>

    <style>
        /* Agrega aquí tus estilos CSS existentes */
    </style>
</head>
<header>
    <?php
        include '../menu.php';
        $menu = new menuPrincipal();
        $menu->barraMenu();
    ?>
</header>
<body>

<h2><b><i>HORARIO</i></b></h2>

<?php
$target_dir = "uploads/";
$uploadOk = 1;

if(isset($_POST["submit"])) {
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Comprobar si el archivo de imagen es real o falso
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        //echo "Archivo es una imagen - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "Archivo no es una imagen.";
        $uploadOk = 0;
    }

    // Verificar si ya existe un archivo con el mismo nombre
    if (file_exists($target_file)) {
        echo "Lo siento, el archivo ya existe.";
        $uploadOk = 0;
    }

    // Verificar el tamaño de la imagen
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Lo siento, el archivo es demasiado grande.";
        $uploadOk = 0;
    }

    // Permitir ciertos formatos de archivo
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Lo siento, solo se permiten archivos JPG, JPEG, PNG y GIF.";
        $uploadOk = 0;
    }

    // Verificar si $uploadOk está establecido en 0 por un error
    if ($uploadOk == 0) {
        echo "Lo siento, su archivo no fue subido.";
    // Si todo está bien, intentar subir el archivo
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            //echo "El archivo ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " ha sido subido.";
            // Mostrar la imagen subida
            echo "";
            echo '<img id="uploadedImage" src="'.$target_file.'">';
            echo '<script>localStorage.setItem("uploadedImage", "'.$target_file.'");</script>';
        } else {
            echo "Lo siento, hubo un error al subir tu archivo.";
        }
    }
}
?>
<?php
$upload_dir = "uploads/";

// Verificar si el directorio ya existe
if (!file_exists($upload_dir)) {
    // Intentar crear el directorio
    if (mkdir($upload_dir, 0777, true)) {
        echo "";
    } else {
        echo "Error al crear el directorio.";
    }
} else {
    echo "";
}
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Subir Imagen" name="submit">
</form>

<script>
// Recuperar la imagen almacenada localmente y mostrarla
var uploadedImage = localStorage.getItem("uploadedImage");
if (uploadedImage) {
    document.getElementById("uploadedImage").src = uploadedImage;
}
</script>

</body>
</html>
