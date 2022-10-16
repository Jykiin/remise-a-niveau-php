<?php 
session_start();
$link = mysqli_connect('db', 'root', 'root', 'data');
$titre = $_POST['titre'];
$text = $_POST['text'];
$date = $_POST['date'];

$user_id=$_SESSION["id_user"];

$query = "INSERT INTO message (titre, text, date, user_id ) VALUES ('$titre', '$text','$date','$user_id')";

// echo $query;

if (mysqli_query($link, $query) === TRUE) {
    // echo "requête OK";
    // echo mysqli_affected_rows($link);
}
else {
    // echo "requête KO " .  mysqli_error($link);
}
header("Location:../index.php")

?>
