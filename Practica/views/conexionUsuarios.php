<?php
$servidor='localhost';
$usuario='root';
$contrasena="medac";
$BD_tienda="tienda";

$conexion= new Mysqli($servidor,$usuario,$contrasena,$BD_tienda)
or die("Error de conexion");
?>
