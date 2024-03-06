<?php
require_once './model/cliente.php';
require_once 'conexion.php';

class controllerCliente{
    public static function insertar($cli){
        try {
            $con = new conexion();         
            $con->query("Insert into cliente values('$cli->dni','$cli->nombre','$cli->apell','$cli->direc','$cli->local','$cli->clave','$cli->tipo')");
            
            $filasAfectadas = $con->affected_rows;
            
            $con->close();
            
            
        } catch (Exception $ex) {
            echo($ex->getCode()."-".$ex->getMessage());
            $filasAfectadas = false;
        }
        
        return $filasAfectadas;

    }
    
    public static function comprobar($dni,$clave){

        $con = new conexion();
        
        $result = $con->query("Select * from cliente where dni = '$dni';");
        
        $usuario = $result->fetch_object();

        if(md5($clave)==$usuario->Clave){

            $con->close();
            return true;
            
        }
        else{

            $con->close();
            return false;
        }
    }
    
    
    public static function encontrar($dni){
        $con = new conexion();
        
        $result = $con->query("Select * from cliente where dni = '$dni';");
        
        $usuario = $result->fetch_object();
        
        $con->close();
        return $usuario;
        
    }
}

