<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
    <link href="https://fonts.cdnfonts.com/css/bergell-let" rel="stylesheet">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap-theme.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>


    <title>Primera pagina</title>


  <style>
         :root{
    --color-de-fondo: #b3c7f5;   /* azul gris pastel */
    --color-de-lertras: #f1f2f5; /* azul oscuro suave */
    --color-barra: #54056cd6;      /* azul pastel medio */
    --color-boton: #E07A7A;     /* rojo coral pastel */
    --color-extra: #110606;     /* rojo suave */
        }




        body{
            background-color: #8c61e2c2 ;
        }
        table {
    border-collapse: separate;
    border-spacing: 5px;
}


th, td {
    border: 1px solid #333;
    padding: 5px;
    background-color: white;
}
    </style>
   
</head>
<body>


<div>
   
    <nav class="navbar navbar-light" style="background-color:var(--color-barra);">
        <div class="container">
            <a class="navbar-brand" href="index.html" style="color:var(--color-de-lertras); font-family: 'Times New Roman', Times, serif">Inicio</a>


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


<?php
$username = "root";
$password = "";
$server = "localhost";
$database = "martes17";


$conexion = new mysqli($server, $username, $password, $database);


if ($conexion->connect_error) {
    die("Conexion fallida: " . $conexion->connect_error);
}


$sql = "SELECT * FROM personajes";
$resultado = $conexion->query($sql);


if ($resultado->num_rows > 0) {
    echo "<table border='3'>";
    echo "<tr><th>ID</th><th>Nombre</th><th>Personaje</th><th>Altura</th><th>Peso</th><th>Poderes</th><th>Sexo</th><th>Debilidad</th><th>Creacion</th><th>Biografia</th></tr>";


    while ($row = $resultado->fetch_assoc()) {
        echo "<tr>
                <td>".$row["id"]."</td>
                <td>".$row["nombrereal"]."</td>
                <td>".$row["personaje"]."</td>
                <td>".$row["altura"]."</td>
                <td>".$row["peso"]."</td>
                <td>".$row["poderes"]."</td>
                <td>".$row["sexo"]."</td>
                <td>".$row["debilidad"]."</td>
                <td>".$row["creacion"]."</td>
                <td>".$row["biografia"]."</td>
              </tr>";
    }


    echo "</table>";
} else {
    echo "No se encontraron registros en la base de datos";
}


$conexion->close();
?>


</body>
</html>
