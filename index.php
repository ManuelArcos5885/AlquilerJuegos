<!doctype html>
<html>
    <head>
        <title>Index</title>
    </head>
    <style>
        table{
            border: 1px solid black;
        }
        tr{
           border: 1px solid black; 
        }
        td{
            border: 1px solid black; 
        }
        
        img{
            width: 80px;
        }
    </style>
    <body>
        <?php
        require_once './model/cliente.php';
        require_once './controller/controllerJuego.php';
        

        
        
        if(isset($_POST["borrar"])){
            if(controllerJuego::borrarJuego($_POST["Codigo"])){
                echo "<h1>eliminado con exito</h1>";
            }
            else{
                echo "<h1>Ha ocurrido un error</h1>"; 
            }
            
        }
        
        
        
        ?>
        <a href="login.php">Login</a><a href="registro.php">Registro</a><br>
        <?php 
        session_start();
        if(isset($_SESSION["usuarioRegistrado"]) && $_SESSION["usuarioRegistrado"] != "false"){ ?>
        <h4>Bienvenido usuario <?php echo $_SESSION["usuarioRegistrado"]->nombre." ".$_SESSION["usuarioRegistrado"]->apell ?></h4><br>
        
        <?php }
        else{
            echo "<h4>Bienvenido usuario anonimo</h4><br>";
        }
        
        ?>
        
        <a href="">Todos</a><a href="">Alquilados</a><a href="">No alquilados</a><a href="">Mis juegos Alquilados</a><br><br>
            
        <?php 

        $result = controllerJuego::encontrarTodos();
        while ($reg = $result->fetch_object()){
            echo "<div>Nombre: $reg->Nombre_juego";
            echo "<img src=$reg->Imagen> <form action='' method='POST' name='form1'><input type='submit' name='borrar' value='borrar'><input type='hidden' name='Codigo' value='$reg->Codigo'></form><form action='modificar.php' method='POST' name='form2'><input type='submit' name='modificar' value='modificar'><input type='hidden' name='Codigo' value='$reg->Codigo'></form></div>";
        }
        
        
        
        

        
        
        
        
        ?>    
        
        

    </body>
</html>


<?php


