<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Deporte</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<?php
require '../conexionUsuarios.php';
require '../../utils/Producto.php'; 


$sql = "SELECT * FROM productos WHERE categoria = 'Deporte'";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    echo '<table class="table">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>ID</th>';
    echo '<th>Nombre</th>';
    echo '<th>Precio</th>';
    echo '<th>Descripción</th>';
    echo '<th>Cantidad</th>';
    echo '<th>Categoria</th>';
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
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
} 

$conexion->close();
?>

</body>
</html>
