 <?php 
session_start();
if(isset($_SESSION['rol'])){
    $rol= $_SESSION['rol'];
} else $rol = 'invitado';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=de30ce-width, i30tial-scale=1.0">
    <title>Document</title>    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href=".\styles\index.css">
</head>
<body>

    <header>
        <div class="header-inner">
            <div class="header-logo">
                <img class="img-logo" src=".\IMG\logo.png" alt="Logo" >
            </div>
            <div class="header-search">
                <input type="text" placeholder="Buscar" disabled>
                <button type="submit">search<i class="fas fa-search"></i></button>
            </div>
            <div class="header-nav">
                <a href="login.php">Iniciar sesión</a>
                <a href="registro.php">Registrarse</a>               
                <?php 
                if($rol=='admin'){
                    echo"<a href='registroProductos.php'>Vender</a>";
                }
                ?>
                <a href="carrito.php">Carrito</a>
                <a href="cerrarSesion.php">Cerrar Sesion</a>
            </div>
        </div>
    </header>
    
    <?php 

    if(isset($_SESSION["correo"])){
        $correo = $_SESSION["correo"];
        echo "<p><h2>"."Hola, ".$correo."</h2></p>";
    }else{
        echo"<p><h2>"."Hola, invitado"."</h2></p>";
    }
    ?>   
        <div class="carousel">
            <div class="category">
                <a href=".\categorias\hogar.php"><h2>Hogar</h2>
                <img src=".\IMG\hogar.png" alt="" width="150px" height="125px" ></a>                
            </div>
            <div class="category">
                <a href=".\categorias\tecnologia.php"><h2>Tecnología</h2>
                <img src=".\IMG\tecnologia.png" alt="" width="150px" height="125px"></a>
            </div>
            <div class="category">
                <a href=".\categorias\deporte.php"><h2>Deportes</h2>
                <img src=".\IMG\deporte.jpg" alt="" width="150px" height="125px"></a>
            </div>
            <div class="category">
                <a href=".\categorias\cocina.php"><h2>Cocina</h2>
                <img src=".\IMG\cocina.jpg" alt="" width="150px" height="125px"></a>
            </div>
            <div class="category">
                <a href=".\categorias\musica.php"><h2>Musica</h2>
                <img src=".\IMG\musica.png" alt="" width="150px" height="125px"></a> 
            </div>
            <div class="category">
                <a href=".\categorias\libros.php"><h2>Libros</h2>
                <img src=".\IMG\libros.jpg" alt="" width="150px" height="125px"></a>
            </div>
            <div class="category">
                <a href=".\categorias\moda.php"><h2>Moda</h2>
                <img src=".\IMG\moda.jpg" alt="" width="150px" height="125px"></a>
            </div>           
        </div>      
    <div>
        <h1>Todos nuestros productos</h1>
      <?php
        require 'productos.php'    
    ?>  
    </div>
    <script>
            window.onload = function() {
            document.body.style.zoom = "125%";
            document.addEventListener('gesturestart', function (e) {
                e.preventDefault();
            });
        };
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>