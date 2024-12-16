<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Conferencias - Quick Conferences</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles2.css">
   <?php require "../db/conexion.php"?>
</head>

<body>
    
    <div class="content-wrapper">

<div style="background: transparent; padding: 15px; text-align: center; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3); border-radius: 5px;">
<a href="/confWeb/index.php" style="color: white; text-decoration: none; font-size: 24px; font-weight: bold; font-family: Arial, sans-serif; text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5); transition: transform 0.3s, color 0.3s;"
onmouseover="this.style.color='#ffcc00'; this.style.transform='scale(1.1)';"
onmouseout="this.style.color='white'; this.style.transform='scale(1)';">
Quick Conferences
  </a>
</div>
 <!--Modificaciones para implementar en el archivo principal MODIFICACION 1-->




<header class="child-element">
<div style="text-align: center; padding: 20px; background: transparent; border-radius: 10px; color: white; box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3);">
<h1 style="font-size: 36px; font-weight: bold; text-shadow: 3px 3px 6px rgba(0, 0, 0, 0.5); font-family: 'Arial', sans-serif; margin-bottom: 10px;">
CONFERENCIAS
</h1>
<p style="font-size: 18px; font-weight: 300; line-height: 1.6; text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.4);">
Explora nuestras conferencias</p>
</div>

        
        <?php        
        session_start();

        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
            echo "<p>Prueba de saber si se pone si esta loggeado uno </p>";
} 
?>
    </header>
    <video class="video-background" src="../fVideos/fondo4k.mp4" muted loop autoplay></video>
     <!-- <img class="image-background" src="https://blog.orvium.io/content/images/size/w2000/2023/06/alexandre-pellaes-6vAjp0pscX0-unsplash-1.jpg"> -->

    <!-- Filtros de búsqueda avanzada -->
<!--      
    <section id="filtros">
        <label for="tema">Filtrar por Tema:</label>
        <select id="tema">
            <option value="todos">Todos</option>
            <option value="Liderazgo">Liderazgo</option>
            <option value="Digital">Digital</option>
            <option value="Cambio">Cambio</option>
            <option value="Creatividad">Creatividad</option>
            <option value="Emocional">Emocional</option>
        </select>

        <label for="nivel">Filtrar por Nivel:</label>
        <select id="nivel">
            <option value="todos">Todos</option>
            <option value="Principiante">Principiante</option>
            <option value="Intermedio">Intermedio</option>
            <option value="Avanzado">Avanzado</option>
        </select>

        <label for="modalidad">Filtrar por Modalidad:</label>
        <select id="modalidad">
            <option value="todas">Todas</option>
            <option value="pagado">Pagadas</option>
            <option value="gratuito">Gratuitas</option>
        </select>

        <label for="duracion">Filtrar por Duración:</label>
        <select id="duracion">
            <option value="todas">Todas</option>
            <option value="corta">Corta (menos de 1 hora)</option>
            <option value="media">Media (1-3 horas)</option>
            <option value="larga">Larga (más de 3 horas)</option>
        </select>
    </section> -->
    <!-- Catálogo de conferencias -->
    
    <section class="cursos" id="catalogo">
        <!-- <h2>CONFERENCIAS PAGADAS</h2> -->
        <div class="cursos-grid">
            <!-- Ejemplo de una conferencia pagada -->
                    <!-- insertando el while antes de los divs -->
                    <?php
            $consulta="SELECT conferencias.nombre_conf, usuariosreg.usuario, usuariosreg.imgUser, conferencias.categoria, conferencias.precio, conferencias.brev_descrip
                        FROM conferencias
                        JOIN usuariosreg ON conferencias.id_userFK = usuariosreg.id;";
            $result = $link->query($consulta);
    
            if ($result->num_rows > 0) {
            // Salida de datos de cada fila
            while($row = $result->fetch_assoc()) {
            ?>
            <div class="container" data-tema="Liderazgo" data-nivel="Avanzado" data-modalidad="pagado" data-duracion="larga">
                <div class="images-and-sizes">
                    <img alt="" src="<?php echo $row['imgUser']; ?>">
                    <p class="pick"><?php echo $row['usuario'] ?></p>
                </div>
                <div class="producto">
                    <p>Conferencia</p>
                    <h1><?php echo $row['nombre_conf'] ?></h1>
                    <h2><?php echo $row['precio'] ?></php></h2>
                    <p class="descripcion"><?php echo $row['brev_descrip'] ?>.</p>
                    <div class="buttons">
                        <a href="detalles.html" class="add">Ver Detalles</a>
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

            <!-- Añadir más conferencias con diferentes valores de tema, nivel, modalidad y duración -->

        </div>

        <!-- <h2>CONFERENCIAS GRATUITAS</h2>
        <div class="cursos-grid">
            <div class="container" data-tema="Emocional" data-nivel="Intermedio" data-modalidad="gratuito" data-duracion="corta">
                <div class="images-and-sizes">
                    <img alt="" src="https://www.ebankingnews.com/wp-content/uploads/2024/02/1706792232-padre-rico-padre-pobre-bitcoin-1-95xO42-696x392-1.png">
                    <p class="pick">Xin Xao</p>
                </div>
                <div class="producto">
                    <p>Conferencia</p>
                    <h1>Inteligencia Emocional</h1>
                    <h2>0,00 €</h2>
                    <p class="descripcion">
                        La importancia de gestionar emociones en el lugar de trabajo.
                    </p>
                    <div class="buttons">
                        <a href="detalles.html?id=2" class="add">Ver Detalles</a>
                        <button class="like"><span>♥️</span></button>
                    </div>
                </div>
            </div>

            <!-- Más conferencias gratuitas con diferentes valores de tema, nivel, modalidad y duración -->
        </div> -->
    </section>

    <footer>
        <p>© 2024 Quick Conferences. Todos los derechos reservados.</p>
    </footer>

    
    <script src="filtros.js"></script>
    <script src="main2.js"></script>

    </div>
    </body>
</html>
