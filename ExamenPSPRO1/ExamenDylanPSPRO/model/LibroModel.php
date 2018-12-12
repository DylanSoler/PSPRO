<?php


class LibroModel implements JsonSerializable
{
    private $titulo;
    private $codigo;
    private $numpag;
    private $capitulos;



    public function __construct($cod,$tit,$pag,$capitulos)
    {
        $this->codigo=$cod;
        $this->titulo=$tit;
        $this->numpag=$pag;
        $this->capitulos=$capitulos;
    }


    /**
     * Specify data which should be serialized to JSON
     * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */

    //Needed if the properties of the class are private.
    //Otherwise json_encode will encode blank objects
    function jsonSerialize()
    {
        return array(
            'titulo' => $this->titulo,
            'codigo' => $this->codigo,
            'numpag' => $this->numpag,
            'capitulos' => $this->capitulos
        );
    }

    public function __sleep(){
        return array('titulo' , 'codigo' , 'numpag', 'capitulos' );
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
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * @param mixed $codigo
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }

    /**
     * @return mixed
     */
    public function getNumpag()
    {
        return $this->numpag;
    }

    /**
     * @param mixed $numpag
     */
    public function setNumpag($numpag)
    {
        $this->numpag = $numpag;
    }

    /**
     * @return mixed
     */
    public function getCapitulos()
    {
        return $this->capitulos;
    }

    /**
     * @param mixed $capitulos
     */
    public function setCapitulos($capitulos)
    {
        $this->capitulos = $capitulos;
    }



}