<?php
if (!isset($_POST['id'])) {
    header('Location: error.php?error=id');
    exit;
}

require 'conexion.php';

try {
    $sql = "DELETE FROM mercadona WHERE id = :id";
    $sentencia_preparada = $pdo->prepare($sql);
    $sentencia_preparada->execute(['id' => $_POST['id']]);

    // rowCount() = 0 -> no existía ese id
    if ($sentencia_preparada->rowCount() === 0) {
        header('Location: error.php?error=mercadona');
        exit;
    }

    header('Location: success.php?ok=destroy');
    exit;

} catch (\Throwable $error) {
    header('Location: error.php?error=destroy');
    exit;
}
