<?php

    include("../db/conexion.php");

    //Definicion Variables e iniciarlizar
    $username = $email = $password = "";
    $username_err = $email_err = $password_err = "";

    if($_SERVER["REQUEST_METHOD"] == "POST") {

        //validando input de nombre de usuario

        if(empty(trim($_POST["username"]))) {
            $username_err = "Por favor, Ingrese un nombre de usuario";
        }else{
            // preparando para la declaracion de seleccion
            $sql = "select id FROM usuariosreg Where usuario = ? ";
            
            if($stmt = mysqli_prepare($link, $sql)) {
                mysqli_stmt_bind_param($stmt,"s", $param_username);

                $param_username = trim($_POST["username"]);

                if(mysqli_stmt_execute( $stmt )) {
                    mysqli_stmt_store_result($stmt);
            
                    if(mysqli_stmt_num_rows($stmt) == 1) {
                        $username_err = "Este nombre de usuario ya esta registrado";
                    }else{
                        $username = trim($_POST["username"]);
                    }
                }else{
                    echo"algo salio mal, intentalo mas tarde";
                }
            }
        }

        //validando input de email

        if(empty(trim($_POST["email"]))) {
            $email_err = "Por favor, Ingrese un email";
        }else{
            // preparando para la declaracion de seleccion
            $sql = "select id FROM usuariosreg Where email = ? ";
            
            if($stmt = mysqli_prepare($link, $sql)) {
                mysqli_stmt_bind_param($stmt,"s", $param_email);

                $param_email = trim($_POST["email"]);

                if(mysqli_stmt_execute( $stmt )) {
                    mysqli_stmt_store_result($stmt);
            
                    if(mysqli_stmt_num_rows($stmt) == 1) {
                        $email_err = "Este email ya esta asociado a una cuenta ingrese uno nuevo";
                    }else{
                        $email = trim($_POST["email"]);
                    }
                }else{
                    echo"algo salio mal, intentalo mas tarde";
                }
            }
        }
            // Validando contraseña
            if(empty(trim($_POST["password"]))) {
                $password_err = "Por favor, ingrese una contraseña";
            }elseif(strlen(trim($_POST["password"])) < 8 ){
                $password_err = "La contraseña debe tener almenos 8 catacteres";
            } else{
                $password = trim($_POST["password"]);
            }
            

            //comprobando los errores de entrada antes de insertar los datos a la base de datos
            if(empty($username_err) && empty($email_err) && empty($password_err)) {
                
                //PREPARAR SENTENCIA  STMT= STATEMENT

                $sql = "INSERT INTO usuariosreg (usuario, email, clave, imgUser) VALUES (?,?,?,'../fotoPerfil/user.png')";

                if($stmt = mysqli_prepare($link, $sql)) {
                    mysqli_stmt_bind_param($stmt,"sss", $param_username, $param_email, $param_password);

                    // ESTABLECIENDO PARAMENTRO
                    $param_username = $username;
                    $param_email = $email;
                    $param_password = password_hash($password, PASSWORD_DEFAULT); //ENCRIPTANDO CONTRASEñA
                        
                    if(mysqli_stmt_execute($stmt)) {
                        header("Location: ../fLoginp/loginpage.php");
                    }else{
                        echo "Algo salio mal";
                    }
                }

            }


            mysqli_close($link);
    }
?>