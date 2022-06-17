<?php
namespace App\Controller;

use App\Models\Bookmarks;
use App\Models\Usuarios;


class BookmarkController extends BaseController {

    public function addBookmark() {
        if (isset($_POST['guardar'])) {
            
            $procesaFormulario = true;
            $error = false;
            $data = array();

            if (empty($_POST['bookmark'])) {
                $procesaFormulario = true;
                $error = true;
                $data['error_bookmark'] = 'El bookmark es obligatorio';
            }

            if (empty($_POST['descripcion'])) {
                $procesaFormulario = true;
                $error = true;
                $data['error_descripcion'] = 'La descripcion es obligatoria';
            }

            if ($error) {
                $this->renderHTML('../app/view/includes_usuario/add_bookmark.php', $data);
            }

            if ($procesaFormulario) {
                $bookmark = new Bookmarks();
                $bookmark->setBookmark($_POST['bookmark']);
                $bookmark->setDescripcion($_POST['descripcion']);
                $bookmark->setIdUsuario($_SESSION['id']);
                $_SESSION['perfil'] = 'usuario';
                $bookmark->setEntity();
                header('Location:' . getenv('HTTP_REFERER'));

            }

        } else {
            $this->renderHTML('../app/view/includes_usuario/add_bookmark.php');
        }
    }

    public function editBookmark() {
        if (isset($_POST['editar'])) {
            
            $procesaFormulario = true;
            $error = false;
            $data = array();

            if (empty($_POST['bookmark'])) {
                $procesaFormulario = true;
                $error = true;
                $data['error_bookmark'] = 'El bookmark es obligatorio';
            }

            if (empty($_POST['descripcion'])) {
                $procesaFormulario = true;
                $error = true;
                $data['error_descripcion'] = 'La descripcion es obligatoria';
            }

            if (empty($_POST['id'])) {
                $procesaFormulario = true;
                $error = true;
                $data['error_id'] = 'El id es obligatoria';
            }

            if (empty($_POST['id_usuario'])) {
                $procesaFormulario = true;
                $error = true;
                $data['error_id-usuario'] = 'El id_usuario es obligatoria';
            }

            if ($error) {
                $this->renderHTML('../app/view/includes_usuario/edit_bookmark.php', $data);
            }

            if ($procesaFormulario) {
                $bookmark = new Bookmarks();
                $bookmark->setBookmark($_POST['bookmark']);
                $bookmark->setDescripcion($_POST['descripcion']);
                $bookmark->setIdUsuario($_POST['id_usuario']);
                $bookmark->setId($_POST['id']);
                $_SESSION['perfil'] = 'usuario';
                $bookmark->editEntity();
                header("location:" . DIRBASEURL . "/");
            }

        } else {
            $request = str_replace(DIRBASEURL, '', $_SERVER['REQUEST_URI']);
            $elementos = explode('/', $request);
            $data = array();
            $data['id'] = end($elementos);
            $this->renderHTML('../app/view/includes_usuario/edit_bookmark.php' , $data);
        }
        
    }

    public function deleteBookmark() {
        $request = str_replace(DIRBASEURL, '', $_SERVER['REQUEST_URI']);
        $elementos = explode('/', $request);
        $id = end($elementos);
        $bookmark = new Bookmarks();
        $bookmark->deleteEntity($id);
        header("location:" . DIRBASEURL . "/");
    }
}