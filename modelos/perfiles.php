<?php

require_once ('conexion.php');

class Perfil {
    private $id;
    private $nombre;


    public function __construct($id, $nombre) {
        $this->id = $id;
        $this->nombre = $nombre;
    }

    public function guardar () {
        $conexion = new Conexion();
        $query = "INSERT INTO perfiles (nombre) VALUES ('$this->nombre')";
        return $conexion->insertar($query);
    }
}

$perfil1 = new Perfil(null, "Gerente");
$perfil2 = new Perfil(null, "Administrador");
$perfil3 = new Perfil(null, "Subsecretario");
$perfil33 = new Perfil(null, "Vendedor");

echo $perfil1->guardar();
echo $perfil2->guardar();
echo $perfil3->guardar();
echo $perfil33->guardar();





?>