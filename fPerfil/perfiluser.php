<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: ../index.php");
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quick Conferences</title>
    <link rel="stylesheet" type="text/css" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="cssperfil.css">
    <link rel="stylesheet" href="../fconferencias/styles2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php require "../db/conexion.php";
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");?>
</head>

<body>
<section class="perfil-usuario">
    <div class="contenedor-perfil">
        <div class="portada-perfil" style="background-image: url('http://localhost/multimedia/relleno/fondo-9.png');">
            <div class="sombra"></div>
            <div class="avatar-perfil">
                <img src="../fotoPerfil/fotoPerfil.jpeg" alt="img">
                <!-- <a href="#" class="cambiar-foto">
                    <i class="fas fa-camera"></i> 
                    <span><button type="button" class="perro" >Cambiar foto</button></span>
                </a> -->
            </div>
            <div class="datos-perfil">
            <?php
            $consulta="SELECT usuariosreg.usuario, usuariosreg.id, usuariosreg.descrip_perfil, COUNT(conferencias.id_conf) AS numero_conferencias
                        FROM usuariosreg
                        LEFT JOIN conferencias ON usuariosreg.id = conferencias.id_userFK
                        WHERE usuariosreg.usuario = 'Pedro'
                        GROUP BY usuariosreg.usuario, usuariosreg.descrip_perfil;";
            $result = $link->query($consulta);
    
            if ($result->num_rows > 0) {
            // Salida de datos de cada fila
            while($row = $result->fetch_assoc()) {
                // session_start();    
                if (isset($_SESSION['usuario'])) {
                    $usuario = $_SESSION['usuario'];
                    echo $usuario;
                    echo $_SESSION;
                } else {
                    echo "No hay usuario logueado.";
                }
            ?>

                <h4 class="titulo-usuario"><?php echo $row['usuario'] ?>
                <h4 class="titulo-usuario"><?php echo $row['id'] ?>
            </h4>
                <p class="bio-usuario"><?php echo $row['descrip_perfil'] ?></p>
                <ul class="lista-perfil">
                    <li>Numero de conferencias: <?php echo $row['numero_conferencias'] ?></li>
                    <!-- <li>7 Seguidos</li>
                    <li>32 Publi</li> -->
                </ul>
                <?php
            }
            } else {
                echo "0 resultados";
            }
                ?>
            </div>
            <div class="opcciones-perfil">
                
                <!-- Button trigger modal -->
                        <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal2">Editar Descripcion</button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal2" tabindex="-1" aria-labelledby="exampleModalLabel2" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel2">Actualizar tu perfil</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                    <form action="../fcontroladorConf/controladorper.php" method="POST" enctype="multipart/form-data">
                                        <div class="form-floating">
                                            <textarea class="form-control" name="descrip_perfil" placeholder="Actualiza tu descripcion" style="height: 100px"></textarea><br>
                                            <label for="floatingTextarea2">Descripcion breve de la conferencia</label>
                                        </div><br>
                                        
                                    
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <input type="submit" value="Registrar" name="btnregistrar" class="btn btn-primary btn btn-success">
                            </div>
                                 </form>
                            </div>
                        </div>
                        </div>
                <!-- <button type="">Agregar conferencia</button> -->
                <button type="button"  data-bs-toggle="modal" data-bs-target="#exampleModal">Agregar conferencia</button>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Registro de nueva conferencia</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="../fcontroladorConf/controladorConf.php" method="POST" enctype="multipart/form-data">
                        

                                <input class="form-control" type="text" name="usuario" placeholder="Usuario"><br>
                                <input class="form-control" type="text" name="nombre_conf" placeholder="Nombre de la conferencia"><br>
                                <div class="form-floating">
                                    <select class="form-select" name="categoria" aria-label="Floating label select example">
                                        <!-- <option selected="selected">Elije una catetoria</opt> -->
                                        <option>Tecnología e Innovación</option>
                                        <option>Salud y Bienestar</option>
                                        <option>Educación y Aprendizaje</option>
                                        <option>Negocios y Emprendimiento</option>
                                        <option>Ciencia y Medio Ambiente</option>
                                        <option>Arte y Cultura</option>
                                        <option>Desarrollo Personal</option>
                                        <option>Política y Sociedad</option>
                                    </select><br>
                                    <label for="floatingSelect">Elije una categoria</label>
                                </div>
                                <input class="form-control" type="text" name="precio"placeholder="Precio"><br>
                                <div class="form-floating">
                                    <textarea class="form-control" name="brev_descrip" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                                    <label for="floatingTextarea2">Descripcion breve de la conferencia</label>
                                </div><br>                       
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <input type="submit" value="Registrar" name="btnregistrar" class="btn btn-primary btn btn-success">
                        
                    </div>
                    </form>
                    </div>
                </div>
                </div>
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
            $consulta="SELECT conferencias.id_conf, conferencias.nombre_conf, usuariosreg.imgUser, conferencias.precio, conferencias.categoria, conferencias.brev_descrip, usuariosreg.usuario 
                        FROM conferencias JOIN usuariosreg ON conferencias.id_userFK = usuariosreg.id;";
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
                    <h1><?php echo $row['categoria'] ?></h1>
                    <h2><?php echo $row['precio'] ?></php></h2>
                    <p class="descripcion"><?php echo $row['brev_descrip'] ?>.</p>
                    <div class="buttons">
                        <a href="../fConferencias/detalles.html" class="add">Ver Detalles</a>
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

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>   
</body>

</html>