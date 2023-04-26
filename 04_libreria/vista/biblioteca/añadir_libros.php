<!DOCTYPE html>
<html lang="es">

    <?php
        include "../../componentes/head.php";
        require "../../modelo/genero.php";
        require "../../modelo/libro.php";    
    ?>

    <body>

    <div class="container-fluid">
        <div class="jumbotron">
            <h1>Crear nuevo Libro: </h1>
            <br>
        
            <form class="" action="añadir_libros.php" method="POST">
                    <div class="form-group">
                        <label>Titulo</label>
                        <input type="text" class="form-control" name="titulo">      
                    </div>
                    
                    <div class="form-group">
                        <label>Autor</label>
                        <input type="text" class="form-control" name="autor">
                    </div>

                    <?php
                        include "../../componentes/selecciongenero.php";
                    ?>
            </form>

        </div>
    </div>



    </body>

</html>