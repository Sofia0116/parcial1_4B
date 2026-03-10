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


    <title>Tabla Final</title>
   


<style>
body{
    margin: 0;
    padding: 0;
    font-family: Arial, Helvetica, sans-serif;
    background-image: url("flores.png");
    background-size: cover;
    background-position: center;
    background-attachment: fixed;
    color: white;
    text-align: center;
}
  :root{
    --color-de-lertras: #f1f2f5; /* azul oscuro suave */
    --color-barra: #54056cd6;      /* azul pastel medio */
}


h1{
    margin-top: 30px;
    font-size: 40px;
    text-shadow: 2px 2px 5px black;
}


table{
    margin: auto;
    border-collapse: collapse;
    width: 95%;
    background-color: rgba(0, 0, 0, 0.85);
    backdrop-filter: blur(5px);
    box-shadow: 0px 0px 15px black;
}


th{
    background-color: #b6097f;
    padding: 10px;
}


td{
    padding: 8px;
}


tr:nth-child(even){
    background-color: rgba(255,255,255,0.1);
}


tr:hover{
    background-color: rgba(255,255,255,0.3);
    transition: 0.3s;
}


img{
    width: 100px;
    border-radius: 10px;
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


<h1>Tabla de Personajes</h1>


<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


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


if($resultado->num_rows > 0){


    echo "<table>";
    echo "<tr>
            <th>ID</th>
            <th>Nombre Real</th>
            <th>Personaje</th>
            <th>Altura</th>
            <th>Peso</th>
            <th>Poderes</th>
            <th>Sexo</th>
            <th>Debilidad</th>
            <th>Creacion</th>
            <th>Biografia</th>
            <th>Imagen</th>
          </tr>";


    while($row = $resultado->fetch_assoc()){


        $imagen = base64_encode($row['imagen']);


        echo "<tr>
                <td>".$row['id']."</td>
                <td>".$row['nombrereal']."</td>
                <td>".$row['personaje']."</td>
                <td>".$row['altura']."</td>
                <td>".$row['peso']."</td>
                <td>".$row['poderes']."</td>
                <td>".$row['sexo']."</td>
                <td>".$row['debilidad']."</td>
                <td>".$row['creacion']."</td>
                <td>".$row['biografia']."</td>
                <td><img src='data:image/jpeg;base64,$imagen'/></td>
              </tr>";
    }


    echo "</table>";


}else{
    echo "No se encontraron registros en la base de datos";
}


$conexion->close();
?>


</body>
</html>
