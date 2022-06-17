<?php
namespace App\Controller;

use App\Models\Bookmarks;
use App\Models\Usuarios;


class UsuarioController extends BaseController {

    public function addUsuario() {
        if (isset($_POST['guardar'])) {
            
            $procesaFormulario = true;
            $error = false;
            $data = array();

            if (empty($_POST['nombre'])) {
                $procesaFormulario = true;
                $error = true;
                $data['error_nombre'] = 'El campo Nickname es obligatorio';
            }

            if (empty($_POST['usuario'])) {
                $procesaFormulario = true;
                $error = true;
                $data['error_usuario'] = 'El Usuario es obligatorio';
            }

            if (empty($_POST['password'])) {
                $procesaFormulario = true;
                $error = true;
                $data['error_password'] = 'La password es obligatorio';
            }

            if (empty($_POST['email'])) {
                $procesaFormulario = true;
                $error = true;
                $data['error_email'] = 'El email es obligatorio';
            }

            if (empty($_POST['perfil']) && $_POST['perfil'] != 'admin' && $_POST['perfil'] != 'usuario') {
                $procesaFormulario = true;
                $error = true;
                $data['error_perfil'] = 'El campo perfil solo puede ser admin o usuario';
            }

            if ($error) {
                $this->renderHTML('../app/view/includes_admin/add_usuario.php', $data);
            }

            if ($procesaFormulario) {
                $usuario = new Usuarios();
                $usuario->setNombre($_POST['nombre']);
                $usuario->setUsuario($_POST['usuario']);
                $usuario->setPassword($_POST['password']);
                $usuario->setEmail($_POST['email']);
                $usuario->setPerfil($_POST['perfil']);
                $usuario->setBloqueado(0);
                $usuario->setEntity();
                header('Location:' . getenv('HTTP_REFERER'));
            }

        } else {
            $this->renderHTML('../app/view/includes_admin/add_usuario.php');
        }
    }

    public function editUsuario() {
        if (isset($_POST['editar'])) {
            
            $procesaFormulario = true;
            $error = false;
            $data = array();

            if (empty($_POST['id'])) {
                $procesaFormulario = true;
                $error = true;
                $data['error_id'] = 'El campo ID es obligatorio';
            }

            if (empty($_POST['nombre'])) {
                $procesaFormulario = true;
                $error = true;
                $data['error_nombre'] = 'El campo Nickname es obligatorio';
            }

            if (empty($_POST['usuario'])) {
                $procesaFormulario = true;
                $error = true;
                $data['error_usuario'] = 'El Usuario es obligatorio';
            }

            if (empty($_POST['password'])) {
                $procesaFormulario = true;
                $error = true;
                $data['error_password'] = 'La password es obligatorio';
            }

            if (empty($_POST['email'])) {
                $procesaFormulario = true;
                $error = true;
                $data['error_email'] = 'El email es obligatorio';
            }

            if (empty($_POST['perfil']) && $_POST['perfil'] != 'admin' && $_POST['perfil'] != 'usuario') {
                $procesaFormulario = true;
                $error = true;
                $data['error_perfil'] = 'El campo perfil solo puede ser admin o usuario';
            }

            if (empty($_POST['bloqueado']) && $_POST['bloqueado'] != '0' && $_POST['bloqueado'] != '1') {
                $procesaFormulario = true;
                $error = true;
                $data['error_bloqueado'] = 'El campo obligatorio solo puede ser 0 = disponible o 1 = bloqueado';
            }

            if ($error) {
                $this->renderHTML('../app/view/includes_admin/edit_usuario.php', $data);
            }

            if ($procesaFormulario) {
                $usuario = new Usuarios();
                $usuario->setId($_POST['id']);
                $usuario->setNombre($_POST['nombre']);
                $usuario->setUsuario($_POST['usuario']);
                $usuario->setPassword($_POST['password']);
                $usuario->setEmail($_POST['email']);
                $usuario->setPerfil($_POST['perfil']);
                $usuario->setBloqueado($_POST['bloqueado']);
                $usuario->editEntity();
                header('Location:' . getenv('HTTP_REFERER'));
            }

        } else {
            $request = str_replace(DIRBASEURL, '', $_SERVER['REQUEST_URI']);
            $elementos = explode('/', $request);
            $data = array();
            $data['id'] = end($elementos);
            $this->renderHTML('../app/view/includes_admin/edit_usuario.php' , $data);
        }
        
    }

    public function deleteUsuario() {
        $request = str_replace(DIRBASEURL, '', $_SERVER['REQUEST_URI']);
        $elementos = explode('/', $request);
        $id = end($elementos);
        $usuario = new Usuarios();
        $usuario->deleteEntity($id);
        header("location:" . DIRBASEURL . "/");
    }
}