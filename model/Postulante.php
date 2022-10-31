<?php
require_once "conexion.php";
class Postulante{
    public function __construct()
    {
        
    }
    public static function insertarPostulante($lista){
        $sql = "call sp_insertPostulante(?,?,?,?,?,?,?,?,?,?)";
        $bd = new Connect;
        return $bd ->ejecutar($sql,$lista);
    }
    public static function verPostulantes(){
        $sql="call sp_verPostulantes";
        $bd = new Connect;
        $data=$bd->sentencia($sql);
        return $data;
    }
    public static function actualizarPostulante($lista){
        $sql = "call sp_updatePostulante(?,?,?,?,?,?,?)";
        $bd = new Connect;
        return $bd->ejecutar($sql,$lista);
    }
    public static function subirArchivo($lista){
        $sql = "insert into archivo values(null,?,?,?)";
        $bd = new Connect;
        return $bd ->ejecutar($sql,$lista);
    }
    public static function buscarIdPostulante($cel){
        $sql = "call sp_buscarIdPostulante($cel)";
        $bd = new Connect;
        $data = $bd->sentenciaSimple($sql);
        return $data->DATid;  
    }
         
    public static function verArchivo(){
        $sql = "select * from archivo";
        $bd = new Connect;
        $data = $bd->sentencia($sql);
        return $data;
         
    }
    public static function verPostulanteEstado(){
        $sql = "call sp_verPostulanteEstado";
        $bd = new Connect;
        $data = $bd->sentencia($sql);
        return $data;
         
    }
    public static function verPostulanteSeleccionado(){
        $sql = "call sp_verSeleccionados";
        $bd = new Connect;
        $data = $bd->sentencia($sql);
        return $data;
         
    }
    public static function yaRegistrado($cel){
        $sql = "call sp_PostulanteRegistrado($cel)";
        $bd = new Connect;
        $data = $bd->sentencia($sql);
        return $data;
         
    }
    public static function EliminarPostulante($id){
        $sql = "delete from dato where dato.DATid = $id";
        $bd = new Connect;
        return $bd->ejecutar($sql,null);
        
    }
}
?>