<?php
session_start();
$rol=$_SESSION['rol'];
if($rol!='admin'){
  header('location:inicio.php');
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="./styles/estilos.css">
    <?php require 'conexionUsuarios.php'?> 
</head>
<body>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombreProducto = $_POST["nombre"];
    $precio = $_POST["precio"];
    $cantidad = $_POST["cantidad"];
    $descripcion = $_POST["descripcion"];
    $categoria = $_POST["categoria"];
    $imagen = file_get_contents($_FILES['imagen']['tmp_name']);
    $imagen = $conexion->real_escape_string($imagen);

    function validarCadena($cadena, $longitudMaxima) {
    
      if (preg_match('/^[a-zA-Z0-9\s]+$/', $cadena) && strlen($cadena) <= $longitudMaxima) {
          return true;
      } else {
          return false;
      }
  }

 
  function validarPrecio($precio) {
     
      return is_numeric($precio) && $precio > 0 && $precio <= 9999.99;
  }

  function validarDescripcion($descripcion, $longitudMaxima) {
      
      return strlen($descripcion) <= $longitudMaxima;
  }

  
  function validarCantidad($cantidad) {
    
      return filter_var($cantidad, FILTER_VALIDATE_INT, array("options" => array("min_range" => 0, "max_range" => 99999))) !== false;
  }
  if (!validarCadena($nombreProducto, 40)) {
    echo "elija un nombre de maximo 40 caracteres, y solo aceptara letras, numeros y espacios en blanco";
} elseif (!validarPrecio($precio)) {
    echo "Precio no valido";
} elseif (!validarDescripcion($descripcion, 255)) {
    echo "Descripcion de maximo 255 caracteres";
} elseif (!validarCantidad($cantidad)) {
    echo "Cantidad no valida";
} else {

    $SQL = "INSERT INTO productos(nombreProducto, precio, descripcion, cantidad, imagen, categoria) VALUES ('$nombreProducto','$precio','$descripcion','$cantidad','$imagen' ,'$categoria')";

    if ($conexion->query($SQL) === TRUE) {
        echo "Producto agregado correctamente.";
    } 
    }
    $conexion->close();
}
?>

<div class="form-register">
    <h4>Registro de Productos</h4>

    <form action="" method="post" enctype="multipart/form-data">
      <div class="controls">
        <label for="" class="control-label">Categoría:</label>
        <select name="categoria" id="categoria" class="form-control" required>
          <option value="" selected disabled>Selecciona una opcion</option>
          <option value="Cocina">Cocina</option>
          <option value="Hogar">Hogar</option>
          <option value="Deporte">Deporte</option>
          <option value="Libros">Libros</option>
          <option value="Moda">Moda</option>
          <option value="Musica">Musica</option>
          <option value="Tecnologia">Tecnologia</option>
        </select>
      </div>

      <div class="controls">
        <label for="nombre" class="control-label">Nombre del Producto:</label>
        <input type="text" name="nombre" id="nombre" class="form-control" >
      </div>

      <div class="controls">
        <label for="precio" class="control-label">Precio:</label>
        <input type="number" name="precio" id="precio" step="0.01" class="form-control">
      </div>

      <div class="controls">
        <label for="cantidad" class="control-label">Cantidad:</label>
        <input type="number" name="cantidad" id="cantidad" class="form-control" >
      </div>

      <div class="controls">
        <label for="descripcion" class="control-label">descripcion:</label>
        <input type="text" name="descripcion" id="descripcion" class="form-control">
      </div>

      <div class="controls">
        <label for="imagen" class="control-label">Imagen del Producto:</label>
        <input type="file" name="imagen" id="imagen" class="form-control" accept="image/jpeg, image/jpg, image/png" required>
      </div>

      <button type="submit" class="botons">Registrar Producto</button>
    </form>
  </div>

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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</footer>
</html>
