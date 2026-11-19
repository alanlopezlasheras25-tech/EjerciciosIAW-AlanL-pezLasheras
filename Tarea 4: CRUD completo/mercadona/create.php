<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta de supermercados</title>
</head>
<body>
    <h1>Alta de supermercados</h1>
    <a href="index.php">Volver al listado</a>

    <form action="store.php" method="post">

        <label for="direccion">Dirección: </label>
        <input type="text" name="direccion" id="direccion"
               placeholder="Ej.: Calle Recogidas 45"
               required minlength="2" maxlength="150">
        <br><br>

        <label for="localidad">Localidad: </label>
        <input type="text" name="localidad" id="localidad"
               placeholder="Ej.: Granada"
               required minlength="2" maxlength="100">
        <br><br>

        <label for="fecha_apertura">Fecha de apertura: </label>
        <input type="date" name="fecha_apertura" id="fecha_apertura" required>
        <br><br>

        <label for="encargado">Encargado: </label>
        <input type="text" name="encargado" id="encargado"
               placeholder="Ej.: Ana Martín Ruiz"
               maxlength="150">
        <br><br>

        <label for="telefono">Teléfono: </label>
        <input type="tel" name="telefono" id="telefono"
               placeholder="Ej.: 958123456"
               maxlength="12" pattern="\+?[0-9]{9,11}">
        <br><br>

        <label for="ingreso_anual">Ingreso anual (€): </label>
        <input type="number" name="ingreso_anual" id="ingreso_anual"
               value="0" placeholder="Ej.: 1250000.500"
               min="0" max="9999999.999" step="0.001">
        <br><br>

        <button type="submit">Alta supermercado</button>
    </form>
</body>
</html>
