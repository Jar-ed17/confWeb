<?php
        session_start();

        if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
            header("location: index.php");
            exit;
        }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Controlador</title>
    <meta http-equiv="Refresh" content="0; url='../fPerfil/perfiluser.php" />
</head>
<body>
<?php
require_once "../db/conexion.php";

$descrip_perfil = $_POST['descrip_perfil'];

$sql = "SELECT id FROM usuariosreg WHERE id='1'";
$result = $link->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id_userFK = $row['id'];

    // Insertar datos en la tabla conferencias
    $sql = "UPDATE usuariosreg SET descrip_perfil = '$descrip_perfil' WHERE id = 1;";

    if ($link->query($sql) === TRUE) {
        echo "Nueva conferencia insertada correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $link->error;
    }
} else {
    echo "Algo ha salido mal";
}

$link->close();
?>
</body>
</html>