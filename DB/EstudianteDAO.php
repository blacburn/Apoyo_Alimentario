<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EstudianteDAO
 *
 * @author ANDREY
 */
include '../Negocio/Estudiante.php';

class EstudianteDAO {
    //put your code here
    public function __construct() {
        
    }

    public function buscarEstudiantexDocumento($documento) {
        
        $estudiante = new Estudiante();
        $sqltxt = "select * from s_estudiante where documento = ".$documento."";
        $stid = oci_parse($_SESSION['sesion_logueado'], $sqltxt);
        //echo $sqltxt;
        oci_execute($stid);
        while(oci_fetch($stid)) {
            //$persona->setCodigo_persona(oci_result($stid, 'CODIGO'));
            $estudiante->setCodigo_estudiante(oci_result($stid, 'CODIGO_EST'));
            $estudiante->setDocumento_estudiante(oci_result($stid, 'DOCUMENTO'));
            $estudiante->setMatriculas_estudiante(oci_result($stid, 'MATRICULAS_EST'));
            $estudiante->setActivo_estudiante(oci_result($stid, 'ACTIVO'));
            $estudiante->setCarrera_estudiante(oci_result($stid, 'CARRERA'));            
            $estudiante->setPromedio_estudiante(oci_result($stid, 'PROMEDIO'));
            $estudiante->setAval_solicitud(oci_result($stid, 'AVAL_SOLICITUD'));
        }
        //echo (string)$estudiante->getCodigo_estudiante();
        //echo $estudiante->getCarrera_estudiante();
        //echo $estudiante->getMatriculas_estudiante();
        //echo $estudiante->getCodigo_estudiante();
        //echo $persona->getApellido_persona();
        return $estudiante;
    }
    
    public function banderaActivo_solicitud($estudiante){
        //$estudiante = new Estudiante();
        $sqltxt = "Update s_estudiante set aval_solicitud = '".$estudiante->getAval_solicitud()."' where "
                . "codigo_est = ".$estudiante->getCodigo_estudiante()."";
        $stid = oci_parse($_SESSION['sesion_logueado'], $sqltxt);
        //echo $sqltxt;
        oci_execute($stid);
        
    }
    
 
   
}

?>

