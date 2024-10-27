<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&icon_names=dinner_dining" />
    <title>Document</title>
</head>
<body>
    <header>
        <h2><span class="material-symbols-outlined">dinner_dining</span>RESTAURANTE</h2>
        <div class="opciones">
            <li><a href="">Ver Menú</a></li>
            <li><a href="">Tus Pedidos</a></li>
            <li><a href="">Puntos de Encuentro</a></li>
            <li><a href="">Contactos</a></li>
        </div>
    </header>
    <div class="menu">
        <div class="principales">
            <?php
                include('database/conn.php');
                $principal = mysqli_query($conn, "SELECT * FROM menu where categoria = 'Principal'");
                while($row_principal=mysqli_fetch_assoc($principal)){
                    $precio_converted = number_format($row_principal['precio'], 2, ',', '.');
                    ?>
                    
                    <div class="carta">
                        <div class="imagen"><img src="no_image.png" alt="" width="300"></div>
                        <div class="nombre"><?php echo $row_principal['nombre']?></div>
                        
                        <div class="precio"><?php echo "$".$precio_converted?></div>
                    </div>




                    <?php
                }
            ?>
        </div>
    </div>
</body>
</html>