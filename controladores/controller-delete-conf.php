
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Refresh" content="0; url='../fPerfil/perfiluser.php" />
    <title>Eliminar Producto</title>
</head>
<body>
<?php
include('../db/conexion.php');

$id = $_POST['id-delete-conf'];
$sql = "DELETE FROM conferencias WHERE id_conf = $id";

if ($link->query($sql) === TRUE) {
    //echo "Producto eliminado exitosamente.";
} else {
    //echo "Error: " . $link->error;
}

?>
</body>
</html>