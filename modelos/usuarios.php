<?php
require_once ('conexion.php');


class Usuario {
    private $id;
    private $nombre;
    private $email;
    private $password;
    private $perfiles_id;
    private $persona_id;

    public function __construct($id='', $nombre='', $email='', $password='', $perfiles_id='') {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->password = $password;
        $this->perfiles_id = $perfiles_id;
    }

    public function guardar () {
        $hash_contraseña = password_hash($this->password, PASSWORD_DEFAULT);
        $this->password = $hash_contraseña;
        $conexion = new Conexion();
        $query = "INSERT INTO usuario (id, nombre, email, password, perfiles_id, persona_id) VALUES (null, '$this->nombre', '$this->email', '$this->password', '$this->perfiles_id', '$this->persona_id')";
        return $conexion->insertar($query);
    }

    public function actualizar () {
        $conexion = new Conexion ();
        $query = "UPDATE usuario SET nombre ='$this -> nombre', email ='$this -> email', password ='$this -> password', perfiles_id = '$this -> perfiles_id', persona_id = '$this -> persona_id'";
        return $conexion->actualizar($query);
    }

    public function eliminar () {
        $conexion = new Conexion ();
        $query = "UPDATE usuario SET activo =0 WHERE id = '$this -> id'";
        return $conexion->actualizar($query);
    }

    
    public function validar_usuario () {
        $conexion = new Conexion();
        $query = "SELECT * FROM usuario WHERE nombre = '$this->nombre'"; //AND password = '$this->password'
        return $conexion->consultar($query);
    }

    /////////////////////////////////////////////////////////////

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    public function getPerfiles_id()
    {
        return $this->perfiles_id;
    }

    public function setPerfiles_id($perfiles_id)
    {
        $this->perfiles_id = $perfiles_id;

        return $this;
    }
    
    public function getPersona_id()
    {
        return $this->persona_id;
    }

    public function setPersona_id($persona_id)
    {
        $this->persona_id = $persona_id;

        return $this;
    }
}

$usuario = new Usuario(null, 'don' ,'don@gmail.com',1234, 1, 1);
echo $usuario -> guardar ();


?>