<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="verificarAdmin.css">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <P>INGRESE EL PIN DE SEGURIDAD</P>
        <input type="number" name="pin" required>
        <input type="submit" name="verificar" id="verificar">
    </form>

    <?php
    include("../database/conn.php");
        if(isset($_POST['verificar'])){
            $pin = $_POST['pin'];
            $sql = mysqli_query($conn, "SELECT * FROM administradores where pin = '$pin'");
            
            if($datos = mysqli_num_rows($sql) > 0){
                echo "<script>alert('administrador verificado')</script>";
                echo "<script>location.href='admin.php'</script>";
            }
            
        }
    ?>
</body>
</html>