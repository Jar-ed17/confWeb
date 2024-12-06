<?php
        define("DB_SERVER","localhost");
        define("DB_USERNAME","root");
        define("DB_PASSWORD","");
        define("DB_NAME","confwebp");
        
        $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

        // if ($link == false) {
        //     die("Error en la conexion". mysqli_connect_error());
        // }else { echo"todo gud";
        //         // echo "$DB_SERVER -";
        //         // echo "$DB_USERNAME -";
        //         // echo "$DB_PASSWORD -";
        //         // echo $DB_NAME;
        // }
///////////////////////////////////////////////////////////////////////
//     define("DB_SERVER","localhost");
//     define("DB_USERNAME","root");
//     define("DB_PASSWORD","");
//     define("DB_NAME","confwebp");
//     $DB_SERVER="localhost";
//     $DB_USERNAME= "root";
//     $DB_PASSWORD= "";
//     $DB_NAME= "confwebp";


// try {
//     $link = new PDO("mysql:host=$DB_SERVER, $DB_NAME=confwebp", $DB_USERNAME, $DB_PASSWORD);
//     $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     //echo '<div class="alert alert-primary">conexion realizada <br></div>';
//     echo"Conectado";
// }
// catch(PDOException $e) {
//     echo "Conexion fallida: ". $e->getMessage();

//     echo "$DB_SERVER -";
//     echo "$DB_USERNAME -";
//     echo "$DB_PASSWORD -";
//     echo $DB_NAME;
// }
// $link = null;
//////////////////////////////////////////////////////////////////////////////////////////
// $link = new mysqli($server,$user, $pass, $db);
//     if ($conexion->connect_error) {
//         die("Conexion fallida". $conexion->connect_error);
//     } else {
//         echo"conectado";
//     }

