<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Solicitud{
    private $id_solicitud;
    private $codigo_estudiante;
    private $id_convocatoria;
    private $puntaje;
    private $val_solicitud;
    
    public function __construct() {
        
    }

    public function getCodigo_estudiante() {
        return $this->codigo_estudiante;
    }

    public function getId_convocatoria() {
        return $this->id_convocatoria;
    }

    public function getId_solicitud() {
        return $this->id_solicitud;
    }

    public function getPuntaje() {
        return $this->puntaje;
    }

    public function setCodigo_estudiante($codigo_estudiante) {
        $this->codigo_estudiante = $codigo_estudiante;
    }

    public function setId_convocatoria($id_convocatoria) {
        $this->id_convocatoria = $id_convocatoria;
    }

    public function setId_solicitud($id_solicitud) {
        $this->id_solicitud = $id_solicitud;
    }

    public function setPuntaje($puntaje) {
        $this->puntaje = $puntaje;
    }
    
    public function getVal_solicitud() {
        return $this->val_solicitud;
    }

    public function setVal_solicitud($val_solicitud) {
        $this->val_solicitud = $val_solicitud;
    }



    
    
    
}