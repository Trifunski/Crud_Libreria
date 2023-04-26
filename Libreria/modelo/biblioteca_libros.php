<?php

require_once "bd.php";

class Biblioteca_libros {
    
    private $db;
    private $id;
    private $idBiblioteca;
    private $idLibro;

    function __construct() {
        $bd = new bd();
        $this->db = $bd->conectarBD();
    }

    function obtenerListadoBibliotecaLibros($id) {
        try {

            $querySelect = "SELECT libros.isbn, libros.titulo, libros.escritores, libros.genero, libros.numpaginas, libros.imagen, libros.precio FROM biblioteca_libros JOIN libros ON biblioteca_libros.idLibro = libros.isbn WHERE biblioteca_libros.idBiblioteca = :id";
            $listaBibliotecaLibros = $this->db->prepare($querySelect);

            $listaBibliotecaLibros->bindParam(":id", $id);

            $listaBibliotecaLibros->execute();

            if ($listaBibliotecaLibros) {
                return $listaBibliotecaLibros->fetchAll(PDO::FETCH_CLASS, "Libro");
            } else {
                echo "Ocurrió un error inesperado al obtener el Listado de BibliotecaLibros";
            }
        } catch (Exception $ex) {
            echo "Ocurrió un error: " . $ex->getMessage();
            return null;
        }
    }

    function insertarBibliotecaLibros() {
        try {
            $queryInsertar = "INSERT INTO biblioteca_libros (idBiblioteca, idLibro)
                                  VALUES (:idBiblioteca, :idLibro)";
            $instanciaDB = $this->db->prepare($queryInsertar);

            $instanciaDB->bindParam(":idBiblioteca", $this->idBiblioteca);
            $instanciaDB->bindParam(":idLibro", $this->idLibro);

            $instanciaDB->execute();

            if ($instanciaDB) {
                echo "Libro insertado correctamente";
                header("Location:bibliotecas.php");
            } else {
                echo "Ocurrió un error inesperado al insertar la biblioteca_libros";
            }
        } catch (Exception $ex) {
            echo "Ocurrió un error: " . $ex->getMessage();
            return false;
        }
    }

    function eliminarBibliotecaLibros() {
        try {
            $queryEliminar = "DELETE FROM biblioteca_libros WHERE id = :id";
            $instanciaDB = $this->db->prepare($queryEliminar);

            $instanciaDB->bindParam(":id", $this->id);

            $instanciaDB->execute();

            if ($instanciaDB) {
                echo "BibliotecaLibros eliminada correctamente";
                header("Location:biblioteca_libros.php");
            } else {
                echo "Ocurrió un error inesperado al eliminar la biblioteca_libros";
            }
        } catch (Exception $ex) {
            echo "Ocurrió un error: " . $ex->getMessage();
            return false;
        }
    }

    function modificarBibliotecaLibros() {
        try {
            $queryModificar = "UPDATE biblioteca_libros SET idBiblioteca = :idBiblioteca, idLibro = :idLibro WHERE id = :id";
            $instanciaDB = $this->db->prepare($queryModificar);

            $instanciaDB->bindParam(":id", $this->id);
            $instanciaDB->bindParam(":idBiblioteca", $this->idBiblioteca);
            $instanciaDB->bindParam(":idLibro", $this->idLibro);

            $instanciaDB->execute();

            if ($instanciaDB) {
                echo "BibliotecaLibros modificada correctamente";
                header("Location:biblioteca_libros.php");
            } else {
                echo "Ocurrió un error inesperado al modificar la biblioteca_libros";
            }
        } catch (Exception $ex) {
            echo "Ocurrió un error: " . $ex->getMessage();
            return false;
        }
    }

    public function getCantidad($id) {
        $queryCont = "SELECT COUNT(*) as total FROM biblioteca_libros WHERE idbiblioteca = :id";
        $instanciaDB = $this->db->prepare($queryCont);

        $instanciaDB->bindParam(":id", $id);

        $instanciaDB->execute();

        if ($instanciaDB) {
            $cantidad = $instanciaDB->fetch(PDO::FETCH_ASSOC);
            return $cantidad["total"];
        } else {
            echo "Ocurrió un error inesperado al modificar la biblioteca_libros";
        }

        return null;

    }

    public function getId() {
        return $this->id;
    }
    
    public function getIdBiblioteca() {
        return $this->idBiblioteca;
    }

    public function getIdLibro() {
        return $this->idLibro;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setIdBiblioteca($idBiblioteca) {
        $this->idBiblioteca = $idBiblioteca;
    }

    public function setIdLibro($idLibro) {
        $this->idLibro = $idLibro;
    }

}

?>