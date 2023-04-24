<!DOCTYPE html>
<html lang="es">

    <?php
    include "componentes/head.php";
    require "modelo/libro.php";
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
                            <th>Precio</th>
                            <th>Portada</th>
                            <th>Operaciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $libros = new Libro();
                        $listadoLibros = $libros->obtenerListadoLibros();

                        foreach ($listadoLibros as $libro) {
                            echo "<tr>
                    <th>" . $libro->getIsbn() . "</th>
                    <th>" . $libro->getTitulo() . "</th>
                    <th>" . $libro->getEscritores() . "</th>
                    <th>" . $libro->getGenero() . "</th>
                    <th>" . $libro->getNumPaginas() . "</th>
                    <th>" . $libro->getPrecio() . "€</th>
                    <th><img src=" . $libro->getImagen() . " width='70' height='100'></th>

                    <th>
                        <a href=editar.php?isbn=" . $libro->getIsbn() . "><button>Editar</button></a>
                        <a href=borrar.php?isbn=" . $libro->getIsbn() . "><button>Borrar</button></a>
                    </th>
                </tr>";
                        }
                        ?>
                    </tbody>
                </table>

                <br>
                <a href="insertar.php"><button class="btn btn-primary">Nuevo Libro</button></a>
                <a href="bibliotecas.php"><button class="btn btn-primary">Bibliotecas</button></a>
            </div>
        </div>
    </body>

</html>