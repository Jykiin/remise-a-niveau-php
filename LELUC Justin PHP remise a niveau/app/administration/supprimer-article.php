<?php
header("Location:../mes-articles.php");
$link = mysqli_connect('db', 'root', 'root', 'data');
$id = $_POST['id'];
$request = "DELETE FROM message WHERE id='$id'";
mysqli_query($link,$request);

?>