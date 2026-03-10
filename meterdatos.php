<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.cdnfonts.com/css/bergell-let" rel="stylesheet">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <title>Formulario Personajes</title>


    <style>
       
        :root{
            --color-de-fondo:#766C7F ;
            --color-de-letra:black ;
            --color-de-barras:#808D8E ;
            --color-de-botones:#947EB0 ;
            --color-lertras: #f1f2f5; /* azul oscuro suave */
            --color-barra: #54056cd6;      /* azul pastel medio */
   
        }
        body{
            background-color: var(--color-de-letra);
            color: #ffffff;
        }
        h1 {
            color: #ffffff;
            text-align:center;
        }
        form{
            width:50%;
            margin:auto;
        }
        label{
            display: block;
            margin-bottom: 8px;
            color: #ffff;
        }
        input[type="text"],
        input[type="date"],
        textarea{
            width: 60%;
            padding:10px;
            margin-bottom:15px;
            border: 1px solid red;
            border-radius: 5px;
            color:black;
        }
        input[type="file"]{
            margin-bottom:15px;
        }
        input[type="submit"]{
            background-color: yellow;
            color: #000;
            padding: 10px;
            border:none;
            border-radius: 5px;
            cursor: pointer;
        }


        #mensaje{
            margin-top:15px;
            padding:10px;
            border-radius:5px;
        }


        body::before{
            content:"";
            position:fixed;
            top:0;
            left:0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background: url('flores.png') center/cover no-repeat;
            opacity:0.3;
        }
    </style>
</head>


<body>
   
<div>
    <nav class="navbar navbar-light" style="background-color:var(--color-barra);">
        <div class="container">
            <a class="navbar-brand" href="index.html" style="color:var(--color-lertras); font-family: 'Times New Roman', Times, serif">Inicio</a>


            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="nav navbar-nav">


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Unidad 1
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink1">
                            <a class="dropdown-item" href="mostrar.php">Priemera Tabla</a><br>
                            <a class="dropdown-item" href="meterdatos.php">Formulario</a><br>
                            <a class="dropdown-item" href="tablafinal.php">Tabla de personajes</a>
                        </div>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Unidad 2
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink2">
                            <a class="dropdown-item" href="sofia04.html">Porque </a><br>
                            <a class="dropdown-item" href="sofia05.html">no tiene,</a><br>
                            <a class="dropdown-item" href="sofia06.html">porque</a>
                        </div>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink3" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Unidad 3
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink3">
                            <a class="dropdown-item" href="sofia07.html">le falta</a><br>
                            <a class="dropdown-item" href="sofia08.html">las dos patitas</a><br>
                            <a class="dropdown-item" href="sofia09.html">de atras.</a>
                        </div>
                    </li>


                </ul>
            </div>
        </div>
    </nav>
</div>


<h1>Registro de Personaje</h1>


<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
method="post"
enctype="multipart/form-data">


    <label>Nombre real:</label>
    <input type="text" name="nombre" required>


    <label>Personaje:</label>
    <input type="text" name="personaje" required>


    <label>Altura:</label>
    <input type="text" name="altura" required>


    <label>Peso:</label>
    <input type="text" name="peso" required>


    <label>Poderes:</label>
    <input type="text" name="poderes" required>


    <label>Sexo:</label>
    <input type="text" name="sexo" required>


    <label>Debilidad:</label>
    <input type="text" name="debilidad" required>


    <label>Fecha de creación:</label>
    <input type="date" name="creacion" required>


    <label>Biografía:</label>
    <textarea name="biografia" rows="4" required></textarea>


    <input type="submit" value="Guardar personaje">


</form>


<?php


$username = "root";
$password = "";  
$server = "localhost";
$database = "martes17";


$conexion = new mysqli($server, $username, $password, $database);


if ($conexion->connect_error) {
    die("Connection failed: " . $conexion->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {


    $nombrereal = $_POST['nombre'];
    $personaje = $_POST['personaje'];
    $altura = $_POST['altura'];
    $peso = $_POST['peso'];
    $poderes = $_POST['poderes'];
    $sexo = $_POST['sexo'];
    $debilidad = $_POST['debilidad'];
    $creacion = $_POST['creacion'];
    $biografia = $_POST['biografia'];


    // Guardar imagen
   if(isset($_FILES['imagen']) && $_FILES['imagen']['error'] == 0){


    $nombreImagen = $_FILES['imagen']['name'];
    $rutaTemporal = $_FILES['imagen']['tmp_name'];
    $rutaDestino = "imagenes/" . $nombreImagen;


    move_uploaded_file($rutaTemporal, $rutaDestino);


} else {
    $nombreImagen = ""; // por si no se sube imagen
}


   


    $sql = "INSERT INTO personajes
    (nombrereal, personaje, altura, peso, poderes, sexo, debilidad, creacion, biografia, imagen)
    VALUES
    ('$nombrereal', '$personaje', '$altura', '$peso', '$poderes', '$sexo', '$debilidad', '$creacion', '$biografia', '$nombreImagen')";


    if($conexion->query($sql) === TRUE){
        echo "<p id='mensaje'>Nuevo personaje creado con éxito 🎉</p>";
    } else {
        echo "<p id='mensaje'>Error al agregar el personaje ❌</p>";
    }
}


$conexion->close();


?>


</body>
</html>
