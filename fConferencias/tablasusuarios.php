<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ejemplo</title>
    <?php require "../db/conexion.php"; ?>
</head>
<body>
<?php
                            //  bases de datos
$consulta="Show databases";
$resultado=mysqli_query($link, $consulta);

echo "<table border=1>";
echo "<td align=center> Listado de las bds </td>";
while ($row=mysqli_fetch_array($resultado)){
    echo "<tr>";
    echo "<td>$row[0]</td>";
    echo "</tr>";       
}
echo"</table>";
echo"<br>";
echo"<br>";




                                    //Repuesto de la primera

$consulta="SELECT * from usuariosreg;";
$resultado=mysqli_query($link, $consulta);

echo "<table border=1>";
    echo"<tr>";
        echo"<td>id </td>";
        echo"<td>usuario </td>";
        echo"<td>email </td>";
        echo"<td>clave </td>";
    echo"</tr>";
    while ($row=mysqli_fetch_array($resultado)){
        echo "<tr>";
            echo"<td>$row[id]</td>";
            echo"<td>$row[usuario]</td>";
            echo"<td>$row[email]</td>";
            echo"<td>$row[clave]</td>";  
        echo "</tr>";       
    }
    echo"</table>";
    echo"<br>";
    echo"<br>";


                                    // Ejemplo de publicaciones todo junto

    $consulta="SELECT conferencias.id_conf, conferencias.nombre_conf, conferencias.precio, conferencias.brev_descrip, usuariosreg.usuario 
        FROM conferencias JOIN usuariosreg ON conferencias.id_userFK = usuariosreg.id;";
    $resultado=mysqli_query($link, $consulta);

    echo "<table border=1>";
    echo"<tr>";
        echo"<td>id </td>";
        echo"<td>usuario </td>";
        echo"<td>Conferencia </td>";
        echo"<td>Precio </td>";
        echo"<td>Descripcion </td>";
    echo"</tr>";

    while ($row=mysqli_fetch_array($resultado)){
        echo "<tr>";
            echo"<td>$row[id_conf]</td>";
            echo"<td>$row[usuario]</td>";
            echo"<td>$row[nombre_conf]</td>";
            echo"<td>$row[precio]</td>";  
            echo"<td>$row[brev_descrip]</td>";  
        echo "</tr>";       
    }
    echo"</table>";

                                // Primer ejemplo de publicaciones tablas
                                
    // $consulta = "SELECT * FROM conferencias";
    $consulta="SELECT conferencias.id_conf, conferencias.nombre_conf, conferencias.precio, conferencias.brev_descrip, usuariosreg.usuario 
        FROM conferencias JOIN usuariosreg ON conferencias.id_userFK = usuariosreg.id;";
    $resultado = $link->query($consulta);
    
    if ($resultado->num_rows > 0) {
        // Salida de datos de cada fila
        while($row = $resultado->fetch_assoc()) {
            echo "<table border='1'>";
            echo "<tr><th>ID</th><td>" . $row["id_conf"]. "</td></tr>";
            echo "<tr><th>Usuario</th><td>" . $row["usuario"]. "</td></tr>";
            echo "<tr><th>Nombre de Conferencia</th><td>" . $row["nombre_conf"]. "</td></tr>";
            echo "<tr><th>Precio</th><td>" . $row["precio"]. "</td></tr>";
            echo "<tr><th>Descripción Breve</th><td>" . $row["brev_descrip"]. "</td></tr>";
            echo "</table><br>";
        }
    } else {
        echo "0 resultados";
    }
                            //2do ejemplo de publicaciones 77777777777777

    $consulta="SELECT conferencias.id_conf, conferencias.nombre_conf, conferencias.precio, conferencias.brev_descrip, usuariosreg.usuario 
        FROM conferencias JOIN usuariosreg ON conferencias.id_userFK = usuariosreg.id;";
    $result = $link->query($consulta);
    
    if ($result->num_rows > 0) {
        // Salida de datos de cada fila
        while($row = $result->fetch_assoc()) {
            echo "<div class='producto'>";
            echo "<p>Conferencia</p>";
            echo "<h>" .  $row ["usuario"]."</h>";
            echo "<h1>" . $row["nombre_conf"] . "</h1>";
            echo "<h2>" . $row["precio"] . " €</h2>";
            echo "<p class='descripcion'>" . $row["brev_descrip"] . "</p>";
            echo "</div><br>";
        }
    } else {
        echo "0 resultados";
    }

                                // 3ra version de las tablas

    $consulta="SELECT conferencias.id_conf, conferencias.nombre_conf, conferencias.precio, conferencias.brev_descrip, usuariosreg.usuario 
        FROM conferencias JOIN usuariosreg ON conferencias.id_userFK = usuariosreg.id;";
$result = $link->query($consulta);

if ($result->num_rows > 0) {
    // Salida de datos de cada fila
    while ($row = $result->fetch_assoc()) {
        echo "<table border='1'>";
        echo "<tr>";
        echo "<td>id</td>";
        echo "<td>usuario</td>";
        echo "<td>Conferencia</td>";
        echo "<td>Precio</td>";
        echo "<td>Descripcion</td>";
        echo "</tr>";

        echo "<tr>";
        echo "<td>" . $row["id_conf"] . "</td>";
        echo "<td>" . $row["usuario"] . "</td>";
        echo "<td>" . $row["nombre_conf"] . "</td>";
        echo "<td>" . $row["precio"] . "</td>";
        echo "<td>" . $row["brev_descrip"] . "</td>";
        echo "</tr>";
        echo "</table><br>";
    }
} else {
    echo "0 resultados";
}

                            
?>

<table border="1">
    <tr>
        <td>id_conf</td>
        <td>id_userFK</td>
        <td>nombre_conf</td>
        <td>precio</td>
        <td>brev_descrip</td>
    </tr>
    <?php
        $consulta="SELECT conferencias.id_conf, conferencias.nombre_conf, conferencias.precio, conferencias.brev_descrip, usuariosreg.usuario 
        FROM conferencias JOIN usuariosreg ON conferencias.id_userFK = usuariosreg.id;";
        $result = $link->query($consulta);
    
        if ($result->num_rows > 0) {
            // Salida de datos de cada fila
            while ($row = $result->fetch_assoc()) {
    ?>
    <tr>
        <td><?php echo $row['id_conf'] ?></td>
        <td><?php echo $row['usuario'] ?></td>
        <td><?php echo $row['nombre_conf'] ?></td>
        <td><?php echo $row['precio'] ?></td>
        <td><?php echo $row['brev_descrip'] ?></td>
    </tr>
    
    <?php
     }
    } else {
        echo "0 resultados";
    }
    mysqli_free_result($resultado);
    mysqli_close($link);
    ?>



</table>

</body>
</html>