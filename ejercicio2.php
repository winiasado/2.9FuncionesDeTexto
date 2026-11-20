<?php
function convertirMinusculas($texto) {
    return strtolower($texto);
}

function limpiarNombre($nombre) {
    $sinOrillas = trim($nombre);
    $minus = convertirMinusculas($sinOrillas);
    $sinEspacios = str_replace(' ', '', $minus);
    return $sinEspacios;
}

function obtenerInstitucion($institucion) {
    $limpio = trim($institucion);
    if (strlen($limpio) >= 2) {
        $dos = substr($limpio, 0, 2);
        return convertirMinusculas($dos);
    }
    return convertirMinusculas($limpio);
}

function obtenerAnio($anio) {
    $limpio = trim($anio);
    $ultimos = substr($limpio, -2);
    return $ultimos;
}

function generarUsuario($nombre, $institucion, $anio) {
    $part1 = limpiarNombre($nombre);
    $part2 = obtenerInstitucion($institucion);
    $part3 = obtenerAnio($anio);
    return $part1 . $part2 . $part3;
}

$nombre = "";
$institucion = "";
$anio = "";
$usuario = "";

if (isset($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
    $institucion = $_POST['institucion'];
    $anio = $_POST['anio'];
    $usuario = generarUsuario($nombre, $institucion, $anio);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 2</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="contenedor">
        <div class="nav">
            <a href="index.php">Inicio</a>
            <a href="ejercicio1.php">Ir al Ejercicio 1</a>
        </div>
        <h2>Generador de Usuarios</h2>
        <form method="POST" action="">
            <label>Nombre completo:</label><br>
            <input type="text" name="nombre" value="<?php echo $nombre; ?>" required><br><br>
            
            <label>Nombre de la institucion:</label><br>
            <input type="text" name="institucion" value="<?php echo $institucion; ?>" required><br><br>
            
            <label>Año de ingreso:</label><br>
            <input type="number" name="anio" value="<?php echo $anio; ?>" required><br><br>
            
            <button type="submit">Generar Usuario</button>
        </form>

        <?php if ($usuario != "") { ?>
            <div class="resultado">
                <p>Usuario generado: <strong><?php echo $usuario; ?></strong></p>
            </div>
        <?php } ?>
    </div>
</body>
</html>