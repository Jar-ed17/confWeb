<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apock web design</title>
    <link rel="stylesheet" type="text/css" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="cssperfil.css">
    <link rel="stylesheet" href="../fconferencias/styles2.css">
    <?php require "../db/conexion.php"?>
</head>

<body>
<section class="perfil-usuario">
    <div class="contenedor-perfil">
        <div class="portada-perfil" style="background-image: url('http://localhost/multimedia/relleno/fondo-9.png');">
            <div class="sombra"></div>
            <div class="avatar-perfil">
                <img src="http://localhost/multimedia/relleno/img-c9.png" alt="img">
                <a href="#" class="cambiar-foto">
                    <i class="fas fa-camera"></i> 
                    <span>Cambiar foto</span>
                </a>
            </div>
            <div class="datos-perfil">
                <h4 class="titulo-usuario">Nombre de usuario</h4>
                <p class="bio-usuario">Lorem ipsum dolor sit, amet consectetur adipisicing.</p>
                <ul class="lista-perfil">
                    <li>35 Conferencias</li>
                    <!-- <li>7 Seguidos</li>
                    <li>32 Publi</li> -->
                </ul>
            </div>
            <div class="opcciones-perfil">
                <button type="">Cambiar portada</button>
                <button type="">Agregar conferencia</button>
                <!-- <button type=""><i class="fas fa-wrench"></i></button> -->
            </div>
        </div>
        <div class="menu-perfil">
            <ul>
                <li><a href="#" title=""><i class="icono-perfil fas fa-bullhorn"></i> Conferencias</a></li>
                <!-- <li><a href="#" title=""><i class="icono-perfil fas fa-info-circle"></i> Informacion</a></li>
                <li><a href="#" title=""><i class="icono-perfil fas fa-grin"></i> Amigos 43</a></li>
                <li><a href="#" title=""><i class="icono-perfil fas fa-camera"></i> Fotos</a></li> -->
            </ul>
        </div>
    </div>
</section>
<!--====  End of html  ====-->
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

            <!-- Añadir más conferencias con diferentes valores de tema, nivel, modalidad y duración -->

        </div>


</body>

</html>