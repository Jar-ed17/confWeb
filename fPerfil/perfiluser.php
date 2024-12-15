<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: ../floginp/loginpage.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link rel="stylesheet" type="text/css" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="cssperfil.css">
    <link rel="stylesheet" href="../fconferencias/styles2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <?php require "../db/conexion.php";
    // para que no duplique las publiaciones
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");?>
</head>

<body>
<section class="perfil-usuario">
<?php
            if (isset($_SESSION['usuario'])) {

                $usuario = $_SESSION['usuario'];

                // Obtener el ID del usuario desde la base de datos
                $sql = "SELECT id FROM usuariosreg WHERE usuario = '$usuario'";
                $result = $link->query($sql);

                if ($result->num_rows > 0) {
                    $user = $result->fetch_assoc();
                    $user_id = $user['id'];
                    // echo id
                    // echo "id ".$user_id."<br>";

                    $sql = "SELECT usuariosreg.id, usuariosreg.usuario, usuariosreg.descrip_perfil, usuariosreg.imgUser, COUNT(conferencias.id_conf) AS numero_conferencias
                                    FROM usuariosreg
                                    LEFT JOIN conferencias ON usuariosreg.id = conferencias.id_userFK
                                    WHERE usuariosreg.id = $user_id
                                    GROUP BY usuariosreg.usuario, usuariosreg.descrip_perfil;";
                    $result = $link->query($sql);
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {?>
    <div class="contenedor-perfil">
        <div class="portada-perfil" style="background-image: url('http://localhost/multimedia/relleno/fondo-9.png');">
            <div class="sombra"></div>
            <div class="avatar-perfil">
            
                <img src="<?php echo $row['imgUser']; ?>" alt="img">
                <!-- a href para cambiar imagen -->
                <a href="../logTest.php" class="cambiar-foto">
                    <i class="fas fa-camera"></i> 
                     <span>Cambiar foto</span>
                </a>
            </div>
            <div class="datos-perfil">
                <h4 class="titulo-usuario"><?php echo $row ['usuario'];  ?></h4>
                <p class="bio-usuario"><?php echo $row ['descrip_perfil']; ?></p>
                <ul class="lista-perfil">
                    <li>35 Seguidores</li>
                    <li>7 Seguidos</li>
                    <li><?php echo $row ['numero_conferencias'];?> Número de conferencias</li>
                </ul>
            </div>
            <div class="opcciones-perfil">
                <!-- Button trigger modal -->
                <button type="button" data-bs-toggle="modal" data-bs-target="#Modal-edit-perf">Editar Perfil <i class="fas fa-wrench"></i></button>
                <!-- Modal -->
                    <div class="modal fade" id="Modal-edit-perf" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Actualizacion de datos</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form action="../controladores/controladorper.php" method="post">
                            <?php //require '../controladores/controladorper.php'; ?>
                            <input type="hidden" name="id" value="<?php echo $row['id'] ;?>">
                            <input type="hidden" name="usuario" value="<?php echo $row['usuario'] ;?>">
                            <div class="form-floating">
                                <textarea class="form-control" name="descripcion" placeholder="" id="floatingTextarea2" style="height: 100px"><?php echo $row['descrip_perfil'] ;?></textarea>
                            </div><br> 
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            <input type="submit" value="Actualizar" name="btn-actualizar-perfil" class="btn btn-primary btn btn-success">
                        </div>
                        </form>
                        </div>
                    </div>
                    </div>
                <?php } } } } ?> 
                <button type="button"  data-bs-toggle="modal" data-bs-target="#ModalAgregar">Agregar conferencia</button>
                <?php
if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];

    // Obtener el ID del usuario desde la base de datos
    $sql = "SELECT id FROM usuariosreg WHERE usuario = '$usuario'";
    $result = $link->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $user_id = $user['id'];
        echo "id ".$user_id."<br>";

        $sql = "SELECT usuariosreg.id, usuariosreg.usuario, usuariosreg.descrip_perfil, usuariosreg.imgUser, COUNT(conferencias.id_conf) AS numero_conferencias
                        FROM usuariosreg
                        LEFT JOIN conferencias ON usuariosreg.id = conferencias.id_userFK
                        WHERE usuariosreg.id = $user_id
                        GROUP BY usuariosreg.usuario, usuariosreg.descrip_perfil;";
        $result = $link->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) { ?>
                            <!-- Modal -->
                <div class="modal fade" id="ModalAgregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Registro de nueva conferencia</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <?php include '../controladores/controladorConf.php'; ?>
                        
                                <input type="hidden" name="id" value="<?php echo $row['id']; ?>"><br>
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
                        <input type="submit" value="Registrar" name="btn-registrar" class="btn btn-primary btn btn-success">
                        
                    </div>
                    </form>
                    </div>
                </div>
                </div>

<?php    }
    }
 }

}
?>
            </div>
        </div>
        <div class="menu-perfil">
            <ul>
                <li><a href="#" title=""><i class="icono-perfil fas fa-bullhorn"></i>Mis Publicaciones</a></li>
                <!-- <li><a href="#" title=""><i class="icono-perfil fas fa-info-circle"></i> Informacion</a></li>
                <li><a href="#" title=""><i class="icono-perfil fas fa-grin"></i> Amigos 43</a></li>
                <li><a href="#" title=""><i class="icono-perfil fas fa-camera"></i> Fotos</a></li> -->
            </ul>
        </div>
    </div>
</section>
<!--====  End of html  ====-->
<div class="cursos-grid">
<?php

if (isset($_SESSION['usuario'])) {
    $usuario = $_SESSION['usuario'];
    //echo "Usuario logueado: " . $usuario;

    // Obtener el ID del usuario desde la base de datos
    $sql = "SELECT id FROM usuariosreg WHERE usuario = '$usuario'";
    $result = $link->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $user_id = $user['id'];

        // Obtener los datos de las conferencias del usuario
        $sql = "SELECT usuariosreg.usuario, conferencias.nombre_conf, conferencias.precio, conferencias.descrip, conferencias.id_conf, conferencias.brev_descrip
                FROM usuariosreg
                JOIN conferencias ON usuariosreg.id = conferencias.id_userFK
                WHERE usuariosreg.id = '$user_id'";
        $result = $link->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {?>
            <div class="container" data-tema="Emocional" data-nivel="Intermedio" data-modalidad="gratuito" data-duracion="corta">
                <div class="images-and-sizes">
                    <img alt="" src="https://www.ebankingnews.com/wp-content/uploads/2024/02/1706792232-padre-rico-padre-pobre-bitcoin-1-95xO42-696x392-1.png">
                    <p class="pick"><?php echo $row['usuario'];  ?></p>
                </div>
                <div class="producto">
                    <p>Conferencia</p>
                    <h1><?php echo $row['nombre_conf']; ?></h1>
                    <h2>$ <?php echo $row['precio']; ?></h2>
                    <p class="descripcion"><?php echo $row['brev_descrip']; ?></p>
                    <div class="buttons">
                        <!-- Ver que hacer con ver detalles
                        Ver que hacer con ver detalles -->
                        <a href="detalles.html?id=2" class="add">Ver Detalles</a>
                        <!-- <button class="like"><span></span></button> -->
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ModalEliminar<?php echo $row['id_conf']; ?>">Eliminar</button>
                        <!-- Modal -->
                        <div class="modal fade" id="ModalEliminar<?php echo $row['id_conf']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="../controladores/controller-delete-conf.php" method="post">
                                <?php //include '../controladores/controller-delete-conf.php'; ?>
                                    <h1>¿Seguro que quiere eliminar la conferencia?</h1>
                                    <h1>Esta acción no se podrá deshacer</h1>
                                    <input name="id-delete-conf" type="hidden" value="<?php echo $row['id_conf']; ?>">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" id="btn-delete-conf" class="btn btn-danger">Eliminar</button>
                                </form>
                            </div>
                            </div>
                        </div>
                        </div>
                        <!-- final del modal -->
                    </div>
                </div>
            </div>
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
</div>


<div class="mis-redes" style="display: block;position: fixed;bottom: 1rem;left: 1rem; opacity: 0.5; z-index: 1000;">
    <p style="font-size: .75rem;">Quick conferences</p>
    <div>
        <a target="_blank" href="https://www.facebook.com"><i class="fab fa-facebook-square"></i></a>
        <a target="_blank" href="https://twitter.com"><i class="fab fa-twitter"></i></a>
        <a target="_blank" href="https://www.instagram.com"><i class="fab fa-instagram"></i></a>
        <a target="_blank" href="https://www.youtube.com><i class="fab fa-youtube"></i></a>
    </div>
</div>
<script> window.history.replaceState(null,null, window.location.pathname) </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>