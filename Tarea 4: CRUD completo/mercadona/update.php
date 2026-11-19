<?php
if (!isset($_POST['id'], $_POST['direccion'], $_POST['localidad'], $_POST['fecha_apertura'],
           $_POST['encargado'], $_POST['telefono'], $_POST['ingreso_anual'])) {
    header('Location: error.php?error=datos');
    exit;
}

require 'conexion.php';

try {
    $sql = "UPDATE mercadona SET
                direccion      = :direccion,
                localidad      = :localidad,
                fecha_apertura = :fecha_apertura,
                encargado      = :encargado,
                telefono       = :telefono,
                ingreso_anual  = :ingreso_anual
            WHERE id = :id";

    $sentencia_preparada = $pdo->prepare($sql);
    $sentencia_preparada->execute([
        'id'             => $_POST['id'],
        'direccion'      => trim($_POST['direccion']),
        'localidad'      => trim($_POST['localidad']),
        'fecha_apertura' => $_POST['fecha_apertura'],
        'encargado'      => $_POST['encargado'] !== '' ? trim($_POST['encargado']) : null,
        'telefono'       => $_POST['telefono']  !== '' ? trim($_POST['telefono'])  : null,
        'ingreso_anual'  => $_POST['ingreso_anual'] !== '' ? $_POST['ingreso_anual'] : 0,
    ]);

    header('Location: success.php?ok=update');
    exit;

} catch (\PDOException $error) {
    if (($error->errorInfo[1] ?? null) == 1062) {
        header('Location: error.php?error=duplicado');
        exit;
    }
    header('Location: error.php?error=update');
    exit;
}
