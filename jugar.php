<?php
require 'funciones.php';

session_start();


//Declaro los colores, podría ser una constante.
$colores = ['Azul', 'Rojo', 'Naranja',
    'Verde', 'Violeta', 'Amarillo',
    'Marrón', 'Rosa'];

//Inicializo variables generales
$fomulario = mostrar_formulario($colores);
$msj = "<h3 class='titulo1'>Sección de información vacía</h3>";
$opciones_juego = "Mostrar clave";



//Leemos / generamos la clave
if (isset($_SESSION['clave']))
    $clave = $_SESSION['clave'];
else {
    $clave = genera_clave($colores);
    $_SESSION['clave'] = $clave;
}


//Analizamos la situación que nos ha traído aquí
switch ($_POST['submit']) {
    case "Mostrar clave":
        $msj = mostrar_clave($clave);
        $opciones_juego = "Ocultar clave";
        break;
    case "Ocultar clave":
        $opciones_juego = "Mostrar clave";
        //Pongo información de la jugada actual
        $msj = "<h3 class='titulo'>Jugadas realizadas </h3>";
        $msj .= mostrar_resultados();
        break;
    case "Jugar":
        //Leo jugada y la evaluamos
        $jugada = leer_jugada();
        $rtdo = compara_jugada($jugada, $clave);
        $msj = mostrar_jugadas($jugada, $rtdo,$pos);
        break;
    case "reiniciar":
        unset($_SESSION);
        session_destroy();
        session_start();
        break;
    default:
        $msj = "<h3 class='titulo1'>Sección de información vacía</h3>";

}//End switch





//controlo el final del juego (=>finJuego.php)

//por get damos información para detectar el motivo de fin de juego
if ((sizeof($_SESSION['jugadas']) >= 14) || ($pos === 4)) {
    header("Location:finJuego.php?pos=$pos");
    exit();
}



?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Juego MasterMind</title>
    <link rel="stylesheet" href="estilo.css" type="text/css"/>
    <script type="text/javascript">
        //Pequeño script del DOM para cambio de color
        function cambia_color(numero) {
            var color = document.getElementById("combinacion" + numero).value;
            var elemento = document.getElementById("combinacion" + numero);
            elemento.className = color;
        }
    </script>
</head>
<body>
<fieldset id="opciones">
    <legend>Opciones de juego</legend>
    <form action="jugar.php" method="POST">
        <input class="opciones" type="submit" value="<?php echo $opciones_juego ?>" name="submit"/>
        <input class="opciones" type="submit" value="reiniciar" name="submit"/>
    </form>

</fieldset>
<fieldset id="informacion">
    <legend>Información de jugadas</legend>
    <?php echo $msj ?>
</fieldset>
>

<fieldset id="jugadas">
    <legend>Juega</legend>
    <?php echo $fomulario ?>
</fieldset>

</body>

</body>
</html>



