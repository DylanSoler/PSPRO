<?php
/**
 * Created by PhpStorm.
 * User: NitroPC
 * Date: 27/10/2018
 * Time: 21:01
 */

require_once "ConexionBD.php";
require_once "Alumno.php";
require_once "GestionAlumnos.php";


$nomb = $_POST["nombre"];
$apell = $_POST["apellidos"];
$dir = $_POST["direccion"];
$tlf = $_POST["telefono"];

$alum = new Alumno($nomb,$apell,$dir,$tlf);

$gestAlum = new GestionAlumnos();

$gestAlum->insertarAlumno($alum);

$totalAlumnos = $gestAlum->mostrarAlumnos();

if ($totalAlumnos->num_rows > 0) {
    echo '<table border=\"1\">';
    echo '<tr>';
    echo '<td>' . \Constantes_DB\Alumnos::NOMBRE . '</td>';
    echo '<td>' . \Constantes_DB\Alumnos::APELLIDOS . '</td>';
    echo '<td>' . \Constantes_DB\Alumnos::DIRECCION . '</td>';
    echo '<td>' . \Constantes_DB\Alumnos::TELEFONO . '</td>';
    echo '</tr>';
    // output data of each row
    while ($row = $totalAlumnos->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . $row[\Constantes_DB\Alumnos::NOMBRE] . '</td>';
        echo '<td>' . $row[\Constantes_DB\Alumnos::APELLIDOS] . '</td>';
        echo '<td>' . $row[\Constantes_DB\Alumnos::DIRECCION] . '</td>';
        echo '<td>' . $row[\Constantes_DB\Alumnos::TELEFONO] . '</td>';
        echo '</tr>';
    }
    echo '</table>';
}


