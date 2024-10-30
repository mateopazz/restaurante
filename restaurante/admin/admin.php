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
    <div class="formularios">
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
        <input type="text" name="nombre_plato" required>
        <p>Nuevo Nombre:</p>
        <input type="text" name="nuevo_nombre" required>
        <p>Nueva Categoría:</p>
        <div class="categoria">
        <input type="radio" name="categoria" value="entrada" checked><span>Entrada</span>
        <input type="radio" name="categoria" value="principal"><span>Principal</span>
        <input type="radio" name="categoria" value="postre"><span>Postre</span>
        <input type="radio" name="categoria" value="bebidas"><span>Bebidas</span>
        </div>
        <p>Nuevo Precio:</p>
        <input type="number" name="precio" required>
        <p>Nuevos Ingredientes:</p>
        <input type="text" name="ingredientes" required><br>
        <input type="submit" value="Actualizar Plato" name="modificar" id="submit">
    </form>

    
    </div>
    
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
    /*MODIFICACION DE DATOS*/
    if(isset($_POST['modificar'])){
        if(!empty($_POST['nombre_plato'])){
            $nombreModificar = $_POST['nombre_plato'];
            $nuevo_nombre = $_POST['nuevo_nombre'];
            $categoria = $_POST['categoria'];
            $precio = $_POST['precio'];
            $ingredientes = $_POST['ingredientes'];

            $sql = mysqli_query($conn, "UPDATE menu SET nombre = '$nuevo_nombre', categoria ='$categoria', precio='$precio', ingredientes='$ingredientes' where nombre = '$nombreModificar'");
        }
    }
?>
    <table>
        <tr>
            <th>Nombre</th><th>Categoría</th><th>Precio</th><th>Ingredientes</th>
        </tr>
        <?php
        $mostrar = mysqli_query($conn, "SELECT * FROM menu");
        while($fila = mysqli_fetch_array($mostrar)){
            ?>
            <tr id="fila">
            <td>
                <?php
                    echo $fila['nombre'];
                ?>
            </td>
            <td>
                <?php
                    echo $fila['categoria'];
                ?>
            </td>
            <td>
                <?php
                $precio_formato = number_format($fila['precio'], 2, ',', '.');
                    echo $precio_formato;
                ?>
            </td>
            <td id="ingredientes">
                <?php
                    echo $fila['ingredientes'];
                ?>
            </td>
            <td>
                <a href="delete.php?id_menu=<?php echo $fila['id_menu']?>" style="color: #d92323;">Eliminar</a>
            </td>
        </tr>   
        <?php
        }
        ?>
        
    </table>

    <div class="formularios">
    <form method="post" id="ingresarIngrediente">
        <h1>INGRESAR INGREDIENTES</h1>
        <p>Nombre del ingrediente:</p>
        <input type="text" name="nombre_ingrediente" required>
        <p>Categoría del ingrediente:</p>
        <div class="categoriaIngrediente">
        <input type="radio" name="categoriaingrediente" value="Leche y derivados" checked><span>Leche y derivados</span>
        <input type="radio" name="categoriaingrediente" value="Carnes, pescados y huevos"><span>Carnes, pescados y huevos</span>
        <input type="radio" name="categoriaingrediente" value="Tuberculos, legumbres y frutos secos"><span>Tuberculos, legumbres y frutos secos</span>
        <input type="radio" name="categoriaingrediente" value="Verduras y hortalizas"><span>Verduras y hortalizas</span>
        <input type="radio" name="categoriaingrediente" value="Frutas"><span>Frutas</span>
        <input type="radio" name="categoriaingrediente" value="Cereales, pan, pasta, y azucar"><span>Cereales, pan, pasta, y azucar</span>
        <input type="radio" name="categoriaingrediente" value="Grasas, aceite y manteca"><span>Grasas, aceite y manteca</span>
        </div>
        <p>Cantidad:</p>
        <input type="number" name="cantidad" required>
        <br>
        <input type="submit" value="Ingresar Ingredientes" name="ingredientes-in" id="submit">
    </form>
    <form method="post" id="ingresarIngrediente">
        <h1>REALIZAR MODIFICACION DE INVENTARIO:</h1>
        <p>Ingrediente:</p>
        <input type="text" name="nombreingrediente">
        <p>INGRESAR // EGRESAR:</p>
        <div class="opcion">
        <input type="radio" value="ingreso" name="opcion" checked><span style="color: green;" >Ingreso</span>
        <input type="radio" value="egreso" name="opcion"><span style="color: black;">Egreso</span>
        </div>
        <p>Cantidad:</p>
        <input type="number" name="cantidad" required>
        <p>Motivo:</p>
        <input type="text" name="motivo">
        <br>
        <input type="submit" value="Realizar modificación de ingredientes" name="ingredientesmodificacion" id="submit">
    </form>

    </div>

    <?php
        if(isset($_POST['ingredientes-in'])){
            if(!empty($_POST['nombre_ingrediente'])){
                $nombre_ingrediente = $_POST['nombre_ingrediente'];
                $categoriaingrediente = $_POST['categoriaingrediente'];
                $cantidad = $_POST['cantidad'];
                $duplicado = mysqli_query($conn, "SELECT * FROM inventario where nombre_ingrediente = '$nombre_ingrediente'");

                if(mysqli_num_rows($duplicado) >0){
                    echo "<script>alert('el producto ya existe. Si quiere agregar ingredientes, modifique el inventario')</script>";
                }
                else{
                    echo "<script>alert('Ingrediente ingresado')</script>";
                    $sql = mysqli_query($conn, "INSERT INTO inventario (nombre_ingrediente, cantidad, categoria) VALUES ('$nombre_ingrediente', '$cantidad', '$categoriaingrediente')");
                }
            }
        }
        if(isset($_POST['ingredientesmodificacion'])){
            if(!empty($_POST['opcion']) && !empty($_POST['cantidad'])){
                $ingrediente = $_POST['nombre_ingrediente'];
                $ingresoegreso = $_POST['opcion'];
                $categoria = $_POST['categoriaingrediente'];
                $cantidad = $_POST['cantidad'];
                $motivo = $_POST['motivo'];

                $sql = mysqli_query($conn, "INSERT INTO reportes (ingrediente, ingreso o egreso, cantidad, motivo) VALUES ('$ingrediente', '$ingresoegreso', '$categoria', '$cantidad', '$motivo')");
            }
        }
    ?>
</body>
</html>