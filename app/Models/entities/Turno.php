<?php

namespace App\Models\entities;

class Turno
{
    private $id;
    private $fechaTurno;
    private $horario;
    private $paciente;
    private $doctor;
    private $fechaSolicitud;
    private $especialidad;
    private $estado;
    private $pacienteFK;

    /****  SETTERS  ****/

    public function setId($id) {
        $this -> id = $id;
    }
    public function setFechaTurno($fecha) {
        $this -> fechaTurno = $fecha;
    }
    public function setHorario($horario) {
        $this -> horario = $horario;
    }
    public function setPaciente($paciente) {
        $this -> paciente = $paciente;
    }
    public function setDoctor($doctor) {
        $this -> doctor = $doctor;
    }
    public function setFechaSolicitud($fechaSolicitud) {
        $this -> fechaSolicitud = $fechaSolicitud;
    }
    public function setEspecialidad($especialidad) {
        $this -> especialidad = $especialidad;
    }
    public function setEstado($estado) {
        $this -> estado = $estado;
    }
    public function setPacienteFK($pacienteFK) {
        $this -> pacienteFK = $pacienteFK;
    }


    /****  GETTERS  ****/

    public function getId() {
        return $this -> id;
    }
    public function getFechaTurno() {
        return $this -> fechaTurno;
    }
    public function getHorario() {
        return $this -> horario;
    }
    public function getPaciente() {
        return $this -> paciente;
    }
    public function getDoctor() {
        return $this -> doctor;
    }
    public function getFechaSolicitud() {
        return $this -> fechaSolicitud;
    }
    public function getEspecialidad() {
        return $this -> especialidad;
    }
    public function getEstado() {
        return $this -> estado;
    }
    public function getPacienteFK() {
        return $this -> pacienteFK;
    }

}
