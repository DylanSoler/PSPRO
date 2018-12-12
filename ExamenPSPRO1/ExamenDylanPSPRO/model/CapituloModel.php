<?php

/**
 * Created by PhpStorm.
 * User: dasoler
 * Date: 30/11/18
 * Time: 10:00
 */
class CapituloModel implements JsonSerializable
{
    private $codigoCapitulo;
    private $titulo;
    private $paginaComienzo;
    private $paginaFinal;
    private $codigoLibro;

    /**
     * CapituloModel constructor.
     * @param $titulo
     * @param $paginaComienzo
     * @param $paginaFinal
     * @param $codigoLibro
     */
    public function __construct($codigoCapitulo,$titulo, $paginaComienzo, $paginaFinal, $codigoLibro)
    {
        $this->codigoCapitulo = $codigoCapitulo;
        $this->titulo = $titulo;
        $this->paginaComienzo = $paginaComienzo;
        $this->paginaFinal = $paginaFinal;
        $this->codigoLibro = $codigoLibro;
    }

    /**
     * @return mixed
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * @param mixed $titulo
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    /**
     * @return mixed
     */
    public function getPaginaComienzo()
    {
        return $this->paginaComienzo;
    }

    /**
     * @param mixed $paginaComienzo
     */
    public function setPaginaComienzo($paginaComienzo)
    {
        $this->paginaComienzo = $paginaComienzo;
    }

    /**
     * @return mixed
     */
    public function getPaginaFinal()
    {
        return $this->paginaFinal;
    }

    /**
     * @param mixed $paginaFinal
     */
    public function setPaginaFinal($paginaFinal)
    {
        $this->paginaFinal = $paginaFinal;
    }

    /**
     * @return mixed
     */
    public function getCodigoLibro()
    {
        return $this->codigoLibro;
    }

    /**
     * @param mixed $codigoLibro
     */
    public function setCodigoLibro($codigoLibro)
    {
        $this->codigoLibro = $codigoLibro;
    }


    function jsonSerialize()
    {
        return array(

            'codigoCapitulo' => $this->codigoCapitulo,
            'titulo' => $this->titulo,
            'paginaComienzo'=>$this->paginaComienzo,
            'paginaFinal'=>$this->paginaFinal,
            'codigoLibro' => $this->codigoLibro
        );
    }

}