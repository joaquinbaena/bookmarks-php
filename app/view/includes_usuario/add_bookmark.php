<!DOCTYPE html>
<html lang="en">
<body>
    <h2>Añade un nuevo Bookmark</h2>
    <form action="" method="post">
        <input type="text" name="bookmark" placeholder="bookmark">
        <input type="text" name="descripcion" placeholder="descripcion">
        <input type="submit" value="guardar" name="guardar">
    </form>
    <?php 
    // boton para ir a la pagina de inicio.
        echo "<br>";
        echo "<a href='" . DIRBASEURL . "'>Salir</a>";

        $bandera = true;

        if (count($data) > 1) {
            $bandera = false;
            echo "<p>Los campos están vacios</p>";
        }

        if (isset($data['error_bookmark']) && $bandera) {
            echo "<p>" . $data['error_bookmark'] . "</p>";
        }

        if (isset($data['error_descripcion'])  && $bandera) {
            echo "<p>" . $data['error_descripcion'] . "</p>";
        }

    ?>
</body>
</html>