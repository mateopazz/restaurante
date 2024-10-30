<?php
require_once("../database/conn.php");
$id_menu = $_GET['id_menu'];

$sql = mysqli_query($conn, "DELETE FROM menu where id_menu = '$id_menu'");

header("location:admin.php");
?>