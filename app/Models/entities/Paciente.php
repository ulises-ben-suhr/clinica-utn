<?php

namespace App\Models\entities;

class Paciente
{
    private $id;
    private $nombre;
    private $apellido;
    private $dni;
    private $direccion;
    /*
     * private $calle;
     * private $numero;
     * private $depto;
     * private $piso;
     * private $cp;
     * private $localidad;
     * private $provincia;
    */
    private $telefono1;
    private $telefono2;
    private $email;
    private $categoriaOS;
    private $numeroAfiliado;
    private $obraSocialFK;


    /****  SETTERS  ****/

    public function setId($id) {
        $this -> id = $id;
    }
    public function setNombre($nombre) {
        $this -> nombre = $nombre;
    }
    public function setApellido($apellido) {
        $this -> apellido = $apellido;
    }
    public function setDni($dni) {
        $this -> dni = $dni;
    }
    public function setDireccion($direccion) {
        $this -> direccion = $direccion;
    }
    public function setTel1($telefono) {
        $this -> telefono1 = $telefono;
    }
    public function setTel2($telefono) {
        $this -> telefono2 = $telefono;
    }
    public function setEmail($email) {
        $this -> email = $email;
    }
    public function setCategoriaOS($categoriaOS) {
        $this -> categoriaOS = $categoriaOS;
    }
    public function setNumeroAfiliado($numeroAfiliado) {
        $this -> numeroAfiliado = $numeroAfiliado;
    }
    public function setObraSocialFK($obraSocialFK) {
        $this -> obraSocialFK = $obraSocialFK;
    }




    /****  GETTERS  ****/

    public function getId() {
        return $this -> id;
    }
    public function getNombre() {
        return $this -> nombre;
    }
    public function getApellido() {
        return $this -> apellido;
    }
    public function getDni() {
        return $this -> dni;
    }
    public function getDireccion() {
        return $this -> direccion;
    }
    public function getTel1() {
        return $this -> telefono1;
    }
    public function getTel2() {
        return $this -> telefono2;
    }
    public function getEmail() {
        return $this -> email;
    }
    public function getCategoriaOS() {
        return $this -> categoriaOS;
    }
    public function getNumeroAfiliado() {
        return $this -> numeroAfiliado;
    }
    public function getObraSocialFK() {
        return $this -> obraSocialFK;
    }
}
