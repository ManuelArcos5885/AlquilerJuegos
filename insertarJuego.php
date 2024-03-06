<!doctype html>
<html>
    <head>
        <title>Introducir juego</title>
    </head>
    <body>
        
        <?php 
        require_once 'controller/controllerJuego.php';
        
        if(isset($_POST["volver"])){
            header("location:index.php");
        }
        if(isset($_POST["aniadir"])){
            $nombre = $_POST["nombre"];
            
            
            //hacemos un array a partir del nombre del juego, y conseguimos su primera letra
            $nombres = explode(" ", $nombre);
            
            $codigo = " ";
            for ($i=0;$i< count($nombres);$i++){
                $codigo .= substr($nombres[$i],0, 1);
            }
            
            //añadimos al codigo el nomrbe de la consola
            $codigo .= "_$_POST[consola]";
            
           //comprueba que el archivo nya se haya subido
            if(is_uploaded_file($_FILES["foto"]["tmp_name"])){ 
            
                $fich = time().$_FILES["foto"]["name"];

                $ruta="imagenes/".$fich;

                move_uploaded_file($_FILES["foto"]["tmp_name"], $ruta);

                $juego = new juego($codigo, $_POST["nombre"], $_POST["consola"], $_POST["anio"], $_POST["precio"], "NO", $ruta, $_POST["descripcion"]);



                $filasAfectadas = controllerJuego::insertar($juego);

                if($filasAfectadas > 0){
                    echo "<h3>Insertado con exito;</h3><br>";
                }
                else{
                    echo "<h3>Se ha producido un error;</h3><br>";
                }
            
            }
            else{
                echo "<h3>Se ha producido un error al subir el fichero;</h3><br>";
            }
            
        }
        ?>
        
        <form action="" method="POST" name="form1" enctype="multipart/form-data">
            Nombre: <input type="text" name="nombre"><br>
            Consola: <input type="text" name="consola"><br>
            Año: <input type="text" name="anio"><br>
            Precio: <input type="text" name="precio"><br>
            Imagen: <input type="file" name="foto"><br>
            
            Descripcion: <input type="text" name="descripcion"><br><br>
            
            <input type="submit" name="aniadir" value="aniadir">
            <input type="submit" name="volver" value="volver">
        </form>
        

    <?php
    ?>

    </body>
</html>


