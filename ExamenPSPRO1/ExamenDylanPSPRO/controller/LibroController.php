<?php

require_once "Controller.php";


class LibroController extends Controller
{
    public function manageGetVerb(Request $request)
    {

        $body = null;
        $libro = null;
        $id = null;
        $response = null;
        $code = null;


        if (isset($request->getUrlElements()[4])) {

            $id = $request->getUrlElements()[2];

            $idCap = $request->getUrlElements()[4];

            $capituloConcreto = LibroHandlerModel::getCapitulo($id,$idCap);

            $body = $capituloConcreto;
        }

        else
        {
            if(isset($request->getUrlElements()[3])) {

                $id = $request->getUrlElements()[2];

                $listaCapitulos = array();

                $listaCapitulos = LibroHandlerModel::getCapitulosPorLibro($id);

                $body = $listaCapitulos;

            }

            else{
                        $id = $request->getUrlElements()[2];

                        $libro = LibroHandlerModel::getLibro($id);

                        $body = $libro;
                }
            }


        if ($body != null) {
            $code = '200';

        } else {

            if (LibroHandlerModel::isValid($id)) {
                $code = '404';
            } else {
                $code = '400';
            }

        }

        $response = new Response($code, null, $body, $request->getAccept());
        $response->generate();

    }

}