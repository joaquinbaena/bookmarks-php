<!DOCTYPE html>
<html lang="en">
<body>
    <?php 
    // PRESENTACIÓN.
    echo "<h3> Bienvenido " . $data['nombre']  .  " te logueaste a las: ".  $data['hora'] . "</h3>";
    echo "<p> Ust. está cómo " . $data['perfil']  . "</p>";

    // HEADER CON LAS OPCIONES DEL USUARIO.
    echo "<h2>Opciones del usuario</h2>";
    echo "<a href='" . DIRBASEURL . "/bookmark/add'>Añadir un bookmark</a>    |     <a href='" . DIRBASEURL . "'>Salir</a>";
    
    // BOOKMARKS.
    echo "<h2> Bookmarks </h2>";
    echo "<table border='1'>";
        echo "<tr>";
        echo "<th>ID</th>";
        echo "<th>Bookmark</th>";
        echo "<th>Descripción</th>";
        echo "<th>Editar</th>";
        echo "<th>Eliminar</th>";
        echo "</tr>";
        foreach ($data['bookmarks'] as $key => $value) {
            echo '<tr>';
            echo '<td>' . $value['id'] . '</td>';
            echo '<td>' . $value['bm_url'] . '</td>';
            echo '<td>' . $value['descripcion'] . '</td>';
            echo '<td><a href="' . DIRBASEURL . '/bookmark/edit/' . $value['id'] . '">Editar</a></td>';
            echo '<td><a href="' . DIRBASEURL . '/bookmark/delete/' . $value['id'] . '">Eliminar</a></td>';
            echo '</tr>';
        }
    echo "</table>";

    //$_SESSION['perfil'] = 'usuario';
    ?>
</body>
</html>