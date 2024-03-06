<!doctype html>
<html>
    <head>
        <title>Registro</title>
    </head>
    <body>
        <?php 
        require_once 'controller/controllerCliente.php';
        session_start();
        
        if(isset($_POST["volver"])){
            $_SESSION["usuarioRegistrado"] = "false";
            header("location:index.php");
        }
        
        if(isset($_POST["registrar"])){
            $pass = $_POST['clave'];
            $hash_md5=md5($pass);

                    
            $cli = new cliente($_POST["dni"],$_POST["Nombre"],$_POST["Apellidos"],$_POST["direccion"],$_POST["localidad"],$hash_md5,$_POST["tipo"]);
            
            $_SESSION["usuarioRegistrado"] = $cli;
            
            $filasAfectadas = controllerCliente::insertar($cli);
            
            if($filasAfectadas == false){
                echo "Se ha producido un error!!!<br>";
            }
            else{
                header("location:index.php");      
            }
        }
        
        ?>
        <form name="form3" action="" method="POST">
            <h1>Registro</h1><br><br>

            DNI: <input type="text" name="dni"><br>
            Nombre: <input type="text" name="Nombre"><br>
            Apellidos: <input type="text" name="Apellidos"><br>
            Direccion: <input type="text" name="direccion"><br>
            Localidad: <input type="text" name="localidad"><br>
            Clave: <input type="password" name="clave"><br>
            Tipo: <select name="tipo">
                <option value="cliente">Cliente</option>
                <option value="admin">Admin</option>
            </select><br><br>
            <input type="submit" name="volver" value="volver">
            <input type="submit" name="registrar" value="registrar">
        
        </fomr>
        
        
        
    </body>
</html>


<?php

