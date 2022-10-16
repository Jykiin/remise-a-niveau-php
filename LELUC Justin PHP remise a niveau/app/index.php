<?php
session_start();
// if ($_SESSION["id_user"]==null) {
//     header("Location:connexion.php");
// }
$link = mysqli_connect('db', 'root', 'root', 'data');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <title>Accueil</title>
</head>
<body>
<header>
        <H1 style="text-align: center;">Accueil Blog</H1>
    <nav>
        <ul>
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
    <?php 
    $queryArticle = "SELECT * FROM user INNER JOIN message ON user.id = message.user_id ORDER BY message.date DESC" ; //Récupération des infos message et user + tri sur date décroissant pour affichage
    
    // "SELECT * FROM `message` "
    $queryArticle =  mysqli_query($link, $queryArticle);
    while ($row = mysqli_fetch_assoc($queryArticle)) {
        $id = $row["id"];
        
        if ($_SESSION["user_type"]==0) { //affichage pour les utilisateurs classqiques
            echo ("<div class='div-article'><h2 class='titre-article'>" .$row["titre"]."</h2>" );
         echo ("<p>" .$row["date"]."</p>" );
         echo ("<p>" .$row["text"]."</p>" );
         echo ("<p> Ecrit par : " .$row["name"]."</p></div>" );
        }else {// affichage pour les admins avec modification et supressions possible
            echo ("<div class='div-article'><h2 class='titre-article'>" .$row["titre"]."</h2>" );
            echo ("<p>" .$row["date"]."</p>" );
            echo ("<p>" .$row["text"]."</p>" );
            echo ("<p> Ecrit par : " .$row["name"]."</p></div>" );
            echo ("<div class='div-boutton'><form method='post'action='administration/supprimer-article.php'> <button class='transparent 'name='id' value='$id'><i class='suppr bi bi-x-square'></i></button> </form>" );
            echo ("<form method='post' action='administration/modifier-article.php'> <button type='submit' class='btn btn-secondary btn-sm' name='id' value='$id'><i class='bi bi-pencil'></i></button> </form></div> </div>");
   
        }

       
       
       

      }
    
    
    ?>    
    </main>
    <footer>
        <p>Site réalisé par Justin LELUC Web 2 HETIC</p>
    </footer> 

</body>
</html>