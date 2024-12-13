<?php
        // Script para redireccionar a index2 si ya estas loggeado 
        session_start();

        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
            header("location: index2.php");
            exit;
}
        
?>
<!DOCTYPE html>
 <html>
   <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" 
    integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" 
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>QUICK CONFERENCES</title>
    <link rel="stylesheet" href="explorar.css">
   </head>
<body>
<section class="showcase">
    <header>
        <h2 class="logo"><a href="index.php" style="color: white;text-decoration:none;">Quick Conferences</a>  </h2>
        <nav>
            <ul class="nav-menu">
                <li><a href="fConferencias/conferencias.php">Conferencias</a></li>
                <li><a href="fLoginp/loginpage.php">Perfil</a></li>  
                <li><a href="fregister/registerpage.php">Registro</a></li>
                <li><a href="fLoginp/loginpage.php">Iniciar Sesion</a></li>
            </ul>
        </nav>
     </header>
<div class="container">

    <div class="slide">
        <div class="item" style="background-image: url(https://media.istockphoto.com/id/499517325/es/foto/un-hombre-hablando-en-una-conferencia-de-negocios.jpg?s=612x612&w=0&k=20&c=vARUwEh6tZGalu05GbbSZnB8ywm6TICeFlsJsl_ZoG4=);">
            <div class="content">
                <div class="name">"Potencia tus habilidades, transforma tu futuro"</div>
                <div class="des">Si estás listo para crecer y destacar, nuestras capacitaciones son para ti. Aprende de manera práctica, interactiva y efectiva, 
                    con herramientas que te preparan para enfrentar cualquier reto profesional.</div>
                <button>See More</button>
            </div>
        </div>
        <div class="item" style="background-image: url(https://weezevent.com/wp-content/uploads/2023/01/12154730/animer-conferences-captivantes.jpg);">
            <div class="content">
                <div class="name">"Historias que conectan, mensajes que inspiran"</div>
                <div class="des">Ven y sé parte de pláticas diseñadas para tocar el corazón y activar la mente. 
                    Desde anécdotas poderosas hasta lecciones prácticas, 
                    aquí encontrarás la chispa que necesitas para iluminar tu camino. </div>
                <button>See More</button>
            </div>
        </div>
        <div class="item" style="background-image: url(https://img.freepik.com/fotos-premium/simposio-negocios-emprendimiento-orador-dando-charla-reunion-negocios-audiencia-sala-conferencias_1029322-1865.jpg);">
            <div class="content">
                <div class="name">"El cambio comienza con una idea, ¡ven a descubrirla!"</div>
                <div class="des">Asiste a nuestras conferencias y sumérgete en un espacio donde la creatividad, la innovación y la motivación se encuentran.</div>
                <button>See More</button>
            </div>
        </div>
        <div class="item" style="background-image: url(https://mystudybay.com.br/storage/upload/conferencia_studybay_foto_1.JPG);">
            <div class="content">
                <div class="name">"¡Déjate inspirar, transforma tu visión!"</div>
                <div class="des">Únete a nuestras conferencias y vive momentos de aprendizaje, reflexión y motivación que marcarán la diferencia</div>
                <button>See More</button>
            </div>
        </div>
        <div class="item" style="background-image: url(https://blog.minhasinscricoes.com.br/wp-content/uploads/2022/02/conferencia.png);">
            <div class="content">
                <div class="name">"Tu próximo gran paso comienza aquí"</div>
                <div class="des">Imagina un lugar donde las ideas vuelan, las soluciones emergen y los límites desaparecen. Nuestras conferencias no solo te inspiran, te empoderan a actuar. </div>
                <button>See More</button>
            </div>
        </div>
        <div class="item" style="background-image: url(https://www.haciendaparaiso.com.mx/wp-content/uploads/2022/10/cuales-son-los-participantes-de-una-conferencia.jpg);">
            <div class="content">
                <div class="name">"El aprendizaje no tiene límites, ¡tú tampoco!"</div>
                <div class="des">¿Listo para alcanzar nuevas alturas en tu carrera? Nuestras capacitaciones te ofrecen el conocimiento, las técnicas y la confianza para destacar.</div>
                <button>See More</button>
            </div>
        </div>

    </div>


<div class="button">
        <button class="prev"><i class="fa-solid fa-arrow-left-long"></i></button>
        <button class="next"><i class="fa-solid fa-arrow-right"></i></button>
    </div>

</div>
</section>
<script src="main.js"></script>
</body>
</html>