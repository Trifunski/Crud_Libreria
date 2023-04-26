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

            if (isset($_GET['id']) && !empty($_GET['id'])) {
                $idBiblioteca = $_GET['id'];
                $bibliotecas = new Biblioteca();
                $bibliotecas->setId($idBiblioteca);
                $biblioteca = $bibliotecas->obtenerBiblioteca();            
            }

            if (
                isset($_POST['id'])
                && isset($_POST['nombre']) 
                && isset($_POST['descripcion']) 
                && isset($_POST['estado']) 
            ) {
                $id = $_POST['id'];
                $nombre = $_POST['nombre'];
                $descripcion = $_POST['descripcion'];
                $estado = $_POST['estado'];

                $bibliotecas = new Biblioteca();

                $bibliotecas->setId($id);
                $bibliotecas->setNombre($nombre);
                $bibliotecas->setDescripcion($descripcion);
                $bibliotecas->setEstado($estado);
                
                echo $bibliotecas->actualizarBiblioteca();
            }

            ?>
            <form action="editar_biblioteca.php" method="post">

                <div class="form-group">
                    <label>ID</label>
                    <input type="text" class="form-control" name="id" value="<?php echo $biblioteca->getId(); ?>" readonly>      
                </div>
                
                <div class="form-group">
                    <label>Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="<?php echo $biblioteca->getNombre(); ?>" required>
                </div>

                <div class="form-group">
                    <label>Descripción</label>
                    <input type="text" class="form-control" name="descripcion" value="<?php echo $biblioteca->getDescripcion(); ?>" required>
                </div>

                <?php
                    $estados = array("Activo", "Inactivo");

                    echo "<div class='form-group'>";
                    echo "<label>Estado</label>";
                    echo "<select class='custom-select' name='estado' required>";

                    foreach ($estados as $estado) {
                        echo "<option value=" . $estado;
                        if (isset($biblioteca) && $estado == $biblioteca->getEstado()) {
                            echo " selected='selected'";
                        }
                        echo ">" . $estado . "</option>";
                    }

                    echo "</select>";
                    echo "</div>";
                ?>

                <option value=""></option>

                <button type="submit" class="btn btn-primary">Editar Biblioteca</button>
            </form>
            <br>
            <a href="bibliotecas.php"><button>Volver al listado</button></a>
        </div>
    </div>
</body>

</html>