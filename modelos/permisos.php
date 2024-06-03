<?php

require_once ('conexion.php');

class Permisos {
    private $id;
    private $nombre;

    public function __construct($id, $nombre){
        $this->id = $id;
        $this->nombre = $nombre;
    }

}

?>