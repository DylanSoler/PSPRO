<?php
/**
 * Created by PhpStorm.
 * User: dasoler
 * Date: 26/10/18
 * Time: 8:30
 */
class Alumno{

    private $nombre;
    private $apellidos;
    private $direccion;
    private $telefono;

    public function __construct($nomb,$apell,$direc,$tlf) {

        $this->nombre = $nomb;
        $this->apellidos = $apell;
        $this->direccion = $direc;
        $this->telefono = $tlf;

    }


    /**
     * @return mixed
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * @param mixed $nombre
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    /**
     * @return mixed
     */
    public function getApellidos()
    {
        return $this->apellidos;
    }

    /**
     * @param mixed $apellidos
     */
    public function setApellidos($apellidos)
    {
        $this->apellidos = $apellidos;
    }

    /**
     * @return mixed
     */
    public function getDireccion()
    {
        return $this->direccion;
    }

    /**
     * @param mixed $direccion
     */
    public function setDireccion($direccion)
    {
        $this->direccion = $direccion;
    }

    /**
     * @return mixed
     */
    public function getTelefono()
    {
        return $this->telefono;
    }

    /**
     * @param mixed $telefono
     */
    public function setTelefono($telefono)
    {
        $this->telefono = $telefono;
    }



}