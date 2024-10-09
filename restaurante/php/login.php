<?php
    include ('conn.php');
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
            <h1>Iniciar Sesión</h1>
        <form method="post">
            <h2>E-Mail: </h2>
            <input type="email" name="email" id="email">
            <h2>Contraseña: </h2>
            <input type="password" name="contraseña" id="contraseña"> <br>
            <input type="submit" value="Login" name="login" id="login">
        </form>
        </div>
        
    </div>
</body>
<?php
    if(isset($_POST['login'])){
        if(!empty($_POST['email'] && !empty($_POST['contraseña']))){
            $email = trim($_POST['email']);
            $contraseña = trim($_POST['contraseña']);
            $verificar_usuario = mysqli_query($conn, "SELECT * FROM usuario where email = '$email' AND contraseña = '$contraseña'");
        }
    }
?>
</html>