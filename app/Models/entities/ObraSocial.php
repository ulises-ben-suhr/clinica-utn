<?php

namespace App\Models\entities;

class ObraSocial
{
    private $id;
    private $nombre;
    /*
     * private $direccion;
     * private $telefono;
     */

    /****  SETTERS  ****/

    public function setId($id) {
        $this -> id = $id;
    }
    public function setNombre($nombre) {
        $this -> nombre = $nombre;
    }


    /****  GETTERS  ****/

    public function getId() {
        return $this -> id;
    }
    public function getNombre() {
        return $this -> nombre;
    }

}
