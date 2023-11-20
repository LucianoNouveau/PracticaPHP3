<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Formulario Registro</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="./styles/estilos.css">
    <?php require 'conexionUsuarios.php'?> 
</head>
<body>
    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellidos"];
        $correo=$_POST["correo"];
        $contraseña=$_POST["clave"];
        $fechaNac=($_POST["fechanac"]);
        $contraseñaCifrada= password_hash($contraseña, PASSWORD_DEFAULT);

        $fechaActual = new DateTime();
        $fechaNacimiento = new DateTime($fechaNac);
        $edad = $fechaNacimiento->diff($fechaActual)->y;
        
        $errorV="";
        if (!preg_match("/^[a-zA-Z_]{4,12}$/", $nombre)) {
            $errorV .= "-El nombre debe tener entre 4 y 12 caracteres y solo puede contener letras y barrabajas.<br>";
        }
        if (!preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,20}$/", $contraseña)) {
            $errorV .= "-La contraseña debe contener al menos un carácter en minúscula, uno en mayúscula, un número y un carácter especial. Además, debe tener entre 8 y 20 caracteres.<br>";
        }
        if ($edad < 12 || $edad > 120) {
            $errorV .= "-Tienes que tener entre 12 y 120";
        } 
        
        if ($errorV==="") {  
            $SQL="INSERT INTO usuarios(nombre, apellidos, email, contraseña, fecha_nac) VALUES ('$nombre','$apellido','$correo','$contraseñaCifrada','$fechaNac')";
            session_start();
            $conexion -> query($SQL);
            $_SESSION['correo']=$correo;
            header("Location: inicio.php");
        }        
    }  
    ?>
    <form action="" method="POST" >
        <section class="form-register">
            <h4>Formulario Registro</h4>
            <input class="controls" type="text" name="nombre" id="nombre" placeholder="Ingrese su Nombre"  required>
            <input class="controls" type="text" name="apellidos" id="apellidos" placeholder="Ingrese su Apellido" required>
            <input class="controls" type="email" name="correo" id="correo" placeholder="Ingrese su Correo" required>
            <input class="controls" type="password" name="clave" id="pass" placeholder="Ingrese su Contraseña" maxlength="255" required>
            <input class="controls" type="date" name="fechanac" id="fecha" placeholder="Fecha de nacimiento" required>
            <?php  if(isset($errorV))echo $errorV;?>
            <p>Estoy de acuerdo con <a href="#">Terminos y Condiciones</a></p>
            <input class="botons" type="submit" value="Registrar">
            <p><a href="login.php">Ya tengo Cuenta</a></p>
        </section>
    </form>
   

</body>
<footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>Contacto</h3>
                <p>Correo: SoyUnCorreo@gmail.com</p>
                <p>Teléfono: 612 34 56 78</p>
            </div>
            <div class="footer-section">
                <h3>Enlaces rápidos</h3>
                <ul>
                    <li><a href="inicio.php">Inicio</a></li>
                    <li><a href="productos.php">Productos</a></li>
                    <li><a href="acercaNosotros.php">Acerca de nosotros</a></li>
                    <li><a href="contacto.php">Contáctanos</a></li>
                </ul>
        </div>
            <div class="footer-section">
                <h3>Síguenos</h3>
            <ul>
                <li><a href="https://www.facebook.com/?locale=es_ES" target="_blank">Facebook</a></li>
                <li><a href="https://twitter.com/?lang=es" target="_blank">Twitter</a></li>
                <li><a href="https://www.instagram.com/" target="_blank">Instagram</a></li>
            </ul>
        </div>
    </div>
</footer>
</html>