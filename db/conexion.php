<?php
    define("DB_SERVER","localhost");
    define("DB_USERNAME","root");
    define("DB_PASSWORD","");
    define("DB_NAME","confwebp");
    
    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    if ($link == false) {
        die("Error en la conexion". mysqli_connect_error());
    }else { echo"todo gud";
    }
///////////////////////////////////////////////////////////////////////
// $server="localhost";
// $user= "root";
// $pass= "";
// $db="confwebp"; 

// try {
//     $conexion = new PDO("mysql:host=$server;dbname=confwebp", $user, $pass);
//     $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     //echo '<div class="alert alert-primary">conexion realizada <br></div>';
//     echo"Conectado";
// }
// catch(PDOException $e) {
//     echo "Conexion fallida: ". $e->getMessage();
// }
// $conexion = null;
//////////////////////////////////////////////////////////////////////////////////////////
// $conexion = new mysqli($server,$user, $pass, $db);
//     if ($conexion->connect_error) {
//         die("Conexion fallida". $conexion->connect_error);
//     } else {
//         echo"conectado";
//     }

