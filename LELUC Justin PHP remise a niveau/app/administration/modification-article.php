<?php
header("Location:../mes-articles.php");
$link = mysqli_connect('db', 'root', 'root', 'data');
$titre = $_POST['titre'];
$text = $_POST['text'];
$date = $_POST['date'];

$id = $_POST['id'];

$request = "UPDATE message SET titre = '$titre', text = '$text', date = '$date' WHERE id = '$id'";
mysqli_query($link,$request);


?>
