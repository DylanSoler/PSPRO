<?php
/**
 * Created by PhpStorm.
 * User: NitroPC
 * Date: 15/12/2018
 * Time: 20:49
 */

require_once "ConexionBD.php";

class gestionUsuarios
{

    function insertarUsuario($user, $psw) {

        $conBD = ConexionBD::getInstance();
        $conexion = $conBD->getConnection();

        $passw = password_hash($psw,PASSWORD_BCRYPT);

        $stmt = $conexion->prepare("INSERT INTO Usuarios(user,password) VALUES(?,?)");
        $stmt->bind_param('ss',$usu,$psw);

        $usu = $user;
        $psw = $passw;

        $result = $stmt->execute();
        $stmt->close();
        $conBD->closeConnection();

        return $result;
    }

}