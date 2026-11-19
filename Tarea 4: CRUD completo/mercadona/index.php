<?php
require 'conexion.php';

try {
    $sql = "SELECT * FROM mercadona ORDER BY localidad, direccion";
    $sentencia_preparada = $pdo->prepare($sql);
    $sentencia_preparada->execute();
} catch (\Throwable $error) {
    echo 'Se ha producido un error, aquí más información: ';
    echo $error->getMessage();
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de supermercados</title>
</head>
<body>
    <h1>Lista de supermercados Mercadona</h1>
    <a href="create.php">Nuevo supermercado</a>
    <table border="1">
        <tr>
            <td>#</td>
            <td>Dirección</td>
            <td>Localidad</td>
            <td>Operación</td>
        </tr>
        <?php while ($fila = $sentencia_preparada->fetch()) { ?>
            <tr>
                <td><?= $fila['id'] ?></td>
                <td><?= htmlspecialchars($fila['direccion']) ?></td>
                <td><?= htmlspecialchars($fila['localidad']) ?></td>
                <td>
                    <a href="show.php?id=<?= $fila['id'] ?>">Ver</a>
                    <a href="edit.php?id=<?= $fila['id'] ?>">Editar</a>
                    <a href="delete.php?id=<?= $fila['id'] ?>">Borrar</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>
