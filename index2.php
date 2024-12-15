<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header('Location: floginp/loginpage.php');
    exit();
}
// Conexión a la base de datos
$servername = "localhost"; // Cambia según tu configuración
$username = "root";        // Cambia según tu configuración
$password = "";            // Cambia según tu configuración
$dbname = "confwebp";      // Nombre de la base de datos

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error al conectar a la base de datos: " . $conn->connect_error);
}

// Consulta para obtener las conferencias
$sql = "SELECT id_conf, nombre_conf, categoria, precio, brev_descrip FROM conferencias";
$result = $conn->query($sql);
?>





<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Quick Conferences - Servicios de Conferencias</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <!--<header class="">
        <h1 class="fuente2">Quick Conferences</h1>
        <p class="fuente-personalizada">Servicios de conferencias, pláticas y capacitaciones a tu medida</p>
    </header>-->
    <header class="header">
    <h1 class="fuente2">Quick Conferences</h1>
    <p class="fuente-personalizada">Servicios de conferencias, pláticas y capacitaciones a tu medida</p>
</header>

<style>
    body {
        font-family: 'Roboto', sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f5f5f5;
    }

    .header {
        background: linear-gradient(135deg,rgb(142, 107, 36),rgb(203, 132, 61));
        text-align: center;
        padding: 80px 20px;
        color: #fff;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        border-bottom: 2px solidrgb(31, 25, 17);
    }

    .fuente2 {
        font-size: 48px;
        font-weight: 700;
        letter-spacing: 1px;
        margin-bottom: 20px;
        text-transform: uppercase;
        color: #fff;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
    }

    .fuente-personalizada {
        font-size: 18px;
        font-weight: 300;
        color: #fff;
        line-height: 1.6;
        max-width: 600px;
        margin: 0 auto;
        opacity: 0.8;
        letter-spacing: 0.5px;
    }

    .fuente2:hover {
        color: #ff9900;
        text-shadow: 2px 2px 10px rgba(255, 153, 0, 0.5);
    }

    .fuente-personalizada:hover {
        opacity: 1;
    }
</style>


    <div class="galery">
        <div style="background-image: url(https://marketing4ecommerce.net/wp-content/uploads/2019/09/nueva-portada-enero-16.jpg);"></div>
        <div style="background-image: url(https://www.aristaint.com/hs-fs/hubfs/usan_el_nombre_de_tuti_furlan_para_estafa_soy502_guatemala.jpg?width=940&name=usan_el_nombre_de_tuti_furlan_para_estafa_soy502_guatemala.jpg);"></div>
        <div style="background-image: url(https://media.gq.com.mx/photos/616ece50f3d2ed61e46cb098/master/w_1920,c_limit/GettyImages-80147355.jpg);"></div>
        <div style="background-image: url(https://disconnect.blog/content/images/size/w1200/2024/10/billgates.png);"></div>
        <div style="background-image: url(https://cdn.urbantecno.com/urbantecno/s/2023-01-05-11-27-elon-musk.png);"></div>
    </div>

    <!--<nav>
        <a href="#servicios">CONFERENCIAS</a>
        <a href="fLoginp/loginpage.php">PERFIL</a>
        <a href="fregister/registerpage.php">REGISTRO</a>
        <a href="fLoginp/loginpage.php">INICIAR SESION</a>
    </nav>-->
    <nav>
    <ul class="navbar">
        <li><a href="#servicios" class="nav-link">CONFERENCIAS</a></li>
        <li><a href="fperfil/perfiluser.php" class="nav-link">PERFIL</a></li>
        <li><a href="controladores/cerrar_sesion.php" class="nav-link">CERRAR SESION</a></li>
    </ul>
</nav>

<style>
    body {
        font-family: 'Roboto', sans-serif;
        margin: 0;
        padding: 0;
        background-color:rgb(252, 247, 247);
    }

    nav {
        background-color:rgb(33, 30, 26);
        padding: 15px 0;
        box-shadow: 0 4px 8px rgba(155, 150, 15, 0.72);
    }

    .navbar {
        display: flex;
        justify-content: space-around;
        align-items: center;
        list-style-type: none;
        margin: 0;
        padding: 0;
        width: 100%;
    }

    .navbar li {
        flex: 1;
        text-align: center;
    }

    .nav-link {
        text-decoration: none;
        color: #fff;
        font-size: 18px;
        font-weight: 600;
        text-transform: uppercase;
        position: relative;
        padding: 10px 0;
        transition: color 0.3s, transform 0.3s;
    }

    .nav-link:hover {
        color: #ff9900;
        transform: translateY(-2px);
    }

    .nav-link::before {
        content: '';
        position: absolute;
        bottom: 0;
        left: 50%;
        width: 0;
        height: 2px;
        background-color: #ff9900;
        transition: width 0.3s, left 0.3s;
    }

    .nav-link:hover::before {
        width: 100%;
        left: 0;
    }
</style>





   <!-- <section class="banner">
        <h2>Hacemos de cada conferencia una experiencia única</h2>
        <p>Explora nuestros servicios y elige el que mejor se adapte a tu evento</p>
    </section>-->

    <section id="servicios"class="banner" style="position: relative; padding: 100px 20px; text-align: center; color: white; overflow: hidden; background: transparent; border-radius: 20px; border: 5px solidrgb(138, 27, 8);">
    <!-- Fondo animado con partículas -->
    <div class="particles" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; z-index: 1; pointer-events: none; background: url('https://cdn.pixabay.com/photo/2021/06/30/06/26/abstract-6374434_960_720.png') no-repeat center center / cover; opacity: 0.3; animation: fadeMove 15s infinite alternate;"></div>
    
    <h2 style="z-index: 2; font-size: 3em; font-weight: bold; letter-spacing: 2px; text-transform: uppercase; margin-bottom: 20px; animation: popIn 1.5s ease-out;">Hacemos de cada conferencia una experiencia única</h2>
    <p style="z-index: 2; font-size: 1.5em; margin-bottom: 30px; animation: fadeInUp 1.5s ease-out;">Explora nuestros servicios y elige el que mejor se adapte a tu evento</p>
    <a href="fConferencias/conferencias.php" style="z-index: 2; display: inline-block; padding: 15px 30px; font-size: 1.2em; font-weight: bold; color:rgb(128, 24, 6); background-color: transparent; border-radius: 30px; border: 2px solidrgb(141, 35, 16); text-decoration: none; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3); transition: all 0.3s ease-in-out; animation: slideInUp 2s ease-out;" >Explorar Servicios</a>
</section>

<!-- Animaciones -->
<style>
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

@keyframes popIn {
    from {
        transform: scale(0.8);
        opacity: 0;
    }
    to {
        transform: scale(1);
        opacity: 1;
    }
}

@keyframes fadeMove {
    0% {
        opacity: 0.2;
        transform: translate(-50px, -50px);
    }
    100% {
        opacity: 0.4;
        transform: translate(50px, 50px);
    }
}

@keyframes slideInUp {
    from {
        opacity: 0;
        transform: translateY(50px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.banner {
    position: relative;
    overflow: hidden;
    border-radius: 20px;
    border: 5px solid rgb(114, 27, 12);
}

.banner h2,
.banner p,
.banner a {
    position: relative;
    z-index: 2;
    color:black;
}
</style>



<section id="conferencias" class="content">
    <h2 class="section-title">Conferencias Disponibles</h2>
    <div class="conferencias-list">
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "
                <div class='conferencia-item'>
                    <div class='conferencia-header'>
                        <h3 class='conferencia-title'>{$row['nombre_conf']}</h3>
                    </div>
                    <div class='conferencia-body'>
                        <p><span class='label'>Categoría:</span> {$row['categoria']}</p>
                        <p><span class='label'>Precio:</span> $ {$row['precio']}</p>
                        <p><span class='label'>Descripción:</span> {$row['brev_descrip']}</p>
                    </div>
                    <div class='conferencia-footer'>
                        <button class='boton' onclick=\"alert('¡Gracias por tu interés en {$row['nombre_conf']}!')\">Más Información</button>
                    </div>
                </div>";
            }
        } else {
            echo "<p class='no-conferencias'>No hay conferencias disponibles en este momento.</p>";
        }
        $conn->close();
        ?>
    </div>
</section>

<style>
    /* General Section Styles */
    #conferencias {
        padding: 40px 20px;
        background: transparent;
        color: #333;
        font-family: 'Georgia', serif;
    }
    .section-title {
        text-align: center;
        font-size: 2rem;
        margin-bottom: 30px;
        color: #333;
        font-weight: 600;
    }

    /* Conference List Styles */
    .conferencias-list {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 20px;
    }

    /* Conference Item Styles */
    .conferencia-item {
        background: rgba(255, 255, 255, 0.8);
        color: #333;
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        display: flex;
        flex-direction: column;
        transition: transform 0.3s, box-shadow 0.3s;
        border: 1px solid #ccc;
    }

    .conferencia-item:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .conferencia-header {
        background: rgba(33, 37, 41, 0.9);
        color: #fff;
        padding: 15px;
        text-align: center;
    }

    .conferencia-title {
        font-size: 1.5rem;
        margin: 0;
        font-style: italic;
    }

    .conferencia-body {
        padding: 20px;
        font-size: 1rem;
    }

    .label {
        font-weight: bold;
        color: #555;
    }

    .conferencia-footer {
        padding: 15px;
        text-align: center;
        background: rgba(245, 245, 245, 0.8);
    }

    .boton {
        background: #333;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 25px;
        font-size: 1rem;
        cursor: pointer;
        transition: background 0.3s;
        font-family: 'Georgia', serif;
    }

    .boton:hover {
        background: #555;
    }

    .no-conferencias {
        text-align: center;
        font-size: 1.2rem;
        margin-top: 20px;
        font-style: italic;
        color: #555;
    }
</style>


<section class="about_section layout_padding">
  <style>
    /* Estilo general para la sección */
    .about_section {
      position: relative;
      overflow: hidden;
      width: 100%;
      padding: 50px 0; /* Ajusta el espaciado interno */
      color: #fff; /* Color del texto */
      background-image: url('https://png.pngtree.com/thumb_back/fw800/background/20240611/pngtree-conference-room-with-wooden-walls-and-microphones-at-each-seat-image_15747057.jpg'); /* Ruta de tu imagen */
      background-size: cover; /* Asegura que la imagen se vea completa */
      background-position: center; /* Centra la imagen */
      background-repeat: no-repeat; /* Evita repeticiones */
      background-color: #000; /* Fondo de respaldo si la imagen no carga */
    }

    /* Fondo semi-transparente adicional para mejorar visibilidad */
    .about_section::before {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background: rgba(0, 0, 0, 0.5); /* Oscurecimiento transparente */
      z-index: 0;
    }

    /* Contenido en primer plano */
    .about_container {
      position: relative;
      z-index: 1;
      text-align: center; /* Alinea el contenido centrado */
    }

    /* Ajustar contenedor */
    .about_container .container {
      max-width: 1200px;
      margin: 0 auto;
    }

    /* Títulos y texto */
    .custom_heading {
      font-size: 36px;
      margin-bottom: 20px;
    }

    .about_section p {
      font-size: 18px;
      line-height: 1.6;
      color: rgb(247, 245, 241);
    }

    /* Botón estilizado */
    .about_section a {
      display: inline-block;
      margin-top: 20px;
      padding: 10px 20px;
      background:rgb(104, 73, 11);
      color: #fff;
      text-decoration: none;
      border-radius: 5px;
      transition: background 0.3s ease;
    }

    .about_section a:hover {
      background:rgb(232, 220, 218);
    }
    .about_container .container{
        background-color: rgba(255, 255, 255, 0.2); /* Fondo blanco con 80% de opacidad */
    }
  </style>

  <div class="about_container">
    <div class="container">
      <div class="detail">
        <h2 class="custom_heading">
          Acerca de Nosotros
        </h2>
        <p>
          En Quick Conferences, creemos en el poder de las ideas y 
          el conocimiento para transformar a las personas y organizaciones.
        </p>
        <div>
          <a href="">
            Registrate
          </a>
        </div>
      </div>
      <div class="detail-2">
        <p>
          Nuestro compromiso es conectar a 
          expertos en diversas áreas con quienes buscan crecer personal y profesionalmente. 
        </p>
      </div>
    </div>
  </div>
</section>
                




<!-- product section -->
<section class="product_section layout_padding" style="margin: 0; padding: 0;">
<div class="d-flex justify-content-center align-items-center" style="padding: 40px 0;  background-color: rgba(255, 255, 255, 0.2);  border-radius: 15px;">
  <h2 class="custom_heading" style="text-align: center; color:rgb(23, 21, 21); font-size: 2.5rem; font-weight: bold; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2); animation: fadeIn 1.5s;  ">
    Un poco de Nosotros
  </h2>
</div>

<style>
@keyframes fadeIn {
  0% {
    opacity: 0;
    transform: translateY(-20px);
  }
  100% {
    opacity: 1;
    transform: translateY(0);
  }
}
</style>

  <div class="container" style="width: 100%; height: 100vh; margin: 0; padding: 0;">
    <div class="product-grid" style="
      display: grid; 
      grid-template-columns: repeat(2, 1fr); 
      grid-template-rows: auto; 
      gap: 20px; 
      width: 100%; 
      height: 100%; 
      margin: 0 auto;">
      
    
      <!-- Imagen 1 -->
      <div class="img-box" style="overflow: hidden;">
        <img src="https://icom.museum/wp-content/uploads/2024/07/FW9B3170.jpg" 
             alt="" 
             style="width: 100%; height: 100%; object-fit: cover;">
      </div>
      <!-- Imagen 2 -->
      <div class="img-box" style="overflow: hidden;">
        <img src="https://icom.museum/wp-content/uploads/2024/07/FW9B3170.jpg" 
             alt="" 
             style="width: 100%; height: 100%; object-fit: cover;">
      </div>
      <!-- Imagen 3 -->
      <div class="img-box" style="overflow: hidden;">
        <img src="https://icom.museum/wp-content/uploads/2024/07/FW9B3170.jpg" 
             alt="" 
             style="width: 100%; height: 100%; object-fit: cover;">
      </div>
      <!-- Imagen 4 -->
      <div class="img-box" style="overflow: hidden;">
        <img src="https://icom.museum/wp-content/uploads/2024/07/FW9B3170.jpg" 
             alt="" 
             style="width: 100%; height: 100%; object-fit: cover;">
      </div>
    </div>
  </div>
</section>







    

    <!--<section id="testimonios" class="content">
        <h2>Testimonios</h2>
        <div class="testimonial">
            <p><strong>Juan Pérez:</strong> "Las conferencias de Quick Conferences nos ayudaron a mejorar el ambiente laboral y la comunicación en el equipo. ¡Muy recomendados!"</p>
        </div>
        <div class="testimonial">
            <p><strong>Ana López:</strong> "Excelente capacitación, clara y muy práctica. Aprendimos nuevas herramientas que ya estamos implementando en nuestro día a día."</p>
            <br>
        </div>
    </section>-->



    <section id="testimonios" class="content" style="padding: 40px 20px; border-radius: 10px;">
    <h2 style="text-align: center; font-size: 2.5em; font-weight: bold; margin-bottom: 20px; color:rgb(7, 8, 8);">Testimonios</h2>
    <div class="testimonials-container" style="display: flex; flex-wrap: wrap; gap: 20px; justify-content: center;">
        <div class="testimonial" style="background: transparent; border: 2px solid #1e3c72; padding: 20px; border-radius: 15px; max-width: 350px; text-align: center; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); transition: transform 0.3s;">
            <p style="font-size: 1.2em; line-height: 1.5; font-style: italic;">"Las conferencias de Quick Conferences nos ayudaron a mejorar el ambiente laboral y la comunicación en el equipo. ¡Muy recomendados!"</p>
            <p style="margin-top: 15px; font-weight: bold; color: #1e3c72;">- Juan Pérez</p>
        </div>
        <div class="testimonial" style="background: transparent; border: 2px solid #1e3c72; padding: 20px; border-radius: 15px; max-width: 350px; text-align: center; box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); transition: transform 0.3s;">
            <p style="font-size: 1.2em; line-height: 1.5; font-style: italic;">"Excelente capacitación, clara y muy práctica. Aprendimos nuevas herramientas que ya estamos implementando en nuestro día a día."</p>
            <p style="margin-top: 15px; font-weight: bold; color: #1e3c72;">- Ana López</p>
        </div>
    </div>
</section>







    <footer id="contacto">
        <p>&copy; 2024 Quick Conferences | Contacto: info@quickconferences.comm</p>
    </footer>

    
</body>
</html>

