<!doctype html>
<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <?php 
        require_once 'controller/controllerCliente.php';
        
        session_start();
        
        if(isset($_POST["volver"])){
            
            $_SESSION["usuarioRegistrado"] = "false";
            
            header("location:index.php");  
        }
        
        if(isset($_POST["entrar"])){
            if(controllerCliente::comprobar($_POST["dni"], $_POST["clave"])){
                $usu = controllerCliente::encontrar($_POST["dni"]);
            
            
                $cli = new cliente($usu->DNI,$usu->Nombre,$usu->Apellidos,$usu->Direccion,$usu->Localidad,$usu->Clave,$usu->Tipo);
            
                
                $_SESSION["usuarioRegistrado"] = $cli;
                
                header("location:index.php");
            }
            else{
                echo "<h2 style='color:red'>Controseña o dni incorrecto!!!</h2>";
            }
            
            
        }
        ?>
        
        <form action="" method="POST" name="form1">
            DNI: <input type="text" name="dni"><br>
            CLAVE: <input type="password" name="clave"><br><br> 

            <input type="submit" name="volver" value="Volver">
            <input type="submit" name="entrar" value="Entrar">
        </form>

    </body>
</html>


<?php

/* 
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

