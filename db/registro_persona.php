<?php

// if (!empty($_POST["btnregistrar"])){
//     if (!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["usuario"]) and !empty($_POST["fecha"]) and !empty($_POST["email"]) and !empty($_POST["password"]) ){
//             echo"Todo ok";
//         }else{
//             echo "algunos de los campos esta vacio";
//         }
// }

//  if (!empty($_POST["btnregistrar"])){
//     if (!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["usuario"]) and !empty($_POST["fecha"]) and !empty($_POST["email"]) and !empty($_POST["password"])  ){
//         echo"todo ok";
//     }else{
//         echo"algunos de los campos esta vacio";
//     }
// }
if (!empty($_POST["btnregistrar"])) {
    if (!empty($_POST["nombre"]) && !empty($_POST["apellido"]) && !empty($_POST["usuario"]) && !empty($_POST["fecha"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {
        echo "todo ok";
        $nombre=$_POST["nombre"];
        $apeliddo=$_POST["apellido"];
        $usuario=$_POST["usuario"];
        $fecha=$_POST["fecha"];
        $email=$_POST["email"];
        $password=$_POST["password"];

        $sql=$conexion->query("insert into register ('$nombre','$apellido','$usuario','$fecha','$email','$password')");

    } else {
        echo "algunos de los campos está vacío";
    }
}
?>