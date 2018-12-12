<?php

/**
 * Created by PhpStorm.
 * User: dasoler
 * Date: 15/10/18
 * Time: 10:15
 */

/**
 * Class Texto
 *
 * Descripcion: permite realizar operaciones con un texto
 *
 * Propiedades: text
 */

class Texto
{
    private $text;

    /**
     * Texto constructor.
     * @param $texto
     */
    function __construct($texto) {
        $this->text = $texto;
    }

    /**
     * @param $new_text
     */
    function set_text($new_text) {
        $this->text = $new_text;
    }

    /**
     * @return mixed
     */
    function get_text() {
        return $this->text;
    }

    /**
     * Metodo que devuelve el numero de veces que aparece una palabra en el Texto
     * @param $palabra
     */
    public function aparicionesPalabra($palabra){


         $apariciones = substr_count($this->text,$palabra);

         return $apariciones;
    }

    /**
     * Metodo que devuelve las posiciones en las que aparece una palabra
     * @param $palabra
     */
    public function posicionesPalabra($palabra){

        $posActual = 0;
        $posiciones = "";

        while($posActual<strlen($this->text)) {
            $posiciones = $posiciones.", ".stripos($this->text, $palabra);
            $posActual++;
        }

        return $posiciones;

    }

    /**
     * Metodo que sustituye una palabra por otra
     * @param $palabraBuscada
     * @param $palabraSustituta
     */
    public function sustituirPalabra($palabraBuscada, $palabraSustituta){

        $text2 = $this->text.str_replace($palabraBuscada, $palabraSustituta, $this->get_text());

        return text2;
    }


    /**
     * Metodo que sustituye la palabra de una posicion concreta
     * @param $posicion
     * @param $palabraSustituta
     */
    public function sustituirPalabraPorPosicion($posicionX, $posicionY){

        str_replace($this->text[$posicionX], $this->text[$posicionY]);


    }

}



