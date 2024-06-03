<?php

class conexion
{
    private $_con;
    private $servidor;
    private $usuario;
    private $password;
    private $base_datos;

    public function __construct()
    {
        $this->servidor = 'localhost';
        $this->usuario = 'root';
        $this->password = '';
        $this->base_datos = 'odonto06';
    }

    public function conectar() {
        $this->_con = new mysqli($this->servidor, $this->usuario, $this->password, $this->base_datos);
    }

    public function desconectar() {
        $this->_con->close();
    }

    public function consultar ($query) {
        $this->conectar();
        $resultado = $this->_con->query($query);
        $this->desconectar();
        return $resultado;
    }

    public function insertar ($query) {
        $this->conectar();
        echo $query; //esto te muestra donde está el error 
        $this->_con->query($query);
        $id = $this ->_con->insert_id;
        $this->desconectar();
        return $id;
    }

    public function actualizar ($query) {
        $this->conectar();
        $resultado = $this ->_con->query($query);
        $this->desconectar();
        return $resultado;
    }
    
}


?>