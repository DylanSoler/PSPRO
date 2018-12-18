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

        $stmt = $conexion->prepare("INSERT INTO Usuarios(UserName,Password) VALUES(?,?)");
        $stmt->bind_param('ss',$usu,$psw);

        $usu = $user;
        $psw = $passw;

        $result = $stmt->execute();
        $stmt->free_result();
        $stmt->close();
        $conBD->closeConnection();

        return $result;
    }

    function  consultarUsuario($user){

        $ret = false;

        $conBD = ConexionBD::getInstance();
        $conexion = $conBD->getConnection();

        $stmt = $conexion->prepare("SELECT * FROM Usuarios WHERE UserName=?");
        $stmt->bind_param('s',$user);
        $stmt->store_result();



        $stmt->execute();

        if($stmt->affected_rows>0)
        {
            $ret = true;
        }
        $stmt->free_result();
        $stmt->close();
        $conBD->closeConnection();

        return $ret;

    }



}