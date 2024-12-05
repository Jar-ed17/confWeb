<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Platicas - Quick Conferences</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles2.css">
   <?php require "../db/conexion.php"?>
</head>

    <body>
    <div class="content-wrapper">
    
    <header class="child-element">
        <h1>Platicas Quick Conferences</h1>
        <p>Explora nuestras Platicas pagadas y gratuitas</p>
    </header>
    <video class="video-background" src="../fVideos/EMPRE.mp4" muted loop autoplay></video>

    <!-- Filtros de búsqueda avanzada -->
     
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
    </section>
    <!-- Catálogo de platicas -->
    
    <section class="cursos" id="catalogo">
        <h2>PLATICAS PAGADAS</h2>
        <div class="cursos-grid">
            <!-- Ejemplo de una conferencia pagada -->
                    <!-- insertando el while antes de los divs -->
                    <?php
            $consulta="SELECT platicas.id_conf, plricas.nombre_conf, platicas.precio, platicas.brev_descrip, usuariosreg.usuario 
                FROM platicas JOIN usuariosreg ON platicas.id_userFK = usuariosreg.id;";
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

            <!-- Añadir más platicas con diferentes valores de tema, nivel, modalidad y duración -->

        </div>

        <h2>PLATICAS GRATUITAS</h2>
        <div class="cursos-grid">
            <div class="container" data-tema="Emocional" data-nivel="Intermedio" data-modalidad="gratuito" data-duracion="corta">
                <div class="images-and-sizes">
                    <img alt="" src="https://www.ebankingnews.com/wp-content/uploads/2024/02/1706792232-padre-rico-padre-pobre-bitcoin-1-95xO42-696x392-1.png">
                    <p class="pick">Viejito Chino</p>
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

            <!-- Más platicas gratuitas con diferentes valores de tema, nivel, modalidad y duración -->
        </div>
    </section>

    <footer>
        <p>© 2024 Quick Conferences. Todos los derechos reservados.</p>
    </footer>

    
    <script src="filtros.js"></script>
    <script src="main2.js"></script>


    </div>
    </body>
    

</html>
