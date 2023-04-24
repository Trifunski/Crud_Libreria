<!DOCTYPE html>
<html>
<?php
    include "componentes/head.php";
    require "modelo/biblioteca.php";
?>

<body>
    <h1>Borrar Libro: </h1>
    <br>

    <?php

    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $idBiblioteca = $_GET['id'];
        $biblioteca = new Biblioteca();
        $biblioteca->setId($idBiblioteca);
        echo $biblioteca->eliminarBiblioteca($idBiblioteca);
    }

    ?>
    <br>
    <a href="bibliotecas.php"><button button class="btn btn-primary">Volver al Listado</button></a>

</body>

</html> 