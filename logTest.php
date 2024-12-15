<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
// include ('db/conexion.php');
// inicializacion del usuario
// session_start();
// // verificacion si ha iniciado sesion
// if (!isset($_SESSION['usuario'])) {
//     header('Location: ../login.php');
//     exit();
// }else{
//     echo'ahuevo entraste pvto<br>';
// }
// //saber que usuario se ha loggeado
// if (isset($_SESSION['usuario'])) {
//     $usuario = $_SESSION['usuario'];
//     echo $usuario.'<br>';

//     // Obtener el ID del usuario desde la base de datos
//     $sql = "SELECT id FROM usuariosreg WHERE usuario = '$usuario'";
//     $result = $link->query($sql);

//     if ($result->num_rows > 0) {
//         $user = $result->fetch_assoc();
//         $user_id = $user['id'];
//         echo "ID del usuario: " . $user_id;
//     } else {
//         echo "Usuario no encontrado en la base de datos.";
//     }
// } else {
//     echo "No hay usuario logueado.<br>";
// }
?>
<!-- <table>
    <tr>
        <th>Conferencia</th>
        <th>nombreConferencista</th>
        <th>nombreConferencia</th>
        <th>$precio</th>
        <th>descripcion</th>
        <th>breveDescripcion</th>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
</table> -->
<!-- nuevo espaciokkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk -->
<?php
session_start();

if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
    echo "Usuario logueado: " . $usuario;

    // Obtener el ID del usuario desde la base de datos
    $sql = "SELECT id FROM usuariosreg WHERE usuario = '$usuario'";
    $result = $link->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $user_id = $user['id'];

        // Obtener los datos de las conferencias del usuario
        $sql = "SELECT usuariosreg.usuario, conferencias.nombre_conf, conferencias.precio, conferencias.descrip, conferencias.brev_descrip
                FROM usuariosreg
                JOIN conferencias ON usuariosreg.id = conferencias.id_userFK
                WHERE usuariosreg.id = '$user_id'";
        $result = $link->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {?>
            <table border="2">
                <tr>
                    <th>Usuario</th>
                    <th>Nombre conferencia</th>
                    <th>Precio</th>
                    <th>Descripcion</th>
                    <th>breveDescripcion</th>
                </tr>
                <tr>
                    <td><?php echo $row['usuario'];?></td>
                    <td><?php echo $row['nombre_conf'];?></td>
                    <td><?php echo $row['precio'];?></td>
                    <td><?php echo $row['descrip'];?></td>
                    <td><?php echo $row['brev_descrip'];?></td>
                </tr><br>
            </table>
           <?php }
        } else {
            echo "No se encontraron conferencias para este usuario.";
        }
    } 
    else {
        echo "Usuario no encontrado en la base de datos.";
    }
} else {
    echo "No hay usuario logueado.";
}
?>
<!-- OROOOOooooooooooooooooooooooooooooooooooooo -->
<h1>consulta para obtener id,usuario,imgUser y descrip_perfil</h1>
<?php
if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
    //echo "Usuario logueado: " . $usuario."<br>";

    // Obtener el ID del usuario desde la base de datos
    $sql = "SELECT id FROM usuariosreg WHERE usuario = '$usuario'";
    $result = $link->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $user_id = $user['id'];
        // echo id
        echo "id ".$user_id."<br>";

        // $sql = "SELECT id, usuario, imgUser, descrip_perfil  FROM usuariosreg WHERE id=$user_id";
        $sql = "SELECT usuariosreg.id, usuariosreg.usuario, usuariosreg.descrip_perfil, usuariosreg.imgUser, COUNT(conferencias.id_conf) AS numero_conferencias
                        FROM usuariosreg
                        LEFT JOIN conferencias ON usuariosreg.id = conferencias.id_userFK
                        WHERE usuariosreg.id = $user_id
                        GROUP BY usuariosreg.usuario, usuariosreg.descrip_perfil;";
        $result = $link->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) { ?>
            <?php echo $row['usuario']."<br>";
            echo $row['imgUser']."<br>";
            echo $row['descrip_perfil']."<br>"; 
            echo $row['numero_conferencias'];?>
        <?php    }
    }
 }

}
?>

</body>
</html>