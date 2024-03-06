<!doctype html>
<html>
    <head>
        <title>modificar</title>
    </head>
    <body>
    <?php
    require_once './controller/controllerJuego.php';
    
    
    
    
    if(isset($_POST["volver"])){
        header("location:index.php");
    }
    
    if(isset($_POST["modificarJuego"])){
        $cod = $_POST["codigo"];
        
        $ruta=$_POST["ruta"];


            if(isset($_FILES["foto"]) && is_uploaded_file($_FILES["foto"]["tmp_name"])){
                $fich = time().$_FILES["foto"]["name"];

                $ruta ="imagenes/".$fich;

                //mueve el fichero a la carpeta
                move_uploaded_file($_FILES["foto"]["tmp_name"],$ruta);
                
                
            }
        
        
        echo "ruta: ".$ruta;
                    
            $filas = controllerJuego::actualizar($cod, $_POST["nombre"], $_POST["consola"], $_POST["anio"], $_POST["precio"], $ruta, $_POST["descripcion"]);
            
            
            if($filas>0){
                header("location:index.php");
            }
            else{
                echo "<h1>Ha ocurrido un error</h1><br>";
            }
    }
    

    
    
    
    if(isset($_POST["Codigo"])){
        $jue = controllerJuego::encontrarCodigo($_POST["Codigo"]);
    }
    else{
        header("location:index.php");
    }
 
    
    
    
    
    
    
    
    ?>
        <h1>Modificar</h1><br><br>
        <form action="" method="POST" name="form1" enctype="multipart/form-data">>
            Nombre: <input type="text" name="nombre" value="<?php echo $jue->Nombre_juego ?>"><br>
            Consola: <input type="text" name="consola" value="<?php echo $jue->Nombre_consola ?>"><br>
            Año: <input type="text" name="anio" value="<?php echo $jue->Anno ?>"><br>
            Precio: <input type="text" name="precio" value="<?php echo $jue->Precio ?>"><br>
            Imagen actual:<img src="<?php echo $jue->Imagen ?>" style="width: 80px"> <input type="file" name="foto"><br>
            
            Descripcion: <input type="text" name="descripcion" value="<?php echo $jue->descripcion ?>"><br><br>
            
            <input type="hidden" name="ruta" value="<?php echo $jue->Imagen ?>">
            <input type="hidden" name="codigo" value="<?php echo $_POST['Codigo'] ?>">
            <input type="submit" name="modificarJuego" value="modificar">
            <input type="submit" name="volver" value="volver">
        </form>
    </body>
</html>



<?php
?>

