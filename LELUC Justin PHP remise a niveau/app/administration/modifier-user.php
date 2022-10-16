<?php
session_start();
$link = mysqli_connect('db', 'root', 'root', 'data');
$id = $_POST['id'];
$query = "SELECT name, id, user_type FROM user WHERE id='$id'";

$result = mysqli_query($link, $query);
$row = mysqli_fetch_assoc($result);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Modifier</title>
</head>

<body>
<header>

        <H1 style="text-align: center;">Modifier un user</H1>
    <nav>
        <ul class="liste">
        <li><a href="/index.php">Accueil</a></li>
        <li><a href="/nouvel-article.php">Créer un article</a></li>
        <li><a href="/mes-articles.php">Mes articles</a></li>
        <?php
        if ($_SESSION["user_type"]==1){
            echo ('<li><a href="/user-gestion.php">Gestions des utilisateurs</a></li>');
        }
        ?>
        <li><a href="/connexion.php">Déconnexion</a></li>
       
        </ul>
    </nav>
    </header>
    <main>
    <form action="modification-user.php" method="POST">
    <label for="name">Pseudo de l'utilisateur</label>
        <textarea name="name" id="name" cols="30" rows="1"><?php echo $row['name']?></textarea>
        <?php
            if ($row['user_type']==1) {
                echo("<label for='text'>Type d'utilisateur</label>
                        <select name='user_type' id=''>
                        <option value='1'>Admin</option>
                        <option value='0'>Utilisateur</option> 
                         </select>");
            }else {
                echo("<label for='text'>Type d'utilisateur</label>
                        <select name='user_type' id=''>
                        <option value='0'>Utilisateur</option>
                        <option value='1'>Admin</option>
                         </select>");
            };
            
        ?>
        <input type="hidden" name="id" value=<?php echo $id?>>

        <input type="submit" value="Modifier">
    </form>
    </main>
    <footer>
        <p>Site réalisé par Justin LELUC Web 2 HETIC</p>
    </footer>
</body>


</html>