<?php
$server="localhost";
$user= "root";
$pass= "";
$db="confwebp"; 

try {
    $conexion = new PDO("mysql:host=$server;dbname=confwebp", $user, $pass);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "conexion realizada";
}
catch(PDOException $e) {
    echo "Conexion fallida: ". $e->getMessage();
}
$conexion = null;
// $conexion = new mysqli($server,$user, $pass, $db);
//     if ($conexion->connect_error) {
//         die("Conexion fallida". $conexion->connect_error);
//     } else {
//         echo"conectado";
//     }