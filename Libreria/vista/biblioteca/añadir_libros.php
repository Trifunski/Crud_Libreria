<!DOCTYPE html>
<html lang="es">

    <?php
        include "../../componentes/head.php"; 
        require "../../modelo/biblioteca_libros.php";
        require "../../modelo/biblioteca.php";
        require "../../modelo/libro.php";
    ?>

    <body>

    <div class="container-fluid">
        <div class="jumbotron">
            <h1>Añadir libro a biblioteca: </h1>
            <br>

            <?php

            if (
                isset($_POST['idbiblioteca'])
                && isset($_POST['idlibro'])
            ) {
                $id = $_POST['idbiblioteca'];
                $libro = $_POST['idlibro'];

                
                $bibliotecas = new Biblioteca_libros();

                $bibliotecas->setIdBiblioteca($id);
                $bibliotecas->setIdLibro($libro);
                
                echo $bibliotecas->insertarBibliotecaLibros();
            }

            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $idBiblioteca = $_GET['id'];
                $bibliotecas = new Biblioteca();
                $bibliotecas->setId($idBiblioteca);
                $biblioteca = $bibliotecas->obtenerBiblioteca();            
            }

            $libros = new Libro();
            $listaLibros = $libros->obtenerListadoLibros();

            ?>
        
            <form class="" action="añadir_libros.php" method="POST">
                    <div class="form-group">
                        <label>Id</label>
                        <input type="text" class="form-control" name="idbiblioteca" value="<?php echo $biblioteca->getId(); ?>" readonly>  
                    </div>

                    <div class="form-group">
                        <label>Libros</label>
                        <select class="form-control" name="idlibro" multiple>
                            <?php
                                foreach ($listaLibros as $libro) {
                                    echo "<option value='".$libro->getIsbn()."'>".$libro->getTitulo()."</option>";
                                }
                            ?>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Añadir</button>
            </form>

            <br>
            <a href="bibliotecas.php?id=<?php echo $biblioteca->getId(); ?>" class="btn btn-primary">Volver</a>
        </div>
    </div>



    </body>

</html>