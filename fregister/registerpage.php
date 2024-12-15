<?php 

        include("../controladores/code-register.php");
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
    <title>Registrate</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container-all">

        <div class="ctn-form">
            <img src="../logo1.jpg" alt="" class="logo">
            <h1 class="title">Registrate</h1>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

                <label for="">Nombre se Usuario</label>
                    <input type="text" name="username">
                    <span class="msg-error"><?php echo $username_err; ?></span>

                <label for="">Email</label>
                    <input type="text" name="email">
                    <span class="msg-error"><?php echo $email_err;?></span>

                <label for="">Contraseña</label>
                    <input type="password" name="password">
                    <span class="msg-error"><?php echo $password_err;?></span>

                <input type="submit" value="Registrarse ">
            </form>
            <span class="text-footer">Ya te haz registrado? <a href="../fLoginp/loginpage.php">Inicia sesion!</a> 
            </span>
        </div>
        <div class="ctn-text">
            <div class="capa"></div>
            <h1 class="title-description">Registrate en Quick Conference</h1>
            <p class="text-description">Esto es un ejemplo ya que nose que poner en esto</p>
        </div>
    </div>
    
</body>
</html>