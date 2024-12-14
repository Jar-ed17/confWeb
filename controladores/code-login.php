<?php
include_once('../db/conexion.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $usuario = $_POST['usuario'];
    $clave = $_POST['password'];

    $sql = "SELECT * FROM usuariosreg WHERE usuario = '$usuario'";
    $result = $link->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        if (password_verify($clave, $user['clave'])) {
            session_start();
            $_SESSION['usuario'] = $user['usuario'];
            header('Location: ../index2.php');
        } else {
            echo "Contraseña incorrecta.";
        }
    } else {
        echo "Usuario no encontrado.";
    }
}

    //INICIALIZAR LA SESION
//     session_start();
//     if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true) {
//         header("location: ../index2.php");
//         exit();
//     }

// require_once("../db/conexion.php");

// $email = $password ="";
// $email_err = $password_err = "";

// if ($_SERVER["REQUEST_METHOD"] == "POST"){

//     if(empty(trim($_POST["email"]))){
//         $email_err = "Por favor, ingresa el correo un email";
//     }else{
//         $email = trim($_POST["email"]);
//     }

//     if(empty(trim($_POST["password"]))){
//         $password_err = "Por favor, ingrese su contraseña";
//     }else{
//         $password = trim($_POST["password"]);
//     }
    
    


//     //VALIDAR CREDENCIALES
//     if(empty($email_err) && empty($password_err)){

//         $sql = "SELECT id, usuario, email, clave FROM usuariosreg WHERE email = ?";

//         if($stmt = mysqli_prepare($link, $sql)){
            
//             mysqli_stmt_bind_param($stmt,"s", $param_email);

//             $param_email = $email;

//             if(mysqli_stmt_execute($stmt)){
//                 mysqli_stmt_store_result($stmt);
//             }

//             if(mysqli_stmt_num_rows($stmt) == 1){
//                 mysqli_stmt_bind_result($stmt, $id, $usuario, $email, $hashed_password);
//                 if (mysqli_stmt_fetch($stmt)){
//                     if(password_verify($password, $hashed_password)){
//                         session_start();
                        
//                         //ALMACENAR LOS DATOS EN VARIABLES DE SESION
//                         $_SESSION["loggedin"] = true;
//                         $_SESSION["id"] = $id;
//                         $_SESSION["email"] = $email;

//                         header("location: ../index2.php");
//                     }else{
//                         $password_err = "La contraseña es incorrecta, intenta de nuevo";
//                     }
//                 } 
//             }else{
//                 $email_err = "No se ha encontrado ninguna cuenta con ese email";
//             }
//         }else{
//             echo"Algo salio mal, intentalo mas tarde";
//         }
//         }
//     mysqli_close($link);

// }