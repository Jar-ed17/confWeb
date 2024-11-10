<?php

if (!empty($_POST["btnregistrar"])){
    if (!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["usuario"]) and !empty($_POST["fecha"]) and !empty($_POST["email"]) and !empty($_POST["password"]) ){
            echo"Todo ok";
        }else{
            echo "algunos de los campos esta vacio";
        }
}

//  if (!empty($_POST["btnregistrar"])){
//     if (!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["usuario"]) and !empty($_POST["fecha"]) and !empty($_POST["email"]) and !empty($_POST["password"])  ){
//         echo"todo ok";
//     }else{
//         echo"algunos de los campos esta vacio";
//     }
// }
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     echo "<pre>";
//     print_r($_POST);
//     echo "</pre>";

//     if (isset($_POST["btnregistrar"])) {
//         if (!empty($_POST["nombre"]) && !empty($_POST["apellido"]) && !empty($_POST["usuario"]) && !empty($_POST["fecha"]) && !empty($_POST["email"]) && !empty($_POST["password"])) {
//             echo "todo ok";
//         } else {
//             echo "algunos de los campos está vacío";
//         }
//     }
// }


// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     echo "<br>Solicitud POST recibida correctamente.";
// } else {
//     echo "<br>Por favor, envía una solicitud POST.";
// }

?>