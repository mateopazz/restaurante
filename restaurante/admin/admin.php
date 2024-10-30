<?php
    include('../database/conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="admin.css">
    <title>Document</title>
</head>
<body>
    
    <form method="post" enctype="multipart/form-data">
        <H1>INGRESAR PLATO</H1>
        <p>Nombre del Plato:</p>
        <input type="text" name="nombre_plato">
        <p>Categoría:</p>   
        <div class="categoria">
        <input type="radio" name="categoria" value="entrada" checked><span>Entrada</span>
        <input type="radio" name="categoria" value="principal"><span>Principal</span>
        <input type="radio" name="categoria" value="postre"><span>Postre</span>
        <input type="radio" name="categoria" value="bebidas"><span>Bebidas</span>
        </div>
        <p>Precio:</p>
        <input type="number" name="precio">
        <p>Ingredientes:</p>
        <input type="text" name="ingredientes">
        <p>Imagen:</p>
        <input type="file" name="imagen" required>
        <input type="submit" value="Subir Plato" name="subir" id="submit">
    </form>

    <form method="post">
        <h1>MODIFICAR PLATO</h1>
        <p>Nombre del Plato a modificar</p>
        <input type="text" name="nombre_plato">
        <p>Nuevo Nombre:</p>
        <input type="text" name="nuevo_nombre">
        <p>Nueva Categoría:</p>
        <div class="categoria">
        <input type="radio" name="categoria" value="entrada" checked><span>Entrada</span>
        <input type="radio" name="categoria" value="principal"><span>Principal</span>
        <input type="radio" name="categoria" value="postre"><span>Postre</span>
        <input type="radio" name="categoria" value="bebidas"><span>Bebidas</span>
        </div>
        <p>Nuevo Precio:</p>
        <input type="number" name="precio">
        <p>Nuevos Ingredientes:</p>
        <input type="text" name="ingredientes"><br>
        <input type="submit" value="Actualizar Plato" name="modificar" id="submit">
    </form>
<?php
    

    /*INGRESO DE DATOS*/
    if(isset($_POST['subir'])){
        if(!empty($_POST['nombre_plato']) && !empty($_POST['categoria']) && !empty($_POST['precio']) && !empty($_POST['ingredientes'])){
            $nombre = $_POST['nombre_plato'];
            $categoria = $_POST['categoria'];
            $precio = $_POST['precio'];
            $ingredientes = $_POST['ingredientes'];
            $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

            $duplicado = mysqli_query($conn, "SELECT * FROM menu where nombre = '$nombre'");

            if($row = mysqli_num_rows($duplicado) > 0){
                echo "<script>alert('el producto ya existe')</script>";
                
            }
            else{
                $sql = mysqli_query($conn, "INSERT INTO menu (nombre, categoria, precio, ingredientes, imagen) VALUES ('$nombre','$categoria','$precio','$ingredientes', '$imagen')");
            }
        }
        
    }
?>
    <table>
        <tr>
            <th>Nombre</th><th>Categoría</th><th>Precio</th><th>Ingredientes</th>
        </tr>

    </table>
</body>
</html>