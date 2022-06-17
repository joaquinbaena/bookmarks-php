<!DOCTYPE html>
<html lang="en">
<body>
    <h2>Añade un nuevo Bookmark</h2>
    <form action="" method="post">
        <input type="text" name="nombre" placeholder="Nickname">
        <input type="text" name="usuario" placeholder="usuario">
        <input type="text" name="password" placeholder="password">
        <input type="text" name="email" placeholder="email">
        <input type="text" name="perfil" placeholder="perfil">

        <input type="submit" value="guardar" name="guardar">
    </form>
    <?php 
    // boton para ir a la pagina de inicio.
        echo "<br>";
        echo "<a href='" . DIRBASEURL . "'>Salir</a>";

        $bandera = true;

        if (count($data) > 1) {
            $bandera = false;
            echo "<p>Algunos campos están incorrectos.</p>";
        }

        if (isset($data['error_nombre']) && $bandera) {
            echo "<p>" . $data['error_nombre'] . "</p>";
        }

        if (isset($data['error_usuario'])  && $bandera) {
            echo "<p>" . $data['error_usuario'] . "</p>";
        }

        if (isset($data['error_password'])  && $bandera) {
            echo "<p>" . $data['error_password'] . "</p>";
        }

        if (isset($data['error_email'])  && $bandera) {
            echo "<p>" . $data['error_email'] . "</p>";
        }

        if (isset($data['error_perfil'])  && $bandera) {
            echo "<p>" . $data['error_perfil'] . "</p>";
        }

    ?>
</body>
</html>