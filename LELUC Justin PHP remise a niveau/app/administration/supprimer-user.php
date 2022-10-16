<?php
header("Location:../user-gestion.php");
$link = mysqli_connect('db', 'root', 'root', 'data');
$id = $_POST['id'];
$request = "DELETE FROM user WHERE id='$id'";
mysqli_query($link,$request);

?>