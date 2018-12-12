<html>
<body>

Nombre: <?php echo $_POST["nombre"]; ?><br>
Edad: <?php echo $_POST["edad"]; ?><br>
Sexo: <?php echo $_POST["sexo"];?><br>
Comentarios: <?php echo $_POST["comentarios"];?><br>

<!--Color, recoger valor radiobtn y cambiar color-->
<?php
    if($_POST["sexo"]=="Hombre") {
        echo '<body style="background-color:dodgerblue">';
    }else{
        echo '<body style="background-color:lightyellow">';
    }

?>


</body>
</html>
