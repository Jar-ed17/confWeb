<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>exmpPost</title>
    <link rel="stylesheet" href="styles2.css">
    <?php require "../db/conexion.php"?>
</head>
<body>
        <div class="cursos-grid">
            <!-- Ejemplo de una conferencia pagada -->
                    <!-- insertando el while antes de los divs -->
            <?php
            $consulta="SELECT conferencias.id_conf, conferencias.nombre_conf, conferencias.precio, conferencias.brev_descrip, usuariosreg.usuario 
                FROM conferencias JOIN usuariosreg ON conferencias.id_userFK = usuariosreg.id;";
            $result = $link->query($consulta);
    
            if ($result->num_rows > 0) {
            // Salida de datos de cada fila
            while($row = $result->fetch_assoc()) {
            ?>
            <div class="container" data-tema="Liderazgo" data-nivel="Avanzado" data-modalidad="pagado" data-duracion="larga">
                <div class="images-and-sizes">
                    <img alt="" src="https://marketing4ecommerce.net/wp-content/uploads/2019/09/nueva-portada-enero-16.jpg">
                    <p class="pick"><?php echo $row['usuario'] ?></p>
                </div>
                <div class="producto">
                    <p>Conferencia</p>
                    <h1><?php echo $row['nombre_conf'] ?></h1>
                    <h2><?php echo $row['precio'] ?></php></h2>
                    <p class="descripcion"><?php echo $row['brev_descrip'] ?>.</p>
                    <div class="buttons">
                        <a href="detalles.html?id=1" class="add">Ver Detalles</a>
                        <button class="like"><span>♥️</span></button>
                    </div>
                </div>
            </div>
            <?php
            }
            } else {
                echo "0 resultados";
            }
                ?>
        </div>
    
    
    
</body>
</html>