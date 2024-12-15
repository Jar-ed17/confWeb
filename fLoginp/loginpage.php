<?php 
    // require "../controladores/code-login.php" 
    session_start();

if (($_SESSION )) {
    header('Location: ../index2.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniar sesion</title>
    <link rel="stylesheet" href="style.css">
    <?php include ('../db/conexion.php');?>
</head>
<body>
    <div class="container-all">

        <div class="ctn-form">
            <a a href="../index.php">
                <img src="../logo1.jpg" alt="" class="logo">
            </a>
            <h1 class="title">Inicia Sesion</h1>

            <!-- <form action="<?//php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post"> -->
                <form action="" method="post">
                <?php include ('../controladores/code-login.php'); ?>
                <label for="">Email</label>
                    <input type="text" name="usuario">
                    <span class="msg-error"><?php //echo $email_err ?> </span>
                <label for="">Contraseña</label>
                    <input type="password" name="password">
                    <span class="msg-error"><?php //echo $password_err ?></span>

                <input type="submit" value="Iniciar sesion">
            </form>
            <span class="text-footer">Aun no te haz registrado? <a href="../fregister/registerpage.php">Registrate!</a> 
            </span>
        </div>
        <div class="ctn-text">
            <div class="capa"></div>
            <h1 class="title-description">Inicia sesion en Quick Conference</h1>
            <p class="text-description">Esto es un ejemplo ya que nose que poner en esto</p>
            
        </div>
    </div>
    
</body>
</html>