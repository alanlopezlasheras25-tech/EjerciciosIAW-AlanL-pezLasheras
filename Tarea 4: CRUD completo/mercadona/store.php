<?php
// Solo procesa datos y redirige: no muestra HTML.

if (!isset($_POST['direccion'], $_POST['localidad'], $_POST['fecha_apertura'],
           $_POST['encargado'], $_POST['telefono'], $_POST['ingreso_anual'])) {
    header('Location: error.php?error=datos');
    exit;
}

require 'conexion.php';

try {
    $sql = "INSERT INTO mercadona (direccion, localidad, fecha_apertura, encargado, telefono, ingreso_anual)
            VALUES (:direccion, :localidad, :fecha_apertura, :encargado, :telefono, :ingreso_anual)";

    $sentencia_preparada = $pdo->prepare($sql);
    $sentencia_preparada->execute([
        'direccion'      => trim($_POST['direccion']),
        'localidad'      => trim($_POST['localidad']),
        'fecha_apertura' => $_POST['fecha_apertura'],
        // Campo vacío en el form -> NULL en BD (no cadena vacía)
        'encargado'      => $_POST['encargado'] !== '' ? trim($_POST['encargado']) : null,
        'telefono'       => $_POST['telefono']  !== '' ? trim($_POST['telefono'])  : null,
        'ingreso_anual'  => $_POST['ingreso_anual'] !== '' ? $_POST['ingreso_anual'] : 0,
    ]);

    header('Location: success.php?ok=store');
    exit;

} catch (\PDOException $error) {
    // 1062 = clave duplicada (UNIQUE direccion + localidad)
    if (($error->errorInfo[1] ?? null) == 1062) {
        header('Location: error.php?error=duplicado');
        exit;
    }
    header('Location: error.php?error=store');
    exit;
}
