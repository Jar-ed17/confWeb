<?php

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
require "../db/conexion.php";
if(!empty($_POST['btn-actualizar-perfil'])){
    $id = $_POST['id'];
    $usuario = $_POST['usuario'];
    $descripcion = $_POST['descripcion'];

    if(!empty($usuario) && !empty($descripcion)){
        $sql = $link->query("UPDATE usuariosreg SET usuario='$usuario', descrip_perfil='$descripcion' WHERE id=$id") ;
        if ($sql==true) {
           // echo"<div class='alert alert-success'>Perfil actualizado correctamente</div>";
        } else {
            //echo"<div class='alert alert-danger'>Error al modificar</div>";
        }
    
    }else{
        //echo"<div class='alert alert-danger'>Faltan datos por modificar</div>";
    }?>

<script> window.history.replaceState(null,null, window.location.pathname) </script>

<?php    
}
// require_once "../db/conexion.php";

// $descrip_perfil = $_POST['descrip_perfil'];


// $sql = "SELECT id FROM usuariosreg WHERE id='1'";
// $result = $link->query($sql);

// if ($result->num_rows > 0) {
//     $row = $result->fetch_assoc();
//     $id_userFK = $row['id'];

//     // Insertar datos en la tabla conferencias
//     $sql = "UPDATE usuariosreg SET descrip_perfil = '$descrip_perfil' WHERE id = 1;";

//     if ($link->query($sql) === TRUE) {
//         echo "Nueva conferencia insertada correctamente";
//     } else {
//         echo "Error: " . $sql . "<br>" . $link->error;
//     }
// } else {
//     echo "Algo ha salido mal";
// }

// $link->close();
?>






</body>
</html>