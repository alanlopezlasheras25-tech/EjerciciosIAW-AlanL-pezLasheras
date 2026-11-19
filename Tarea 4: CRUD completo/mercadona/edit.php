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
    <title>Edición de supermercados</title>
</head>
<body>
    <h1>Edición de supermercados</h1>
    <a href="index.php">Volver al listado</a>

    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?= $fila['id'] ?>">

        <label for="direccion">Dirección: </label>
        <input type="text" name="direccion" id="direccion"
               value="<?= htmlspecialchars($fila['direccion']) ?>"
               required minlength="2" maxlength="150">
        <br><br>

        <label for="localidad">Localidad: </label>
        <input type="text" name="localidad" id="localidad"
               value="<?= htmlspecialchars($fila['localidad']) ?>"
               required minlength="2" maxlength="100">
        <br><br>

        <label for="fecha_apertura">Fecha de apertura: </label>
        <input type="date" name="fecha_apertura" id="fecha_apertura"
               value="<?= $fila['fecha_apertura'] ?>" required>
        <br><br>

        <label for="encargado">Encargado: </label>
        <input type="text" name="encargado" id="encargado"
               value="<?= htmlspecialchars($fila['encargado'] ?? '') ?>"
               maxlength="150">
        <br><br>

        <label for="telefono">Teléfono: </label>
        <input type="tel" name="telefono" id="telefono"
               value="<?= htmlspecialchars($fila['telefono'] ?? '') ?>"
               maxlength="12" pattern="\+?[0-9]{9,11}">
        <br><br>

        <label for="ingreso_anual">Ingreso anual (€): </label>
        <input type="number" name="ingreso_anual" id="ingreso_anual"
               value="<?= $fila['ingreso_anual'] ?>"
               min="0" max="9999999.999" step="0.001">
        <br><br>

        <button type="submit">Actualizar supermercado</button>
    </form>
</body>
</html>
