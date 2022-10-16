<?php
header("Location:../user-gestion.php");
$link = mysqli_connect('db', 'root', 'root', 'data');
$name = $_POST['name'];
$user_type = $_POST['user_type'];

$id = $_POST['id'];

$request = "UPDATE user SET name = '$name', user_type = '$user_type' WHERE id = '$id'";
mysqli_query($link,$request);


?>
