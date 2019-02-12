    <?php
        require_once("funciones.php");
        session_start();


        $clave = $_SESSION['clave'];

        //Leo el parámetro que me marca cuantas posiciones he acertado
        //Si este valor es 4 es que lo he acertado, si no es que estoy aquí
        //Porque ya he realizado el número de intentos máximos
        $pos = $_GET['pos'];


        //Me quedo con la jugada realizada (número de jugadas que es el tamaño del array)
        $jugadas = sizeof($_SESSION['jugadas']) - 1;

        //genero el mensaje a mostrar
        if ($pos == 4)
          $msj = "<h1>FELICIDADES ADIVINASTE LA CLAVE en " . ($jugadas + 1) . " JUGADAS<h1>";
        else
          $msj = "<h1>DEMASIADOS INTENTOS.... PRUEBA DE NUVEO<h1>";


        //Por curiosidad muestro el histórico de jugadas  y la clave
        $msj.="<h2>Valor de la clave: </h2>" . mostrar_clave($clave) . "<br />";
        for ($i = $jugadas; $i >=0; $i--) {
          $msj.="<br /><br /><h2>Valor de la jugada $i :</h2><br />" . mostrar_valor_jugada($_SESSION['jugadas'][$i]) . "<br />";
        }
?>
<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
        <link rel="stylesheet" href="estilo.css" type="text/css">
    </head>
    <body>
    <?php echo  "<div id = 'final'>$msj</div>"?>
    </body>
</html>
