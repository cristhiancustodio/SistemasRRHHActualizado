<?php
    require_once "conexion.php";
class datoSistema{
    public static function verCarrera(){
        $sql= "SELECT * FROM Carrera";    
        $db= new Connect; 
        $data = $db->sentencia($sql);
        return $data;   
    }
    public static function verDistrito(){
        $sql= "SELECT * FROM Distrito";    
        $db= new Connect; 
        $data = $db->sentencia($sql);
        return $data;   
    }
    public static function verExperiencia(){
        $sql= "SELECT * FROM Experiencia";    
        $db= new Connect; 
        $data = $db->sentencia($sql);
        return $data;   
    }
    public static function verDisponibilidad(){
        $sql= "SELECT * FROM Reserva";    
        $db= new Connect; 
        $data = $db->sentencia($sql);
        return $data;   
    }
    public static function verPuesto(){
        $sql= "SELECT * FROM Puesto";    
        $db= new Connect; 
        $data = $db->sentencia($sql);
        return $data; 
    }
}

?>