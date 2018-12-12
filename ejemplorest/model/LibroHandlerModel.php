<?php

require_once "ConsLibrosModel.php";


class LibroHandlerModel
{

    public static function getLibro($id)
    {
        $listaLibros = null;

        $db = DatabaseModel::getInstance();
        $db_connection = $db->getConnection();


        //IMPORTANT: we have to be very careful about automatic data type conversions in MySQL.
        //For example, if we have a column named "cod", whose type is int, and execute this query:
        //SELECT * FROM table WHERE cod = "3yrtdf"
        //it will be converted into:
        //SELECT * FROM table WHERE cod = 3
        //That's the reason why I decided to create isValid method,
        //I had problems when the URI was like libro/2jfdsyfsd

        $valid = self::isValid($id);

        //If the $id is valid or the client asks for the collection ($id is null)
        if ($valid === true || $id == null) {
            $query = "SELECT " . \ConstantesDB\ConsLibrosModel::COD . ","
                . \ConstantesDB\ConsLibrosModel::TITULO . ","
                . \ConstantesDB\ConsLibrosModel::PAGS . " FROM " . \ConstantesDB\ConsLibrosModel::TABLE_NAME;


            if ($id != null) {
                $query = $query . " WHERE " . \ConstantesDB\ConsLibrosModel::COD . " = ?";
            }

            $prep_query = $db_connection->prepare($query);

            //IMPORTANT: If we do not want to expose our primary keys in the URIS,
            //we can use a function to transform them.
            //For example, we can use hash_hmac:
            //http://php.net/manual/es/function.hash-hmac.php
            //In this example we expose primary keys considering pedagogical reasons

            if ($id != null) {
                $prep_query->bind_param('s', $id);
            }

            $prep_query->execute();
            $listaLibros = array();

            //IMPORTANT: IN OUR SERVER, I COULD NOT USE EITHER GET_RESULT OR FETCH_OBJECT,
            // PHP VERSION WAS OK (5.4), AND MYSQLI INSTALLED.
            // PROBABLY THE PROBLEM IS THAT MYSQLND DRIVER IS NEEDED AND WAS NOT AVAILABLE IN THE SERVER:
            // http://stackoverflow.com/questions/10466530/mysqli-prepared-statement-unable-to-get-result

            if ($id != null) {

                $prep_query->bind_result($cod, $tit, $pag);
                while ($prep_query->fetch()) {
                    $tit = utf8_encode($tit);
                    $listaLibros = new LibroModel($cod, $tit, $pag);

                }

            }else{

                $prep_query->bind_result($cod, $tit, $pag);
                while ($prep_query->fetch()) {
                    $tit = utf8_encode($tit);
                    $libro = new LibroModel($cod, $tit, $pag);
                    $listaLibros[] = $libro;
                }

            }



//            $result = $prep_query->get_result();
//            for ($i = 0; $row = $result->fetch_object(LibroModel::class); $i++) {
//
//                $listaLibros[$i] = $row;
//            }
        }
        $db_connection->close();

        return $listaLibros;
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

    public static function putLibro($libro)
    {

        $db = DatabaseModel::getInstance();
        $db_connection = $db->getConnection();

        $ok=0;

        $valid = self::isValid((String)$libro->getCodigo());

        //If the $id is valid or the client asks for the collection ($id is null)
        if ($valid === true && $libro->getTitulo() != null && $libro->getNumpag() != null) {
            /*$update = "UPDATE " . \ConstantesDB\ConsLibrosModel::TABLE_NAME . " SET "
                . \ConstantesDB\ConsLibrosModel::TITULO ."= ? ,"
                . \ConstantesDB\ConsLibrosModel::COD ."= ? ,"
                . \ConstantesDB\ConsLibrosModel::PAGS ."= ? , WHERE " . \ConstantesDB\ConsLibrosModel::COD."= ?";*/

            $s = "update libros set titulo=?,numpag=? where codigo=?";
            $prep_update = $db_connection->prepare($s);
            $tit = $libro->getTitulo();
            $numpg = $libro->getNumpag();
            $cod = $libro->getCodigo();
            $prep_update->bind_param('sii', $tit,$numpg,$cod);

            $prep_update->execute();

            $ok = $prep_update->affected_rows;

        }
        $db_connection->close();

        return $ok;
    }


    public static function deleteLibro($idlibro)
    {

        $db = DatabaseModel::getInstance();
        $db_connection = $db->getConnection();

        $ok=0;

        $valid = self::isValid((String)$idlibro);

        if ($valid === true) {

            $s = "delete from libros where codigo=?";
            $prep_delete = $db_connection->prepare($s);
            $prep_delete->bind_param('i', $idlibro);

            $prep_delete->execute();

            $ok = $prep_delete->affected_rows;

        }
        $db_connection->close();

        return $ok;
    }


    public static function postLibro($libro)
    {

        $db = DatabaseModel::getInstance();
        $db_connection = $db->getConnection();

        $s = "insert into libros(titulo,numpag) VALUES (?,?)";
        $prep_insert = $db_connection->prepare($s);
        $titulo = $libro->getTitulo();
        $numpaginas = $libro->getNumpag();
        $prep_insert->bind_param('si', $titulo, $numpaginas);

        $prep_insert->execute();
        $ok = $prep_insert->affected_rows;

        $db_connection->close();

        return $ok;
    }

}