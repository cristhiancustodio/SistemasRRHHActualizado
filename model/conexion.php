<?php
class Connect{
    private $bd='sistemasrrhh';
    private $host='localhost:3307';
    private $usuario='root';
    private $password='cristhian123456';
    function conectar(){
        try {
            $conexion= new PDO("mysql:host=$this->host;dbname=$this->bd",$this->usuario,$this->password);
            if($conexion){
                
                return $conexion;
            }
            else{
                return null;
            }
        } catch (PDOException $e) {
            echo "Error".$e;
        }

    }
    function sentenciaSimple($sql){
        $con=$this->conectar($sql);
        $stmt=$con->query($sql);
        $row=$stmt->fetch(PDO::FETCH_OBJ);
        return $row;  
    }
    function sentencia($sql){
        $con=$this->conectar($sql);
        $stmt=$con->query($sql);
        $row=$stmt->fetchAll(PDO::FETCH_OBJ);
        return $row;  
    }
    function ejecutar($sql,$lista){
        $con = $this->conectar();
        $stmt=$con->prepare($sql);
        $stmt->execute($lista);
        
    }
}

?>