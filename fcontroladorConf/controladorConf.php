<?php
        session_start();

        if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
            header("location: index.php");
            exit;
        }



require_once "../db/conexion.php";

// Obtener datos del formulario
$usuario = $_POST['usuario'];
$nombre_conf = $_POST['nombre_conf'];
$categoria = $_POST['categoria'];
$precio = $_POST['precio'];
$brev_descrip = $_POST['brev_descrip'];
// echo $usuario ;
// echo $nombre_conf;
// echo $categoria;
// echo $precio;
// echo $brev_descrip;
// Obtener el id del usuario
$sql = "SELECT id FROM usuariosreg WHERE usuario='$usuario'";
$result = $link->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $id_userFK = $row['id'];

    // Insertar datos en la tabla conferencias
    $sql = "INSERT INTO conferencias (id_userFK, nombre_conf, categoria, precio, brev_descrip)
            VALUES ('$id_userFK', '$nombre_conf', '$categoria', '$precio', '$brev_descrip')";

    if ($link->query($sql) === TRUE) {
        echo "Nueva conferencia insertada correctamente";
    } else {
        echo "Error: " . $sql . "<br>" . $link->error;
    }
} else {
    echo "Usuario no encontrado";
}

$link->close();
?>
