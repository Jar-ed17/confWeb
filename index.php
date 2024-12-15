<?php
// Inicio de sesión
session_start();

// Redirección si ya está logueado
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
    header("location: index2.php");
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
        <h2>Conferencias Disponibles</h2>
        <div class="conferencias-list">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <div class='conferencia-item' style='border: 1px solid #ccc; margin: 10px; padding: 15px; border-radius: 10px; background: #f9f9f9;'>
                        <h3 style='color: #1e3c72;'>{$row['nombre_conf']}</h3>
                        <p><strong>Categoría:</strong> {$row['categoria']}</p>
                        <p><strong>Precio:</strong> $ {$row['precio']}</p>
                        <p><strong>Descripción:</strong> {$row['brev_descrip']}</p>
                        <button class='boton' style='margin-top: 10px; padding: 10px 15px; background: #1e3c72; color: white; border: none; border-radius: 5px; cursor: pointer;'
                        onclick=\"alert('¡Gracias por tu interés en {$row['nombre_conf']}!')\">Más Información</button>
                    </div>";
                }
            } else {
                echo "<p>No hay conferencias disponibles en este momento.</p>";
            }
            $conn->close();
            ?>
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

