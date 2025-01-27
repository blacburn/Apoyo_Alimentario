<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include '../Negocio/Persona.php';

class PersonaDAO {

    public function __construct() {
        
    }

    public function buscarPersonaxUsuario($usuario) {
        
        $persona = new Persona();
        $sqltxt = "select * from s_persona where n_usuario = '".$usuario."'";
        $stid = oci_parse($_SESSION['sesion_logueado'], $sqltxt);
        oci_execute($stid);
        while(oci_fetch($stid)) {

            $persona->setDocumento_persona(oci_result($stid, 'K_DOCUMENTO'));
            $persona->setNombre_persona(oci_result($stid, 'N_NOMPER'));
            $persona->setApellido_persona(oci_result($stid, 'N_APEPER'));
            $persona->setUsuario_persona(oci_result($stid, 'N_USUARIO'));
            $persona->setTipo_persona(oci_result($stid, 'T_TIPO'));
            $persona->setGenero_persona(oci_result($stid, 'N_GENERO'));
            $persona->setCorreo_persona(oci_result($stid, 'N_CORREO'));
            
        }
        //echo $persona->getApellido_persona();
        return $persona;
    }
    
    public function buscarPersonaxDocumento($documento) {
        
        $persona = new Persona();
        echo $documento;
        $sqltxt = "select * from s_persona where k_documento = '".$documento."'";
        $stid = oci_parse($_SESSION['sesion_logueado'], $sqltxt);
        
        oci_execute($stid);
        while(oci_fetch($stid)) {

            $persona->setDocumento_persona(oci_result($stid, 'K_DOCUMENTO'));
            $persona->setNombre_persona(oci_result($stid, 'N_NOMPER'));
            $persona->setApellido_persona(oci_result($stid, 'N_APEPER'));
            $persona->setUsuario_persona(oci_result($stid, 'N_USUARIO'));
            $persona->setTipo_persona(oci_result($stid, 'T_TIPO'));
            $persona->setGenero_persona(oci_result($stid, 'N_GENERO'));
            $persona->setCorreo_persona(oci_result($stid, 'N_CORREO'));
            
        }
        //echo $persona->getApellido_persona();
        return $persona;
    } 
    
 
    
    public function crearPersona($persona) {
        //$persona= new Persona();
         $sqltxt="insert into s_persona values(".$persona->getDocumento_persona().",'".$persona->getNombre_persona()."','".$persona->getApellido_persona()."','".$persona->getUsuario_persona()."','".$persona->getTipo_persona()."','".$persona->getGenero_persona()."','".$persona->getCorreo_persona()."')";
         $stid = oci_parse($_SESSION['sesion_logueado'], $sqltxt);
         oci_execute($stid);
         
    }
    
     public function registrarPersona($persona) {
         $sqltxt="create user ".$persona->getUsuario_persona()." identified by ".$persona->getUsuario_persona()." default tablespace apoyo_def temporary tablespace apoyo_tm quota 10M on apoyo_def";
         $stid = oci_parse($_SESSION['sesion_logueado'], $sqltxt);
         oci_execute($stid);
          
         $sqltxt="grant R_".$persona->getTipo_persona()." to ".$persona->getUsuario_persona()."";
         $stid = oci_parse($_SESSION['sesion_logueado'], $sqltxt);
         oci_execute($stid);
          
         $sqltxt="grant create session, connect to ".$persona->getUsuario_persona()."";
         $stid = oci_parse($_SESSION['sesion_logueado'], $sqltxt);
         oci_execute($stid);
          
    }
    
    public function registrarPersonaxUC($tipoPersona,$usuario,$clave) {
         $sqltxt="create user ".$usuario." identified by ".$clave." default tablespace apoyo_def temporary tablespace apoyo_tm quota 10M on apoyo_def";
         $stid = oci_parse($_SESSION['sesion_logueado'], $sqltxt);
         oci_execute($stid);
          
         $sqltxt="grant R_".$tipoPersona." to ".$usuario."";
         $stid = oci_parse($_SESSION['sesion_logueado'], $sqltxt);
         oci_execute($stid);
         
         $sqltxt="grant create session, connect to ".$usuario."";
         $stid = oci_parse($_SESSION['sesion_logueado'], $sqltxt);
         oci_execute($stid);
         
    }
    
    public function actualizarPersona($documento,$usuario,$correo) {
        
        $sqltxt="update s_persona set n_usuario='".$usuario."',n_correo='".$correo."' where k_documento=".$documento."";
        $stid = oci_parse($_SESSION['sesion_logueado'], $sqltxt);
        oci_execute($stid);
    }
    
     public function modificarPersona($persona) {
        $sqltxt="update s_persona set nombre_per='".$persona->getNombre_persona()."',apellido_per='".$persona->getApellido_persona()."',tipo='".$persona->getTipo_persona()."',usuario='".$persona->getUsuario_persona()."',genero='".$persona->getGenero_persona()."',documento=".$persona->getDocumento_persona()." where codigo=".$persona->getCodigo_persona()."";
        $stid = oci_parse($_SESSION['sesion_logueado'], $sqltxt);
        oci_execute($stid);
    }
}