<!DOCTYPE html>
<html>

<?php
include "../../componentes/head.php";
require "../../modelo/biblioteca.php";
?>

<body>
    <div class="container-fluid">
        <div class="jumbotron">
            <h1>Crear nueva Biblioteca: </h1>
            <br>

            <?php

            if (
                isset($_POST['nombre']) 
                && isset($_POST['descripcion']) 
                && isset($_POST['estado'])
            ) {
                $nombre = $_POST['nombre'];
                $descripcion = $_POST['descripcion'];
                $estado = $_POST['estado'];

                $biblioteca = new Biblioteca();
                $biblioteca->setNombre($nombre);
                $biblioteca->setDescripcion($descripcion);
                $biblioteca->setEstado($estado);
                echo $biblioteca->insertarBiblioteca();
            }

            ?>
            <form action="insertar_biblioteca.php" method="post">
                
                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" class="form-control" name="nombre" required>
                </div>

                <div class="form-group">
                    <label>Descripción</label>
                    <input type="text" class="form-control" name="descripcion" required>
                </div>

                <div class="form-group">
                    <label>Estado</label>
                    <select class="custom-select" name="estado" required>
                        <option>Elegir Estado...</option>
                        <option value="Activo">Activo</option>
                        <option value="Inactivo">Inactivo</option>
                    </select>
                </div>


                <button type="submit" class="btn btn-primary">Crear Biblioteca</button>
            </form>
            <br>
            <a href="bibliotecas.php"><button>Volver al listado</button></a>
        </div>
    </div>
</body>

</html>