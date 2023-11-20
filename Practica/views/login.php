<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Formulario Registro</title>
  <link rel="stylesheet" href="./styles/estilos.css">
  <?php require 'conexionUsuarios.php'?>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
    <?php
    if ($_SERVER["REQUEST_METHOD"]=="POST") {
        $correo=$_POST["correo"];
        $contrasena=$_POST["clave"];
        $consCorreo= "select * from usuarios where email='$correo'";
        $resultado = $conexion->query($consCorreo);

        if ($resultado->num_rows===0) {
            echo"El usuario no existe";
        }else{
            while ($fila=$resultado->fetch_assoc()) {
                $contrasena_cifrada=$fila['contraseña'];
                $rol= $fila['rol'];
            }

          $acceso=password_verify($contrasena,$contrasena_cifrada);  
          if ($acceso) {
            session_start();
            $_SESSION['correo']=$correo;
            $_SESSION['rol']=$rol;
            header("Location: inicio.php");
          }else {
            echo"El usuario y/o la contraseña no son validos";
          }
        }

    }
    ?>
    <form class="formu" action="" method="POST" onsubmit="return verificarCamposRegistro()">
        <section class="form-register">
            <h4>Iniciar Sesión</h4>
            <input class="controls" type="email" name="correo" id="correo" placeholder="Ingrese su Correo">
            <input class="controls" type="password" name="clave" id="pass" placeholder="Ingrese su Contraseña">
            <input class="botons" type="submit" value="Iniciar Sesion">
            <p><a href="registro.php">¿No tienes una cuenta?</a></p>
        </section>
    </form>
    <script>
       function verificarCamposRegistro() {
            var correo = document.getElementById('correo').value;
            var contraseñaCifrada = document.getElementById('pass').value;
                if (correo.trim() === '' || contraseñaCifrada.trim() === '') {
                    alert("Por favor, complete todos los campos.");
                    return false;

                }

                return true;
        }


    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
<footer class=footerLogin>
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