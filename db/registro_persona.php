<?php

// if (!empty($_POST["btnregistrar"])){
//     if (!empty($_POST["nombre"]) and !empty($_POST["apellido"]) and !empty($_POST["usuario"]) and !empty($_POST["fecha"]) and !empty($_POST["email"]) and !empty($_POST["password"]) ){
//             echo"Todo ok";
//         }else{
//             echo "algunos de los campos esta vacio";
//         }
// }

 if (!empty($_POST["btnregistrar"])){
    if (!empty($_POST["nombre"]) and
        !empty($_POST["apellido"]) and
        !empty($_POST["usuario"]) and
        !empty($_POST["fecha"]) and
        !empty($_POST["email"]) and
        !empty($_POST["password"])  ){

        $nombre = $_POST["nombre"];
        $apellido = $_POST["apellido"];
        $usuario = $_POST["usuario"];
        $fecha = $_POST["fecha"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        $sql=$conexion->query(" insert into register(nombre, apellidos, usuario, cumpleaños, email, contraseña)
                                    values('$nombre','$apellido','$usuario','$fecha','$email','$password')");
        if ($sql==1){
            echo'<div class="alert alert-success">Persona registrada correctamente </div>';
        }else{
            echo'<div class="alert alert-danger">Error al registrar persona </div>';

        }

    }else{
        echo"<div class='alert alert-warning'>Completa todos los campos faltantes</div>";
    }
}



// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     echo "<br>Solicitud POST recibida correctamente.";
// } else {
//     echo "<br>Por favor, envía una solicitud POST.";
// }

?>