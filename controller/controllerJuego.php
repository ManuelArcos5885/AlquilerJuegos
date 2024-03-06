<?php
require_once './model/juego.php';
require_once 'conexion.php';

class controllerJuego{
    public static function insertar($jue){
        try {
            $con = new conexion();        
            
            $con->query("Insert into juegos values('$jue->Codigo','$jue->Nombre_juego','$jue->Nombre_consola','$jue->Anno','$jue->Precio','$jue->alguilado','$jue->imagen','$jue->descripcion')");
            
            $filasAfectadas = $con->affected_rows;
            
            $con->close();
            
            
        } catch (Exception $ex) {
            echo($ex->getCode()."-".$ex->getMessage());
            $filasAfectadas = false;
        }
        
        return $filasAfectadas;

    }
    
    public static function encontrarNoAlguilado($codigo){

        $con = new conexion();
        
        $result = $con->query("Select * from juegos where alguilado = NO;");
        
        return $result;
    }
    
        
    public static function encontrarTodos(){

        $con = new conexion();
        
        $result = $con->query("Select * from juegos;");
        
        
        return $result;
    }
    
    public static function encontrarCodigo($cod) {
        $con = new conexion();
        
        $result=$con->query("Select * from juegos where Codigo='$cod'");
        
        return $result->fetch_object();

    }
    
    public static function borrarJuego($cod) {
        $con = new conexion();
        
        $con->execute_query("delete from juegos where Codigo='$cod'");
        
       if($con->affected_rows){
           return true;
       }
       else{
           return false;
       }
    }




    public static function encontrarAlguilado($codigo){

        $con = new conexion();
        
        $result = $con->query("Select * from juegos where Alguilado = SI;");
        
        return $result;
    }
    
    public static function actualizar($cod,$nombre,$consola,$anno,$prec,$ruta,$des) {
        $con = new conexion();
        
        $con->query("Update juegos set Nombre_juego='$nombre', Nombre_consola='$consola',Anno='$anno',Precio='$prec',Imagen='$ruta',Descripcion='$des' where Codigo='$cod'");
        
        echo "holla: ".$con->affected_rows;
        return $con->affected_rows;
        
    }
    
}

