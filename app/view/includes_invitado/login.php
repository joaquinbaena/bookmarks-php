<!DOCTYPE html>
<html lang="en">
<body>
    <h2>Login</h2>
    <form action="" method="post">
        <input type="text" name="usuario" placeholder="Usuario">
        <input type="text" name="password" placeholder="Password">
        <input type="submit" value="login" name="login">
    </form>
    <?php 
        $bandera = true;

        if (count($data) > 1) {
            $bandera = false;
            echo "<p>Usuario o contraseña incorrectos</p>";
        }

        if (isset($data['error_usuario']) && $bandera) {
            echo "<p>" . $data['error_usuario'] . "</p>";
        }

        if (isset($data['error_password'])  && $bandera) {
            echo "<p>" . $data['error_password'] . "</p>";
        }

    ?>
</body>
</html>