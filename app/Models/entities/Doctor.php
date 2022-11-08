<?php

namespace App\Models\entities;

class Doctor
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
    private $matricula1;
    private $matricula2;
    private $especialidad1;
    private $especialidad2;
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
    public function setMatricula1($matricula) {
        $this -> matricula1 = $matricula;
    }
    public function setMatricula2($matricula) {
        $this -> matricula2 = $matricula;
    }
    public function setEspecialidad1($especialidad) {
        $this -> especialidad1 = $especialidad;
    }
    public function setEspecialidad2($especialidad) {
        $this -> especialidad2 = $especialidad;
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
    public function getMatricula1($matricula) {
        return $this -> matricula1;
    }
    public function getMatricula2($matricula) {
        return $this -> matricula2;
    }
    public function getEspecialidad1($especialidad) {
        return $this -> especialidad1;
    }
    public function getEspecialidad2($especialidad) {
        return $this -> especialidad2;
    }
    public function getObraSocialFK($obraSocialFK) {
        return $this -> obraSocialFK;
    }
}
