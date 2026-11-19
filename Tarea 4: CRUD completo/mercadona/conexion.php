<?php
/* Variables de conexión (mismo contenedor Docker que siga) */
$host     = 'mysql';   // nombre del servicio en compose.yml
$db       = 'siga';
$user     = 'sigauser';
$password = 'sigapassword';
$charset  = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

/* Si falla la conexión, se para todo aquí */
try {
    $pdo = new PDO($dsn, $user, $password, $options);
} catch (\Throwable $error) {
    echo 'Error de conexión: ' . $error->getMessage();
    exit;
}
