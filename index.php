<?php
        // Script para redireccionar a index2 si ya estas loggeado 
        // session_start();

        // if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
        //     header("location: index2.php");
        //     exit;
// }

session_start();

if (($_SESSION )) {
    header('Location: index2.php');
    exit();
}
        
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
    <header class="">
        <h1 class="fuente2">Quick Conferences</h1>
        <p class="fuente-personalizada">Servicios de conferencias, pláticas y capacitaciones a tu medida</p>
    </header>

    <div class="galery">
        <div style="background-image: url(https://marketing4ecommerce.net/wp-content/uploads/2019/09/nueva-portada-enero-16.jpg);"></div>
        <div style="background-image: url(https://www.aristaint.com/hs-fs/hubfs/usan_el_nombre_de_tuti_furlan_para_estafa_soy502_guatemala.jpg?width=940&name=usan_el_nombre_de_tuti_furlan_para_estafa_soy502_guatemala.jpg);"></div>
        <div style="background-image: url(https://media.gq.com.mx/photos/616ece50f3d2ed61e46cb098/master/w_1920,c_limit/GettyImages-80147355.jpg);"></div>
        <div style="background-image: url(https://disconnect.blog/content/images/size/w1200/2024/10/billgates.png);"></div>
        <div style="background-image: url(https://cdn.urbantecno.com/urbantecno/s/2023-01-05-11-27-elon-musk.png);"></div>
    </div>




    <nav>
        <a href="fConferencias/conferencias.php">Conferencias</a>
        <a href="fLoginp/loginpage.php">Perfil</a>
        <a href="fregister/registerpage.php">Registro</a>
        <a href="fLoginp/loginpage.php">Iniciar Sesion</a>
    </nav>



    <section class="banner">
        <h2>Hacemos de cada conferencia una experiencia única</h2>
        <p>Explora nuestros servicios y elige el que mejor se adapte a tu evento</p>
    </section>



    <section id="conferencias" class="content">
        <h2>Conferencias</h2>
        <div class="service">
            <img src="https://media.istockphoto.com/id/499517325/es/foto/un-hombre-hablando-en-una-conferencia-de-negocios.jpg?s=612x612&w=0&k=20&c=vARUwEh6tZGalu05GbbSZnB8ywm6TICeFlsJsl_ZoG4=" height="50%" width="50%" title="Es una imagen muy bonita" alt="La imagen no fue encontrada">
            <div class="service-text">
                <p>Nuestras conferencias son ideales para motivar y capacitar a grandes audiencias. Con temas como liderazgo, innovación y crecimiento personal, logramos impactar a los asistentes de forma memorable.</p>
                <p><strong>Formato:</strong> Presencial o virtual, sesiones de 1 a 2 horas.</p>
                <br>
                <button class="boton" onclick="window.location.href='/confWeb/fConferencias/conferencias.php';">Más Informes</button>
            </div>
        </div>
    </section>



    <section id="platicas" class="content">
        <h2>Pláticas</h2>
        <div class="service">
            <img src="https://media.istockphoto.com/id/1413761479/es/foto/pareja-madura-que-se-re%C3%BAne-con-asesor-financiero-para-inversiones.jpg?s=612x612&w=0&k=20&c=48v-6w9CkK-uOyD2d5uTChS9EOlCv-bTELZaWw6jCd4=" alt="Plática en Quick Conferences">
            <div class="service-text">
                <p>Ofrecemos pláticas informales y participativas, enfocadas en temas específicos como bienestar laboral, trabajo en equipo y comunicación efectiva.</p>
                <p><strong>Formato:</strong> Presencial, dinámicas de 45 minutos a 1 hora.</p>
                <br>
                <button class="boton" onclick="window.location.href='./fPlaticas/platicas copy.html';">Más Informes</button>
            </div>
        </div>
    </section>



    <section id="capacitaciones" class="content">
        <h2>Capacitaciones</h2>
        <div class="service">
            <img src="https://img.freepik.com/foto-gratis/todos-sonrien-escuchan-grupo-personas-conferencia-negocios-aula-moderna-dia_146671-16288.jpg" alt="Capacitación en Quick Conferences">
            <div class="service-text">
                <p>Nuestras capacitaciones se centran en el desarrollo de habilidades técnicas y profesionales. Contamos con programas de actualización, gestión de proyectos y herramientas digitales.</p>
                <p><strong>Formato:</strong> Presencial o virtual, talleres de 2 a 4 horas.</p>
                <br>
                <button class="boton" onclick="window.location.href='./fCapacitaciones/capacitaciones.html';">Más Informes</button>
            </div>
        </div>
    </section>



    <section id="testimonios" class="content">
        <h2>Testimonios</h2>
        <div class="testimonial">
            <p><strong>Juan Pérez:</strong> "Las conferencias de Quick Conferences nos ayudaron a mejorar el ambiente laboral y la comunicación en el equipo. ¡Muy recomendados!"</p>
        </div>
        <div class="testimonial">
            <p><strong>Ana López:</strong> "Excelente capacitación, clara y muy práctica. Aprendimos nuevas herramientas que ya estamos implementando en nuestro día a día."</p>
            <br>
        </div>
    </section>



    <footer id="contacto">
        <p>&copy; 2024 Quick Conferences | Contacto: info@quickconferences.comm</p>
    </footer>

    
</body>
</html>
