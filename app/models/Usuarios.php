<?php 

namespace App\Models;
require_once("DBAbstractModel.php");

class Usuarios extends DBAbstractModel {
    public $id;
    public $nombre;
    public $usuario;
    public $password;
    public $email;
    public $perfil;
    public $bloqueado;

    private static $instancia;
    public static function getInstancia()
    {
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }
    public function __clone()
    {
        trigger_error('La clonación no es permitida!.', E_USER_ERROR);
    }

    public function setId($id){
        $this->id = $id;
    }

    public function setNombre($nombre){
        $this->nombre = $nombre;
    }

    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }

    public function setPassword($password){
        $this->password = $password;
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function setPerfil($perfil){
        $this->perfil = $perfil;
    }

    public function setBloqueado($bloqueado){
        $this->bloqueado = $bloqueado;
    }

    public function getId(){
        return $this->id;
    }

    public function getNombre(){
        return $this->nombre;
    }

    public function getUsuario(){
        return $this->usuario;
    }

    public function getPassword(){
        return $this->password;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getPerfil(){
        return $this->perfil;
    }

    public function getBloqueado(){
        return $this->bloqueado;
    }

    public function getAll() {
        $this->query = "SELECT * FROM usuarios";
        $this->get_results_from_query();
        return $this->rows;
    }

    public function login() {
        $this->query = "SELECT * FROM usuarios WHERE usuario = :usuario AND password = :password";
        $this->parametros['usuario'] = $this->usuario;
        $this->parametros['password'] = $this->password;

        $this->get_results_from_query();
        if( count($this->rows) == 1 ){
            foreach ($this->rows[0] as $propiedad=>$valor) {
                $this->$propiedad=$valor;
            }
            $data['cuenta'] = $this->rows[0];
            $data['perfil'] = $this->rows[0]['perfil'];
            $data['nombre'] = $this->rows[0]['nombre'];
            $data['id'] = $this->rows[0]['id'];
            $data['hora'] = date('H:i:s');
            $data['usuario'] = $this->usuario;
            $data['bookmarks'] = $this->getBookmarks($this->rows[0]['id']);
        } else {
            echo "Usuario no encontrado";
        }
        if (isset($data['cuenta'])) {
            return $data??null;
        }
    }

    public function getBookmarks($id) {
        $this->query = "SELECT * FROM bookmarks WHERE id = :id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        if( count($this->rows) > 0 ){
            return $this->rows;
        } else {
            return null;
        }
    }
    
    public function setEntity() {
        $this->query = "INSERT INTO usuarios (nombre, usuario, password, email, perfil, bloqueado) VALUES (:nombre, :usuario, :password, :email, :perfil, :bloqueado)";
        $this->parametros['nombre'] = $this->nombre;
        $this->parametros['usuario'] = $this->usuario;
        $this->parametros['password'] = $this->password;
        $this->parametros['email'] = $this->email;
        $this->parametros['perfil'] = $this->perfil;
        $this->parametros['bloqueado'] = $this->bloqueado;
        $this->get_results_from_query();
    }

    public function editEntity() {
        $this->query = "UPDATE usuarios SET nombre=:nombre, usuario=:usuario, password=:password, email=:email, perfil=:perfil, bloqueado=:bloqueado WHERE id=:id";
        $this->parametros['nombre'] = $this->nombre;
        $this->parametros['usuario'] = $this->usuario;
        $this->parametros['password'] = $this->password;
        $this->parametros['email'] = $this->email;
        $this->parametros['perfil'] = $this->perfil;
        $this->parametros['bloqueado'] = $this->bloqueado;
        $this->parametros['id'] = $this->id;
        $this->get_results_from_query();
    }

    public function deleteEntity($id) {
        $this->query = "DELETE FROM usuarios WHERE id=:id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
    }
    
    public function getEntity($id) {
        $this->query = "SELECT * FROM usuarios WHERE id = :id";
        $this->parametros['id'] = $id;
        $this->get_results_from_query();
        if( count($this->rows) == 1 ) {
            foreach ($this->rows[0] as $propiedad=>$valor) {
                $this->$propiedad=$valor;
            }
            $this->mensaje = 'Usuario encontrado';
            return $this->rows[0];
        }
    }

}



?>