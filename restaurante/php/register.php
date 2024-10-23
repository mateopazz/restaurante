<?php
include('conn.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css"> 
    <title>Document</title>
</head>
<body>
    <div class="box">
        <div class="form">
            <h1>Registrarse</h1>
        <form method="post">
            <h2>Nombre completo: </h2>
            <input type="text" name="nombre" id="nombre">
            <h2>E-Mail: </h2>
            <input type="email" name="email" id="email">
            <h2>Contraseña: </h2>
            <input type="password" name="contraseña" id="contraseña"> <br>
            <input type="submit" value="Registrarse" name="register" id="login">
        </form>
        <p>Ya tenés una cuenta? <span><a href="login.php">inicia sesión</a></span></p>
        </div>
        
    </div>
</body>
<?php
if(isset($_POST['register'])){
    if(strlen($_POST['nombre']) >= 1 && strlen($_POST['email']) >= 1 && strlen($_POST['contraseña']) >=1){
        $nombre = trim($_POST['nombre']);
        $email = trim($_POST['email']);
        $contraseña = trim($_POST['contraseña']);
        $num_id = rand(100000, 10000000);
        
        
        $duplicado = mysqli_query($conn, "SELECT * FROM usuario where correo = '$email'");
        if(mysqli_num_rows($duplicado) > 0){
            echo "<script>alert('Usuario existente')</script>";
            
        }
        else{
            $sql = mysqli_query($conn, "INSERT INTO usuario (id_usuario, nombre_completo, correo, contraseña) VALUES ('$num_id','$nombre', '$email', '$contraseña')");
            if($sql){
                
                echo "<script>alert('datos ingresados con exito')</script>";
                echo "<script>location.href='login.php'</script>";
            }
        }
        

        
    }
}
else{
    echo "no se pudo registrar";
}
?>
</html>