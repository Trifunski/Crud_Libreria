<!DOCTYPE html>
<html lang="es">

    <?php
        include "../../componentes/head.php";
        require "../../modelo/biblioteca.php";
        require "../../modelo/biblioteca_libros.php";
        require "../../modelo/libro.php";
    ?>

    <body>
        <div class="container-fluid">
            <div class="jumbotron">
                <h1>Listado de bibliotecas: </h1>
                <br>
                <table class='table table-striped'>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>NºLibros</th>
                            <th>Estado</th>
                            <th>Operaciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                            $biblioteca = new Biblioteca();
                            $bibliotecas = $biblioteca->obtenerListadoBibliotecas();

                            $biblioteca_libros = new Biblioteca_libros();

                            foreach ($bibliotecas as $biblioteca) {

                                $id = $biblioteca->getId();

                                $cantidad_libros = $biblioteca_libros->getCantidad($id);

                                echo "<tr>
                                        <th>" . $biblioteca->getId() . "</th>
                                        <th>" . $biblioteca->getNombre() . "</th>
                                        <th>" . $biblioteca->getDescripcion() . "</th>
                                        <th>" . $cantidad_libros . "</th>";
                                        echo "<th>" . $biblioteca->getEstado() . "</th>";

                                        if ($biblioteca->getEstado() == "Activo") {
                                           echo "<th>
                                                    <a href=añadir_libros.php?id=" . $biblioteca->getId() . "><button>Añadir Libros</button></a>
                                                    <a href=ver_libros.php?id=" . $biblioteca->getId() . "><button>Ver Libros</button></a>
                                                    <a href=editar_biblioteca.php?id=" . $biblioteca->getId() . "><button>Editar Biblioteca</button></a>
                                                    <a href=borrar_biblioteca.php?id=" . $biblioteca->getId() . "><button>Borrar Biblioteca</button></a>
                                                    <a href=comprar_biblioteca.php?id=" . $biblioteca->getId() . "><button>Comprar Biblioteca</button></a>
                                                </th>";
                                        } else if ($biblioteca->getEstado() == "Inactivo") {
                                           echo "<th>
                                                    <a href=ver_libros.php?id=" . $biblioteca->getId() . "><button>Ver Libros</button></a>
                                                    <a href=editar_biblioteca.php?id=" . $biblioteca->getId() . "><button>Editar Biblioteca</button></a>
                                                    <a href=borrar_biblioteca.php?id=" . $biblioteca->getId() . "><button>Borrar Biblioteca</button></a>
                                                </th>";
                                        } else if ($biblioteca->getEstado() == "Comprado") {
                                            echo "<th>
                                                    <p>Ya has adquirido esta Biblioteca</p>
                                                    <a href=ver_librosComprados.php?id=" . $biblioteca->getId() . "><button>Editar Biblioteca</button></a>
                                                </th>";
                                        }
                                        
                                echo "</tr>";
                            }                      

                        ?>
                    </tbody>
                </table>

                <br>
                <a href="insertar_biblioteca.php"><button class="btn btn-primary">Nueva Biblioteca</button></a>
                <a href="../../index.php"><button class="btn btn-primary">Volver</button></a>
            </div>
        </div> 
    </body>

</html>