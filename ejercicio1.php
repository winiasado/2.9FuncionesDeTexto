<?php
function obtenerIniciales($nombre) {
    $limpio = trim($nombre);
    if (strlen($limpio) >= 3) {
        $tres = substr($limpio, 0, 3);
        return strtoupper($tres);
    }
    return strtoupper($limpio);
}

function obtenerAnio($fecha) {
    $anio = substr($fecha, 2, 2);
    return $anio;
}

function obtenerMesDia($fecha) {
    $mes = substr($fecha, 5, 2);
    $dia = substr($fecha, 8, 2);
    return $mes . $dia;
}

function generarClave($nombre, $fecha) {
    $ini = obtenerIniciales($nombre);
    $a = obtenerAnio($fecha);
    $md = obtenerMesDia($fecha);
    $clave = $ini . $a . $md;
    return $clave;
}

$nombre = "";
$fecha = "";
$resultado = "";

if (isset($_POST['nombre'])) {
    $nombre = $_POST['nombre'];
    $fecha = $_POST['fecha'];
    $resultado = generarClave($nombre, $fecha);
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ejercicio 1</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="contenedor">
        <div class="nav">
            <a href="index.php">Inicio</a>
            <a href="ejercicio2.php">Ir al Ejercicio 2</a>
        </div>
        <h2>Generador de Claves</h2>
        <form method="POST" action="">
            <label>Nombre completo del estudiante:</label><br>
            <input type="text" name="nombre" value="<?php echo $nombre; ?>" required><br><br>
            
            <label>Fecha de nacimiento:</label><br>
            <input type="date" name="fecha" value="<?php echo $fecha; ?>" required><br><br>
            
            <button type="submit">Generar Clave</button>
        </form>

        <?php if ($resultado != "") { ?>
            <div class="resultado">
                <p>Clave generada: <strong><?php echo $resultado; ?></strong></p>
            </div>
        <?php } ?>
    </div>
</body>
</html>