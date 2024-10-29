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
    <h1 class="categoriaMenu">Entradas</h1>
        <div class="platos">
           
            <?php
                include('database/conn.php');
                $principal = mysqli_query($conn, "SELECT * FROM menu where categoria = 'Entrada'");
                while($row_principal=mysqli_fetch_assoc($principal)){
                    $precio_converted = number_format($row_principal['precio'], 2, ',', '.');
                    ?>
                    
                    <div class="carta">
                        <div class="imagen">
                            <?php
                                if(!empty($row_principal['imagen'])){
                                    ?><img height="300px" src="data:image/jpg;base64,<?php echo base64_encode($row_principal['imagen']);?>"><?php
                                }
                                else{
                                    ?><img src="no_image.png" width="300px"><?php
                                }
                            ?>
                        </div>
                        <div class="nombre"><?php echo $row_principal['nombre']?></div>
                        
                        <div class="precio"><?php echo "$".$precio_converted?></div>
                    </div>




                    <?php
                }
            ?>
        </div>
        <h1 class="categoriaMenu">Platos Principales</h1>
        <div class="platos">
           
            <?php
                include('database/conn.php');
                $principal = mysqli_query($conn, "SELECT * FROM menu where categoria = 'Principal'");
                while($row_principal=mysqli_fetch_assoc($principal)){
                    $precio_converted = number_format($row_principal['precio'], 2, ',', '.');
                    ?>
                    <div class="carta">
                        <div class="imagen">
                            <?php
                                if(!empty($row_principal['imagen'])){
                                    ?><img height="300px" src="data:image/jpg;base64,<?php echo base64_encode($row_principal['imagen']);?>"><?php
                                }
                                else{
                                    ?><img src="no_image.png" width="300px"><?php
                                }
                            ?>
                        </div>
                        <div class="nombre"><?php echo $row_principal['nombre']?></div>
                        <div class="precio"><?php echo "$".$precio_converted?></div>
                    </div>
                    <?php
                }
            ?>
        </div>
        <h1 class="categoriaMenu">Bebidas</h1>
        <div class="platos">
           
            <?php
                include('database/conn.php');
                $principal = mysqli_query($conn, "SELECT * FROM menu where categoria = 'Bebidas'");
                while($row_principal=mysqli_fetch_assoc($principal)){
                    $precio_converted = number_format($row_principal['precio'], 2, ',', '.');
                    ?>
                    <div class="carta">
                        <div class="imagen">
                            <?php
                                if(!empty($row_principal['imagen'])){
                                    ?><img height="300px" src="data:image/jpg;base64,<?php echo base64_encode($row_principal['imagen']);?>"><?php
                                }
                                else{
                                    ?><img src="no_image.png" width="300px"><?php
                                }
                            ?>
                        </div>
                        <div class="nombre"><?php echo $row_principal['nombre']?></div>
                        <div class="precio"><?php echo "$".$precio_converted?></div>
                    </div>
                    <?php
                }
            ?>
        </div>
        <h1 class="categoriaMenu">Postres</h1>
        <div class="platos">
           
            <?php
                include('database/conn.php');
                $principal = mysqli_query($conn, "SELECT * FROM menu where categoria = 'Postre'");
                while($row_principal=mysqli_fetch_assoc($principal)){
                    $precio_converted = number_format($row_principal['precio'], 2, ',', '.');
                    ?>
                    <div class="carta">
                        <div class="imagen">
                            <?php
                                if(!empty($row_principal['imagen'])){
                                    ?><img height="300px" src="data:image/jpg;base64,<?php echo base64_encode($row_principal['imagen']);?>"><?php
                                }
                                else{
                                    ?><img src="no_image.png" width="300px"><?php
                                }
                            ?>
                        </div>
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