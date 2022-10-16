<?php
    
    session_start();
    $user_type =$_SESSION["user_type"];
    if ($user_type==0) {
        header("Location:index.php");
    }
    $link = mysqli_connect('db', 'root', 'root', 'data');
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des utilisateurs admin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
        <H1 style="text-align: center;">Gestion des utilisateurs admin</H1>
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
    <section class="mes-articles">
    <?php 
    $queryArticleUser = "SELECT * FROM `user`";
     
    $queryArticleUser =  mysqli_query($link, $queryArticleUser);
    while ($row = mysqli_fetch_assoc($queryArticleUser)) {
        $id = $row["id"];

         echo ("<div class='div-article'><h2 class='titre-article'>" .$row["name"]."</h2>" );
         echo ("<p> ID de l'utilisateur : " .$row["id"]."</p>" );
         if ($row["user_type"]==1) {
            echo ("<p>Type d'utilisateur : Admin </p></div>" );
        }else {
            echo ("<p>Type d'utilisateur : User </p></div>" );
        }
         echo ("<div class='div-boutton'><form method='post'action='administration/supprimer-user.php'> <button class='transparent '  name='id' value='$id'><i class='suppr bi bi-x-square'></i></button> </form>" );
         echo ("<form method='post' action='administration/modifier-user.php'> <button type='submit' class='btn btn-secondary btn-sm' name='id' value='$id'><i class='bi bi-pencil'></i></button> </form></div> </div>");
      }
    ?>    
    </section>
    </main>
    <footer>
        <p>Site réalisé par Justin LELUC Web 2 HETIC</p>
    </footer>


    

    
</body>
</html>