<?php

require_once "Controller.php";


class LibroController extends Controller
{
    public function manageGetVerb(Request $request)
    {

        $listaLibros = null;
        $id = null;
        $response = null;
        $code = null;

        //if the URI refers to a libro entity, instead of the libro collection
        //if(isset($request->getQueryString()['numpagMax']))
        if (isset($request->getUrlElements()[2])) {
            $id = $request->getUrlElements()[2];
        }


        $listaLibros = LibroHandlerModel::getLibro($id);

        if ($listaLibros != null) {
            $code = '200';

        } else {

            //We could send 404 in any case, but if we want more precission,
            //we can send 400 if the syntax of the entity was incorrect...
            if (LibroHandlerModel::isValid($id)) {
                $code = '404';
            } else {
                $code = '400';
            }

        }

        $response = new Response($code, null, $listaLibros, $request->getAccept());
        $response->generate();

    }

    public function managePutVerb(Request $request)
    {

        $ok = null;
        $response = null;
        $code = null;
        //$libro = new LibroModel();

        if (isset($request->getUrlElements()[2])) {

            $parametros =(object)$request->getBodyParameters();
            //$parametros = (object) $parametros;
            $libro = new LibroModel($parametros->codigo,$parametros->titulo,$parametros->numpag);

            $ok = LibroHandlerModel::putLibro($libro);

            if ($ok==1) {
                $code = '204';

            } else {

                if (LibroHandlerModel::isValid((String)$request->getUrlElements()[1])) {
                    $code = '404';
                } else{
                        if($request->getFormat()!= "json" || $request->getFormat()!="html")
                            $code = '415';
                }
            }
        }else {
            $code = '400';
        }

        $response = new Response($code, null, null , $request->getAccept());
        $response->generate();

    }

    public function manageDeleteVerb(Request $request)
    {
        $ok = null;
        $response = null;
        $code = null;

        if (isset($request->getUrlElements()[2])) {

            $idLibro = $request->getUrlElements()[2];

            $ok = LibroHandlerModel::deleteLibro($idLibro);

            if($ok==1) {
                $code='204';
            } else {
                $code='404';
            }

        }else {
            $code = '400';
        }

        $response = new Response($code, null, null , $request->getAccept());
        $response->generate();
    }


    public function managePostVerb(Request $request)
    {
        $libroCreated = null;
        $response = null;
        $code = null;
        $body = null;
        $ok = 0;

        if ($request->getFormat()!='html' || $request->getFormat()!='json') {

            $parametros =(object)$request->getBodyParameters();
            $libro = new LibroModel(0,$parametros->titulo,$parametros->numpag);

            $ok = LibroHandlerModel::postLibro($libro);

            if ($ok==1) {
                $code = '201';

            }else{
                $code = '400';
            }

        }else {
            $code = '415';
        }

        $response = new Response($code, null, null , $request->getAccept());
        $response->generate();

    }


}