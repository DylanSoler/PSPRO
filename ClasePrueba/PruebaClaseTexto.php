<html>

<head></head>

<body>

    <?php require_once "Texto.php"; ?>

    <?php
        $texto = new Texto("Prueba de la clase Texto");
        echo "get_text() -> ".$texto->get_text();
        echo "<br/>";

        $texto->set_text("Probando la clase Texto. clase");
        echo "set_text() -> ",$texto->get_text();
        echo "<br/>";

        $apariciones = $texto->aparicionesPalabra("clase");
        echo "La palabra clase aparece: ".$apariciones;
        echo "<br/>";
    ?>




</body>

</html>