<?php 

$link = mysqli_connect('db', 'root', 'root', 'data');
$name = $_POST['name'];
$password = $_POST['password'];
$user_type = $_POST['user_type']; 
$password_hashed = password_hash($password, PASSWORD_DEFAULT);

$query = "INSERT INTO user (name, password, user_type) VALUES ('$name', '$password_hashed','$user_type')";

// echo $query;

if (mysqli_query($link, $query) === TRUE) {
    // echo "requête OK";
    // echo mysqli_affected_rows($link);
}
// else {
//     echo "requête KO " .  mysqli_error($link);
// }
header("Location:../connexion.php")


?>