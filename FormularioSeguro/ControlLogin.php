<?php

require_once "GestionUsuarios.php";

//Obtener datos
$usuario = $_POST["user"];
$passw = $_POST["password"];

//Comprobar si esta registrado
    //consulta usuario

//Si ya esta registrado
    //Verificar contraseña
//Si no

    //Insertar en BD
    $gest = new GestionUsuarios();
    $result = $gest->insertarUsuario($usuario,$passw);


    if($result)
    {
        echo 'Registrado';
        echo "Usuario: ".$usu.", Contrasenia hash: ".$psw;
    }
