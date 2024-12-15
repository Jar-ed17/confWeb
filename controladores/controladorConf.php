<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quick conference</title>
</head>
<body>
<?php
// require "../db/conexion.php";
// Obtener datos del formulario


if(!empty($_POST['btn-registrar'])){
    $id_userFK = $_POST['id'];
    $nombre_conf = $_POST['nombre_conf'];
    $categoria = $_POST['categoria'];
    $precio = $_POST['precio'];
    $brev_descrip = $_POST['brev_descrip'];

    if(!empty($nombre_conf) && !empty($categoria) && !empty($precio) && !empty($brev_descrip)){
        $sql = $link->query("INSERT INTO conferencias (id_userFK, nombre_conf, categoria, precio, brev_descrip) 
        VALUES ('$id_userFK', '$nombre_conf', '$categoria', '$precio', '$brev_descrip')") ;

        if ($sql==true) {
            echo"<div class='alert alert-success'>Productos agregados correctamente</div>";
        } else {
            echo"<div class='alert alert-danger'>Error al Ingresar la conferencia</div>";
        }
    
    }else{
        echo"<div class='alert alert-danger'>Asegúrate de ingresar todos los campos</div>";
    }?>

<script> window.history.replaceState(null,null, window.location.pathname) </script>

<?php    }
// Obtener datos del formulario
// $usuario = $_POST['usuario'];
// $id = $_POST['id'];
// $nombre_conf = $_POST['nombre_conf'];
// $categoria = $_POST['categoria'];
// $precio = $_POST['precio'];
// $brev_descrip = $_POST['brev_descrip'];

// // Obtener el id del usuario
// $sql = "SELECT id FROM usuariosreg WHERE usuario='$usuario'";
// $result = $link->query($sql);

// if ($result->num_rows > 0) {
//     $row = $result->fetch_assoc();
//     $id_userFK = $row['id'];

//     // Insertar datos en la tabla conferencias
//     $sql = "INSERT INTO conferencias (id_userFK, nombre_conf, categoria, precio, brev_descrip)
//             VALUES ('$id_userFK', '$nombre_conf', '$categoria', '$precio', '$brev_descrip')";

//     if ($link->query($sql) === TRUE) {
//         echo "Nueva conferencia insertada correctamente";
//     } else {
//         echo "Error: " . $sql . "<br>" . $link->error;
//     }
// } else {
//     echo "id no encontrado";
// }

// $link->close();?>
</body>
</html>
