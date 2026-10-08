<?php
$alumnos = [
    ['Atienza Bermúdez, Alejandro', 'm', 20],
    ['Calderer Sánchez, Lucas', 'm', 21],
    ['Cano Merino, Carlos', 'm', 20],
    ['Chari, Abdelali', 'm', 19],
    ['García Zarco, Francisco José', 'm', 22],
    ['Gómez Pérez, Samuel', 'm', 21],
    ['Iáñez Navarro, Daniel', 'm', 20],
    ['López Lasheras, Alan', 'm', 19],
    ['Maldonado Cabezas, Francisco', 'm', 22],
    ['Martín Arias, Carlos', 'm', 21],
    ['Moreno González, Alexandra', 'f', 20],
    ['Muñoz Moreno, Elisabet', 'f', 19],
    ['Ourhzif, Aymane', 'm', 22],
    ['Sánchez Ortiz, Emilio David', 'm', 21],
    ['Sánchez Rodríguez, Beatriz', 'f', 20],
    ['Torres Gómez, Ignacio', 'm', 19],
    ['Uréndez Jiménez, Alba', 'f', 22],
    ['Uribe Aranda, Francisco', 'm', 21],
    ['Velasco Clavero, Pablo', 'm', 20],
];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumnos</title>
</head>

<body>

<h1>Visualizando el array</h1>

<table border="1px">
    <tr>
        <td>#</td>
        <td>Alumno</td>
        <td>Género</td>
        <td>Edad</td>
    </tr>

    <?php
    foreach ($alumnos as $indice => $alumno) {

        if ($alumno[2] % 2 == 0) {
            $color = 'blue';
        } else {
            $color = 'green';
        }
    ?>

        <tr>
            <td><?= $indice ?></td>
            <td><?= $alumno[0] ?></td>
            <td><?= $alumno[1] ?></td>
            <td style="color: <?= $color ?>"><?= $alumno[2] ?></td>
        </tr>

    <?php
    }
    ?>

</table>

</body>
</html>