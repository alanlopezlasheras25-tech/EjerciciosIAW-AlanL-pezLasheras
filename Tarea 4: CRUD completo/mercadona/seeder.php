<?php
require 'conexion.php';

$tiendas = [
    ['Calle Recogidas 45',          'Granada',  '2010-03-15', 'Ana Martín Ruiz',      '958123456',    1250000.500],
    ['Avenida de la Constitución 8','Granada',  '2015-06-01', 'Luis Pérez Gómez',     '958654321',    980500.750],
    ['Calle Real 12',               'Armilla',  '2018-09-20', 'Marta Sánchez López',  null,           760300.000],
    ['Avenida Andalucía 100',       'Maracena', '2020-01-10', null,                   '+34958111222', 0],
    ['Calle Larios 3',              'Málaga',   '2012-11-05', 'Pedro Jiménez Ortega', '952333444',    1500000.125],
];

try {
    $sql = "INSERT INTO mercadona (direccion, localidad, fecha_apertura, encargado, telefono, ingreso_anual)
            VALUES (:direccion, :localidad, :fecha_apertura, :encargado, :telefono, :ingreso_anual)";
    // Se prepara UNA vez y se ejecuta N veces: más eficiente y seguro
    $sentencia_preparada = $pdo->prepare($sql);

    foreach ($tiendas as $t) {
        $sentencia_preparada->execute([
            'direccion'      => $t[0],
            'localidad'      => $t[1],
            'fecha_apertura' => $t[2],
            'encargado'      => $t[3],
            'telefono'       => $t[4],
            'ingreso_anual'  => $t[5],
        ]);
        echo "insert {$t[0]} ({$t[1]}) ok<br>";
    }
} catch (\Throwable $error) {
    echo 'Se ha producido un error, aquí más información: ';
    echo $error->getMessage();
}
