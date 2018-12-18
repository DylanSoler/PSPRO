<?php

require_once "GestionUsuarios.php";

//Obtener datos
$usuario = $_POST["user"];
$passw = $_POST["password"];

$gest = new GestionUsuarios();

//Comprobar si esta registrado
    //consulta usuario
    $existe = $gest->consultarUsuario($usuario);

//Si ya esta registrado
if ($existe) {
    //Verificar contraseña
    echo'hola k ase';
}
//Si no
else {
    //Insertar en BD
    $result = $gest->insertarUsuario($usuario,$passw);

    if($result) {
        echo 'Registrado';
    }
}
