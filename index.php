<?php
session_start();
session_destroy();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Juego Master Bind</title>
    <link rel="stylesheet" href="estilo.css" type="text/css">
</head>
<body>

<div id="presentacion">
    <h2>DESCRIPCIÓN DEL JUEGO DE MASTER BIND</h2>
    <hr />
    <ol>
        <li>Esta es una presentación personalizada del juego</li>
        <li>El usuario deberá de adivinar una secuencia de 4 colores diferentes</li>
        <li>Los colores se establecerán aleatoriamente de entre 10 colores preestablecidos </li>
        <li>En total habrá 16 intentos para adivinar</li>
        <li>En cada jugada la app informará de cuantos colores has acertado de la combinación</li>
        <li>Y cuantos de ellos están en la posición correcta, pero no especificará cuales son</li>
    </ol>
    <hr />
    <form action="jugar.php">
        <input type="submit" value="Empezar a jugar">
    </form>
</div>
</div>
</body>
</html>