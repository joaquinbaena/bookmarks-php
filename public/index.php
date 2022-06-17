<?php 

require('../vendor/autoload.php');
require('../app/config/constantes.php');

use App\Controller\IndexController;
use App\Controller\BookmarkController;
use App\Controller\UsuarioController;
use App\Core\Router;

session_start();
if (!isset($_SESSION['perfil'])) {
    $_SESSION['perfil'] = 'invitado';
    $_SESSION['usuario'] = "";
    // variables de sesion creadas por defecto.

}

$router = new Router();
$router->add(array(
    'name' => 'login',
    'path' => '/^\/||\/w+$/',
    'action' => [IndexController::class, 'indexAction'],
    'auth' => ['invitado']
));

// BOOKMARKS
$router->add(array(
    'name' => 'addBookmark',
    'path' => '/^\/bookmark\/add$/',
    'action' => [BookmarkController::class, 'addBookmark'],
    'auth' => ['usuario']
));
$router->add(array(
    'name' => 'editBookmark',
    'path' => '/^\/bookmark\/edit\/([0-9]+)$/',
    'action' => [BookmarkController::class, 'editBookmark'],
    'auth' => ['usuario']
));
$router->add(array(
    'name' => 'deleteBookmark',
    'path' => '/^\/bookmark\/delete\/([0-9]+)$/',
    'action' => [BookmarkController::class, 'deleteBookmark'],
    'auth' => ['usuario']
));

// USUARIOS
// BOOKMARKS
$router->add(array(
    'name' => 'addUsuario',
    'path' => '/^\/usuario\/add$/',
    'action' => [UsuarioController::class, 'addUsuario'],
    'auth' => ['admin']
));
$router->add(array(
    'name' => 'editUsuario',
    'path' => '/^\/usuario\/edit\/([0-9]+)$/',
    'action' => [UsuarioController::class, 'editUsuario'],
    'auth' => ['admin']
));
$router->add(array(
    'name' => 'deleteUsuario',
    'path' => '/^\/usuario\/delete\/([0-9]+)$/',
    'action' => [UsuarioController::class, 'deleteUsuario'],
    'auth' => ['admin']
));

    // session_unset();
    // session_destroy();
var_dump($_SESSION);
$request = str_replace(DIRBASEURL, '', $_SERVER['REQUEST_URI']);
$route = $router->matchs($request);
$bandera = false;
if ($route) {
    $controllerName = $route['action'][0];
    $actionName = $route['action'][1];
    if ($controllerName === 'App\Controller\IndexController') {
        $_SESSION['perfil'] = 'invitado';

    }
    foreach ($route['auth'] as $key) {
        if ($_SESSION['perfil'] === $key) {
            $bandera = true;
        }
    }
    if ($bandera) {
        $controller = new $controllerName;
        $controller->$actionName($request);
    } else {
        echo $_SESSION['perfil'];
        echo "NO entro";

    }
} else {
    echo 'No route found';
}

?>