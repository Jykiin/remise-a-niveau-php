<?php
session_start();

if ($_SESSION["id_user"]==null) {
    header("Location:connexion.php");
}
$id_user=$_SESSION["id_user"];



    $link = mysqli_connect('db', 'root', 'root', 'data');

    // if (mysqli_connect_errno()) {
    // echo 'erreur de connexion : ' . mysqli_connect_error();
    //      exit;
    //  }
    //  else {
    //      echo "connexion réussie";
    //  }

     
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Nouvel article</title>
</head>
<body>
<header>
        <H1 style="text-align: center;">Nouvel article</H1>
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
<form  action="administration/inserer-article.php" method="POST" enctype="multipart/form-data" id="form"  >
            <input type="text" name="titre" placeholder="titre de l'actualité" required>
            <textarea name="text" id="text" cols="30" rows="5" maxlength="500" required></textarea>
          
            <input type="date" name="date"  required>

             <input type="submit" name="submitInsertion" value="ajouter">
            </div>
    </form>
    </main>
    <footer>
        <p>Site réalisé par Justin LELUC Web 2 HETIC</p>
    </footer>
    
</body>
</html>