<?php

//require_once "ConsLibrosModel.php";


class LibroHandlerModel
{

    public static function getLibro($id)
    {
        $libro = null;

        $db = DatabaseModel::getInstance();
        $db_connection = $db->getConnection();

        $valid = self::isValid($id);

        if ($valid === true)
        {

            $query = "SELECT codigo , titulo, numpag FROM libros WHERE codigo=?";
            $prep_query = $db_connection->prepare($query);
            $prep_query->bind_param('s', $id);
            $prep_query->execute();

            $prep_query->bind_result($cod, $tit, $pag);
            while ($prep_query->fetch()) {
                $titulo = utf8_encode($tit);
                $codigo = $cod;
                $paginas = $pag;

                /*$libro.setTitulo($tit);
                $libro.setCodigo($cod);
                $libro.setNumpag($pag);*/
            }
            $prep_query->close();

            $query = "SELECT codigoCapitulo FROM capitulos WHERE codigoLibro = ?";
            $prep_query = $db_connection->prepare($query);
            $prep_query->bind_param('s', $id);
            $prep_query->execute();

            $listaCapitulos = array();
            $prep_query->bind_result($codCap);
            while ($prep_query->fetch()) {
                $codigocapitulo = $codCap;
                $listaCapitulos[] = "/libro/".$id."/capitulo/".$codigocapitulo;
            }

            $libro = new LibroModel($titulo,$codigo,$paginas,$listaCapitulos);
        }
        $db_connection->close();

        return $libro;
    }

    //returns true if $id is a valid id for a book
    //In this case, it will be valid if it only contains
    //numeric characters, even if this $id does not exist in
    // the table of books
    public static function isValid($id)
    {
        $res = false;

        if (ctype_digit($id)) {
            $res = true;
        }
        return $res;
    }


    public static function getCapitulosPorLibro($id)
    {
        $capitulos = null;

        $db = DatabaseModel::getInstance();
        $db_connection = $db->getConnection();

        $valid = self::isValid($id);

        if ($valid === true)
        {

            $query = "SELECT codigoCapitulo , titulo, paginaComienzo, paginaFinal, codigoLibro FROM capitulos WHERE codigoLibro=?";
            $prep_query = $db_connection->prepare($query);
            $prep_query->bind_param('s', $id);
            $prep_query->execute();

            $prep_query->bind_result($codC, $tit, $pagC, $pagF, $codL);
            while ($prep_query->fetch()) {
                $titulo = utf8_encode($tit);
                $codigoC = $codC;
                $paginaC = $pagC;
                $paginaF = $pagF;
                $codigoL = $codL;

                $capitulo = new CapituloModel($codigoC,$titulo,$paginaC,$paginaF,$codigoL);
                $listaCapitulos[] = $capitulo;
            }
        }
        $db_connection->close();

        return $listaCapitulos;
    }


    public static function getCapitulo($idLibro,$idCapitulo)
    {

        $db = DatabaseModel::getInstance();
        $db_connection = $db->getConnection();

        $valid = self::isValid($idLibro);
        $validCap = self::isValid($idCapitulo);

        if ($valid === true && $validCap===true)
        {

            $query = "SELECT codigoCapitulo , titulo, paginaComienzo, paginaFinal, codigoLibro FROM capitulos WHERE codigoLibro=? AND codigoCapitulo=?";
            $prep_query = $db_connection->prepare($query);
            $prep_query->bind_param('ii', $idLibro,$idCapitulo);
            $prep_query->execute();

            $prep_query->bind_result($codC, $tit, $pagC, $pagF, $codL);
            while ($prep_query->fetch()) {
                $titulo = utf8_encode($tit);
                $codigoC = $codC;
                $paginaC = $pagC;
                $paginaF = $pagF;
                $codigoL = $codL;
                $capitulo = new CapituloModel($codigoC,$titulo,$paginaC,$paginaF,$codigoL);
            }
        }
        $db_connection->close();

        return $capitulo;
    }

}