<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href=".\styles\index.css">
</head>
<body>
    
<?php
require 'conexionUsuarios.php';
require '../utils/Producto.php';


$sql = "SELECT * FROM productos";
$resultado = $conexion->query($sql);

if ($resultado-> num_rows > 0) {
    echo '<form action="carrito.php" method="post">';
    echo '<table class="table table-danger">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>ID</th>';
    echo '<th>Nombre</th>';
    echo '<th>Precio</th>';
    echo '<th>Descripción</th>';
    echo '<th>Cantidad</th>';
    echo '<th>Categoria</th>';
    echo '<th></th>';
    echo '<th></th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    while ($fila = $resultado->fetch_assoc()) {
        $producto = new producto(
            $fila['idProducto'],
            $fila['nombreProducto'],
            $fila['precio'],
            $fila['descripcion'],
            $fila['cantidad'],
            $fila['imagen'],
            $fila['categoria']
        );

        echo '<tr>';
        
        echo '<td>' . $producto->idProducto . '</td>';
        echo '<td>' . $producto->nombreProducto . '</td>';
        echo '<td>' . $producto->precio . '</td>';
        echo '<td>' . $producto->descripcion . '</td>';
        echo '<td>' . $producto->cantidad . '</td>';
        echo '<td>' . $producto->categoria . '</td>';
        echo '<td><img src="data:image/jpeg;base64,' . base64_encode($producto->imagen) . '" width="50" height="50" /></td>';
        echo '<td><button type="button" class="botonAñadir">Añadir a la Cesta</button></td>';
        echo '</tr>';
        
    }
    echo '</tbody>';
    echo '</table>';
    echo '</form>';
} 

$conexion->close();

?>

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

