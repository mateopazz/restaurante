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
        </div>
        
    </div>
</body>
<?php
if(!empty($_POST['nombre'])&&!empty($_POST['email'])&&!empty($_POST['contraseña'])){
    if(isset($_POST['register'])){
        $nombre=$_POST['nombre'];
        $email=$_POST['email'];
        $contraseña=$_POST['contraseña'];
        $verificar=mysqli_query($conn, "SELECT * FROM usuario where correo = '$email'");
        if(!$verificar){
            $subir=mysqli_query($conn,"INSERT INTO usuario (nombre_completo,correo,contraseña) VALUES ('$nombre','$email','$contraseña')");
            echo"<script>header.href:login.php</script>";
        }
        else{
            echo"error";
        }
    }
}
else{
    echo "no se pudo registrar";
}
?>
</html>