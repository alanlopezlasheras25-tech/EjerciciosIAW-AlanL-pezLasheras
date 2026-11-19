<?php
$mensajes = [
    'store'   => 'El supermercado se ha dado de alta correctamente',
    'update'  => 'El supermercado se ha actualizado correctamente',
    'destroy' => 'El supermercado se ha eliminado correctamente',
];

$ok      = $_GET['ok'] ?? '';
$mensaje = $mensajes[$ok] ?? 'La acción se ha ejecutado correctamente.';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Operación correcta</title>
</head>
<body>
    <h1><?= htmlspecialchars($mensaje) ?></h1>
    <?php if ($ok === 'store') { ?>
        <a href="create.php">Seguir insertando</a><br>
    <?php } ?>
    <a href="index.php">Volver al listado</a>
</body>
</html>
