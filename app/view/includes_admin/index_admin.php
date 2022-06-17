<!DOCTYPE html>
<html lang="en">
<body>
    <?php 
    // PRESENTACIÓN.
    echo "<h3> Bienvenido " . $data['nombre']  .  " te logueaste a las: ".  $data['hora'] . "</h3>";
    echo "<p> Ust. está cómo " . $data['perfil']  . "</p>";

    // HEADER CON LAS OPCIONES DEL USUARIO.
    echo "<h2>Opciones del admin</h2>";
    echo "<a href='" . DIRBASEURL . "/usuario/add'>Añadir un usuario</a>    |     <a href='" . DIRBASEURL . "'>Salir</a>";
    
    // BOOKMARKS.
    echo "<h2> Bookmarks </h2>";
    echo "<table border='1'>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Nombre</th>";
        echo "<th>Usuario</th>";
        echo "<th>Password</th>";
        echo "<th>Email</th>";
        echo "<th>Perfil</th>";
        echo "<th>Bloqueado</th>";
        echo "<th>Editar</th>";
        echo "<th>Eliminar</th>";
        echo "<th>Bloquear</th>";
        echo "</tr>";
        foreach ($data['usuarios'] as $key => $value) {
            echo '<tr>';
            echo '<td>' . $value['id'] . '</td>';
            echo '<td>' . $value['nombre'] . '</td>';
            echo '<td>' . $value['usuario'] . '</td>';
            echo '<td>' . $value['password'] . '</td>';
            echo '<td>' . $value['email'] . '</td>';
            echo '<td>' . $value['perfil'] . '</td>';
            echo '<td>' . $value['bloqueado'] . '</td>';
            echo '<td><a href="' . DIRBASEURL . '/usuario/edit/' . $value['id'] . '">Editar</a></td>';
            echo '<td><a href="' . DIRBASEURL . '/usuario/delete/' . $value['id'] . '">Eliminar</a></td>';
            echo '<td><a> Acc.Bloquear</a></td>';
            echo '</tr>';
        }
    echo "</table>";

    ?>
</body>
</html>