<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include '../DB/PersonaDAO.php';

class ControlPersona{
    
    private $persona;
    private $personaDAO;
    
    public function __construct() {
        $this->personaDAO=new PersonaDAO();
    }
    
    public function crearPersona($documento_persona,$nombre_persona,$apellido_persona,$usuario,$tipo_persona,$genero,$correo_persona){
        $this->persona = new Persona();
        //$this->persona->setCodigo_persona($codigo_persona);
        $this->persona->setDocumento_persona($documento_persona);
        $this->persona->setNombre_persona($nombre_persona);
        $this->persona->setApellido_persona($apellido_persona);
        $this->persona->setUsuario_persona($usuario);
        $this->persona->setTipo_persona($tipo_persona);
        $this->persona->setGenero_persona($genero);
        $this->persona->setCorreo_persona($correo_persona);
        
        $this->personaDAO->crearPersona($this->persona); 
    }
    
    public function buscarPersonaxUsuario($usuario){
        return $this->personaDAO->buscarPersonaxUsuario($usuario);      
    }
    
    public function buscarPersonaxDocumento($documento){
        return $this->personaDAO->buscarPersonaxDocumento($documento);      
    }
    
    public function registrarPersona($persona){
        $this->personaDAO->registrarPersona($persona);      
    }
    
    public function registrarPersonaxUC($tipoPersona,$usuario,$clave){
        $this->personaDAO->registrarPersonaxUC($tipoPersona,$usuario,$clave);      
    }
    
    public function actualizarPersona($documento,$usuario,$correo){
        
        
        $this->personaDAO->actualizarPersona($documento,$usuario,$correo);      
    }
    
    public function modificarPersona($codigo_persona,$nombre_persona,$apellido_persona,$tipo_persona,$usuario,$genero,$documento){
        $this->persona = new Persona();
       // $this->persona->setCodigo_persona($codigo_persona);
        $this->persona->setNombre_persona($nombre_persona);
        $this->persona->setApellido_persona($apellido_persona);
        $this->persona->setTipo_persona($tipo_persona);
        $this->persona->setUsuario_persona($usuario);
        $this->persona->setGenero_persona($genero);
        $this->persona->setDocumento_persona($documento);
        return $this->personaDAO->modificarPersona($this->persona);      
    } 
}
