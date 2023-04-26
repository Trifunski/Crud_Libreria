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
                <h1>Listado de libros: </h1>
                <br>
                <table class='table table-striped'>
                    <thead>
                        <tr>
                            <th>ISBN</th>
                            <th>Título</th>
                            <th>Escritores</th>
                            <th>Género</th>
                            <th>Número Paginas</th>
                            <th>Portada</th>
                            <th>Precio</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $id = $_GET['id'];

                        $bibliotecaLibros = new Biblioteca_libros();
                        $listadoLibros = $bibliotecaLibros->obtenerListadoBibliotecaLibros($id);

                        foreach ($listadoLibros as $libro) {
                            echo "<tr>
                                <th>" . $libro->getIsbn() . "</th>
                                <th>" . $libro->getTitulo() . "</th>
                                <th>" . $libro->getEscritores() . "</th>
                                <th>" . $libro->getGenero() . "</th>
                                <th>" . $libro->getNumPaginas() . "</th>
                                <th><img src=../../" . $libro->getImagen() . " width='70' height='100'></th>
                                <th>" . $libro->getPrecio() . "€</th>
                            </tr>";
                        }
                        ?>
                    </tbody>
                </table>

                <br>
                
                <a href="../../vista/biblioteca/bibliotecas.php"><button class="btn btn-primary">Bibliotecas</button></a>
            </div>
        </div>
    </body>

</html>