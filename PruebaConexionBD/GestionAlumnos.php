<?php
/**
 * Created by PhpStorm.
 * User: dasoler
 * Date: 26/10/18
 * Time: 8:42
 */
require_once "Alumno.php";
require_once "ConexionBD.php";
require_once "Alumnos.php";



class GestionAlumnos{



    function insertarAlumno($alum){

        /*$nombre = "";
        $apellidos = "";
        $direccion = "";
        $telefono = 0;*/


        $instanciaCon = ConexionBD::getInstance();
        $conexionBD = $instanciaCon->getConnection();
        //$mysqli = $conBD->getConnection();

        // Preparamos la sentencia
        $stmt = $conexionBD->prepare("INSERT INTO Alumnos (Nombre, Apellidos, Direccion, Telefono) VALUES (?, ?, ?, ?)");
        // Vinculamos parámetros a variables
        $stmt->bind_param('ssss', $nombre, $apellidos, $direccion, $telefono);
        // Establecemos los parámetros y ejecutamos
        $nombre = $alum->getNombre();
        $apellidos = $alum->getApellidos();
        $direccion = $alum->getDireccion();
        $telefono = $alum->getTelefono();
        $stmt->execute();
        $stmt->close();
        $instanciaCon -> closeConnection();

        /*$nombre = $alum->getNombre();
        $apellidos = $alum->getApellidos();
        $direccion = $alum->getDireccion();
        $telefono = $alum->getTelefono();

        $conBD = ConexionBD::getInstance();
        $mysqli = $conBD->getConnection();
        $sql = "INSERT INTO Alumnos(nombre, apellidos, direccion, telefono) VALUES ($nombre,$apellidos,$direccion,$telefono)";

        if ($mysqli->query($sql) === TRUE) {
            echo "Successfully";
        } else {
            echo "Error: " . $mysqli->error;
        }*/

    }

    function mostrarAlumnos(){

        $conBD = ConexionBD::getInstance();
        $mysqli = $conBD->getConnection();

        $sql= "SELECT ". \Constantes_DB\Alumnos::NOMBRE . " , "
            . \Constantes_DB\Alumnos::APELLIDOS . " , "
            . \Constantes_DB\Alumnos::DIRECCION . " , "
            . \Constantes_DB\Alumnos::TELEFONO . " "
            ." FROM ". \Constantes_DB\Alumnos::TABLE_NAME;

        $result = $mysqli->query($sql);

        return $result;

    }


}