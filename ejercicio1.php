<?php
$alumnos = [
    ['Atienza Bermúdez, Alejandro', 'm'],
    ['Calderer Sánchez, Lucas', 'm'],
    ['Cano Merino, Carlos', 'm'],
    ['Chari, Abdelali', 'm'],
    ['García Zarco, Francisco José', 'm'],
    ['Gómez Pérez, Samuel', 'm'],
    ['Iáñez Navarro, Daniel', 'm'],
    ['López Lasheras, Alan', 'm'],
    ['Maldonado Cabezas, Francisco', 'm'],
    ['Martín Arias, Carlos', 'm'],
    ['Moreno González, Alexandra', 'f'],
    ['Muñoz Moreno, Elisabet', 'f'],
    ['Ourhzif, Aymane', 'm'],
    ['Sánchez Ortiz, Emilio David', 'm'],
    ['Sánchez Rodríguez, Beatriz', 'f'],
    ['Torres Gómez, Ignacio', 'm'],
    ['Uréndez Jiménez, Alba', 'f'],
    ['Uribe Aranda, Francisco', 'm'],
    ['Velasco Clavero, Pablo', 'm'],
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Alumnos</title>
</head>

<body>

<h1>Visualizando el array</h1>

<table border="1">

    <tr>
        <td>#</td>
        <td>Alumno</td>
        <td>Género</td>
    </tr>

    <?php
    foreach ($alumnos as $indice => $alumnoGenero) {

        if ($alumnoGenero[1] == 'm') {
            $color = 'green';
        } else {
            $color = 'blue';
        }
    ?>

        <tr style="background-color: <?= $color ?>">
            <td><?= $indice ?></td>
            <td><?= $alumnoGenero[0] ?></td>
            <td><?= $alumnoGenero[1] ?></td>
        </tr>

    <?php
    }
    ?>

</table>

</body>
</html>