<?php
if (!isset($_GET['id'])) {
    header('Location: error.php?error=id');
    exit;
}
$id = $_GET['id'];

require 'conexion.php';

try {
    $sql = "SELECT * FROM mercadona WHERE id = :id";
    $sentencia_preparada = $pdo->prepare($sql);
    $sentencia_preparada->execute(['id' => $id]);
} catch (\Throwable $error) {
    echo 'Se ha producido un error, aquí más información: ';
    echo $error->getMessage();
    exit;
}

$fila = $sentencia_preparada->fetch();

if (!$fila) {   // fetch() devuelve false si el id no existe
    header('Location: error.php?error=mercadona');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Borrar supermercado</title>
</head>
<body>
    <h1 style="color: #ff0000">Confirmación de borrado</h1>
    <h2><a href="index.php">Volver</a></h2>
    <table border="1">
        <tr>
            <td>#</td>
            <td>Dirección</td>
            <td>Localidad</td>
            <td>Fecha apertura</td>
            <td>Encargado</td>
            <td>Teléfono</td>
            <td>Ingreso anual</td>
        </tr>
        <tr>
            <td><?= $fila['id'] ?></td>
            <td><?= htmlspecialchars($fila['direccion']) ?></td>
            <td><?= htmlspecialchars($fila['localidad']) ?></td>
            <td><?= $fila['fecha_apertura'] ?></td>
            <td><?= htmlspecialchars($fila['encargado'] ?? '') ?></td>
            <td><?= htmlspecialchars($fila['telefono'] ?? '') ?></td>
            <td><?= number_format((float)$fila['ingreso_anual'], 3, ',', '.') ?> €</td>
        </tr>
    </table>
    <br>
    <!-- El borrado va por POST: un GET nunca debe modificar datos -->
    <form action="destroy.php" method="post">
        <input type="hidden" name="id" value="<?= $fila['id'] ?>">
        <button type="submit" style="color: #ff0000">Borrar supermercado</button>
    </form>
</body>
</html>
