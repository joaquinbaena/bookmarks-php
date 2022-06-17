<!DOCTYPE html>
<html lang="en">
<body>
    <h2>Edita un Uusario</h2>
    <form action="" method="post">
        <input type="text" name="id" value="<?php echo $data['id'] ?>">
        <input type="text" name="nombre" placeholder="Nickname">
        <input type="text" name="usuario" placeholder="usuario">
        <input type="text" name="password" placeholder="password">
        <input type="text" name="email" placeholder="email">
        <input type="text" name="perfil" placeholder="perfil">
        <input type="text" name="bloqueado" placeholder="Bloqueado">
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

        if (isset($data['error_id'])  && $bandera) {
            echo "<p>" . $data['error_id'] . "</p>";
        }

        if (isset($data['error_bloqueado'])  && $bandera) {
            echo "<p>" . $data['error_bloqueado'] . "</p>";
        }

    ?>
</body>
</html>