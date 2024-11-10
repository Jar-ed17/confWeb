<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registro</title>
    <link rel="stylesheet" href="./styleregister.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
    
</head>
<body>
    <div class="register-container">
        <div class="logo-container" id="logo-container"><img width="140%" src="../logo1.jpg" alt="logo1"></div>
        <form  method="post" action=""></form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
            <h2>Crea una nueva cuenta</h2>
            <div> 
            <p>es facil y rapido</p>
                <div>
                <?php
                    include "../db/conexion.php" ;
                    include "../db/registro_persona.php";
                ?>
                </div>
                <div>
                    <span>Nombre(s)</span>
                    <input type="text" name="nombre" placeholder="Nombre">
                </div>
                
                <div>
                    <span>Apellidos</span>
                    <input type="text" name="apellido" placeholder="Apellidos">
                </div>

                <div>
                    <span>Usuario</span>
                    <input type="text" name="usuario" placeholder="Usuario">
                </div>

                <div>
                    <span>Cumpleaños</span>
                    <div>
                        <!-- Cambio de planes -->

                        <!-- <select class="select">
                            <option value="month1">Enero</option>
                            <option value="month2" selected>Febrero</option>
                            <option value="month3">Marzo</option>
                            <option value="month4">Abril</option>
                            <option value="month5">Mayo</option>
                            <option value="month6">Junio</option>
                            <option value="month7">Julio</option>
                            <option value="month8">Agosto</option>
                            <option value="month9">Septiembre</option>
                            <option value="month10">Octubre</option>
                            <option value="month11">Noviembre</option>
                            <option value="month12">Diciembre</option>
                        </select>
                        <select name="select">
                            <option value="day1">1</option>
                            <option value="day2" selected>2</option>
                            <option value="day3">3</option>
                            <option value="day4">4</option>
                            <option value="day5">5</option>
                            <option value="day6">6</option>
                            <option value="day7">7</option>
                            <option value="day8">8</option>
                            <option value="day9">9</option>
                            <option value="day10">10</option>
                            <option value="day11">11</option>
                            <option value="day12">12</option>
                            <option value="day13">13</option>
                            <option value="day14">14</option>
                            <option value="day15">15</option>
                            <option value="day16">16</option>
                            <option value="day17">17</option>
                            <option value="day18">18</option>
                            <option value="day19">19</option>
                            <option value="day20">20</option>
                            <option value="day21">21</option>
                            <option value="day22">22</option>
                            <option value="day23">23</option>
                            <option value="day24">24</option>
                            <option value="day25">25</option>
                            <option value="day26">26</option>
                            <option value="day27">27</option>
                            <option value="day28">28</option>
                            <option value="day29">29</option>
                            <option value="day30">30</option>
                            <option value="day31">31</option>
                        </select>
                        <input type="number" id="input-number" class="input-number" min="1924" max="2011" placeholder="Año" />   --> 
                        <input type="date" name="fecha" class="form-control">                     
                    </div>
                </div>
                <div>
                    <span>email</span>
                    <input type="email" name="email" placeholder="email">
                </div>

                <div>
                    <span>contraseña</span>
                    <input type="password" name="password" placeholder="contraseña">
                </div>



                
                <!-- <label for="lastname">Apellidos</label>
                <input style="width: 92.5%" type="text" id="lastname" name="lastname"> -->
             
                <button type="submit" name="btnregistrar" class="btn btn-primary" value="ok">Registrate</button >
            </div>
        </form>
    </div>
</body>
</html>