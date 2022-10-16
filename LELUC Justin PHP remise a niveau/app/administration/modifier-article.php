<?php
session_start();
$link = mysqli_connect('db', 'root', 'root', 'data');
$id = $_POST['id'];
$query = "SELECT titre, text, date FROM message WHERE id='$id'";

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
    
        <H1 style="text-align: center;">Modifier un article</H1>
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
    <form action="modification-article.php" method="POST">
        <label for="titre">Titre</label>
        <textarea name="titre" id="titre" cols="30" rows="1"><?php echo $row['titre']?></textarea>
        <!-- <input type="text" name="titre" value= echo $row['titre']> -->
        <label for="text">Texte</label>
        <textarea name="text" id="text" cols="30" rows="5"><?php echo $row['text']?></textarea>
        <label for="date">Date</label>
        <input required type="date" name="date" value=<?php echo $row['date'] ?>>
        <input type="hidden" name="id" value=<?php echo $id?>>

        <input type="submit" value="Modifier">
    </form>
    </main>
    <footer>
        <p>Site réalisé par Justin LELUC Web 2 HETIC</p>
    </footer>
</body>



</html>