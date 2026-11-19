<?php
$mensajes = [
    'mercadona' => 'El supermercado no existe',
    'id'        => 'No ha llegado el id del supermercado',
    'datos'     => 'Datos incompletos',
    'duplicado' => 'Ya existe un supermercado en esa dirección y localidad',
    'store'     => 'No se ha podido dar de alta el supermercado',
    'update'    => 'No se ha podido actualizar el supermercado',
    'destroy'   => 'No se ha podido eliminar el supermercado',
];

$error   = $_GET['error'] ?? '';
$mensaje = $mensajes[$error] ?? 'La acción NO se ha ejecutado correctamente.';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Error</title>
</head>
<body>
    <h1>Ha ocurrido un error</h1>
    <p><?= htmlspecialchars($mensaje) ?></p>
    <a href="index.php">Volver al listado</a>
</body>
</html>
