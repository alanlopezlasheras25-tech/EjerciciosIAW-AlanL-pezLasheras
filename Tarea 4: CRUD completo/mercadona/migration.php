<?php
require 'conexion.php';


try {
    $sql = "CREATE TABLE IF NOT EXISTS mercadona (
            id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            direccion VARCHAR(150) NOT NULL,
            localidad VARCHAR(100) NOT NULL,
            fecha_apertura DATE NOT NULL,
            encargado VARCHAR(150),
            telefono VARCHAR(12) NULL,
            ingreso_anual DECIMAL(10,3) DEFAULT 0,
            CONSTRAINT uq_direccion_localidad UNIQUE (direccion, localidad)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";

    $pdo->exec($sql);
    echo "Tabla 'mercadona' creada";
} catch (\Throwable $error) {
    echo 'Se ha producido un error, aquí más información: ';
    echo $error->getMessage();
}
