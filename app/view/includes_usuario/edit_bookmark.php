<!DOCTYPE html>
<html lang="en">
<body>
    <h2>Edita un Bookmark</h2>
    <form action="" method="post">
        <input type="text" name="id" value="<?php echo $data['id'] ?>">
        <input type="text" name="bookmark" placeholder="bookmark">
        <input type="text" name="descripcion" placeholder="descripcion">
        <input type="text" name="id_usuario" placeholder="id_usuario">
        <input type="submit" value="editar" name="editar">
    </form>
    <?php 
    // boton para ir a la pagina de inicio.
        echo "<br>";
        echo "<a href='" . DIRBASEURL . "'>Salir</a>";

        $bandera = true;

        if (count($data) > 1) {
            $bandera = false;
            echo "<p>Algunos campos están vacios</p>";
        }

        if (isset($data['error_bookmark']) && $bandera) {
            echo "<p>" . $data['error_bookmark'] . "</p>";
        }

        if (isset($data['error_id-usuario']) && $bandera) {
            echo "<p>" . $data['error_id-usuario'] . "</p>";
        }

        if (isset($data['error_id']) && $bandera) {
            echo "<p>" . $data['error_id'] . "</p>";
        }

        if (isset($data['error_descripcion'])  && $bandera) {
            echo "<p>" . $data['error_descripcion'] . "</p>";
        }

    ?>
</body>
</html>