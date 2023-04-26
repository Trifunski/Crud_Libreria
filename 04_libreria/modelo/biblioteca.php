<?php

require "bd.php";

class Biblioteca {
    
    private $db;
    private $id;
    private $nombre;
    private $descripcion;
    private $NLibros;
    private $estado;

    function __construct() {
        $bd = new bd();
        $this->db = $bd->conectarBD();
    }

    function obtenerListadoBibliotecas() {
        try {

            $querySelect = "SELECT DISTINCT id, nombre, descripcion, estado FROM bibliotecas";
            $listaBibliotecas = $this->db->prepare($querySelect);

            $listaBibliotecas->execute();

            if ($listaBibliotecas) {
                return $listaBibliotecas->fetchAll(PDO::FETCH_CLASS, "biblioteca");
            } else {
                echo "Ocurrió un error inesperado al obtener el Listado de Bibliotecas";
            }
        } catch (Exception $ex) {
            echo "Ocurrió un error: " . $ex->getMessage();
            return null;
        }
    }

    function insertarBiblioteca() {
        try {
            $queryInsertar = "INSERT INTO bibliotecas (nombre, descripcion, estado)
                                  VALUES (:nombre, :descripcion, :estado)";
            $instanciaDB = $this->db->prepare($queryInsertar);

            $instanciaDB->bindParam(":nombre", $this->nombre);
            $instanciaDB->bindParam(":descripcion", $this->descripcion);
            $instanciaDB->bindParam(":estado", $this->estado);

            $instanciaDB->execute();

            if ($instanciaDB) {
                echo "Biblioteca insertada correctamente";
                header("Location:bibliotecas.php");
            } else {
                echo "Ocurrió un error inesperado al insertar la biblioteca";
            }
        } catch (Exception $ex) {
            echo "Ocurrió un error: " . $ex->getMessage();
            return false;
        }
    } 

    function obtenerBiblioteca() {
        try {
            $querySelect = "SELECT * FROM bibliotecas WHERE id=:id";
            $instanciaDB = $this->db->prepare($querySelect);

            $instanciaDB->bindParam(":id", $this->id);

            $instanciaDB->execute();

            if ($instanciaDB) {
                return $instanciaDB->fetchAll(PDO::FETCH_CLASS, "biblioteca")[0];
            } else {
                echo "Ocurrió un error inesperado al obtener la biblioteca";
            }
        } catch (Exception $ex) {
            echo "Ocurrió un error: " . $ex->getMessage();
            return null;
        }
    }

    function actualizarBiblioteca() {
        try {
            $queryActualizar = "UPDATE bibliotecas SET nombre=:nombre, descripcion=:descripcion, estado=:estado WHERE id=:id";
            $instanciaDB = $this->db->prepare($queryActualizar);

            $instanciaDB->bindParam(":id", $this->id);
            $instanciaDB->bindParam(":nombre", $this->nombre);
            $instanciaDB->bindParam(":descripcion", $this->descripcion);
            $instanciaDB->bindParam(":estado", $this->estado);

            $instanciaDB->execute();

            if ($instanciaDB) {
                echo "Biblioteca actualizada correctamente";
                header("Location:bibliotecas.php");
            } else {
                echo "Ocurrió un error inesperado al actualizar la biblioteca";
            }
        } catch (Exception $ex) {
            echo "Ocurrió un error: " . $ex->getMessage();
            return false;
        }
    }

    function eliminarBiblioteca($id) {
        try {
            $queryEliminar = "DELETE FROM bibliotecas WHERE id=:id";
            $instanciaDB = $this->db->prepare($queryEliminar);

            $instanciaDB->bindParam(":id", $id);

            $instanciaDB->execute();

            if ($instanciaDB) {
                echo "Biblioteca eliminada correctamente";
                header("Location:bibliotecas.php");
            } else {
                echo "Ocurrió un error inesperado al eliminar la biblioteca";
            }
        } catch (Exception $ex) {
            echo "Ocurrió un error: " . $ex->getMessage();
            return false;
        }
    }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setDescripcion($descripcion) {
        $this->descripcion = $descripcion;
    }

    public function setEstado($estado) {
        $this->estado = $estado;
    }   

}

?>