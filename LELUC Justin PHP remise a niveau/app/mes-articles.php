<?php
    
    session_start();
    $user_id =$_SESSION["id_user"];
    $link = mysqli_connect('db', 'root', 'root', 'data');

    // if (mysqli_connect_errno()) {
    // echo 'erreur de connexion : ' . mysqli_connect_error();
    //      exit;
    //  }
    //  else {
    //      echo "connexion réussie";
    //  }
   
    
    //   $queryArticleUser = "SELECT * FROM `message` WHERE `user_id`='$user_id' ";
     
    //   $queryArticleUser =  mysqli_query($link, $queryArticleUser);
        
    //   while ($row = mysqli_fetch_assoc($queryArticleUser)) {
    //     $id = $row["id"];

    //      echo ("<p>" .$row["id"].$row["text"].   "</p>" );
       

    //   }
  

    
     
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mes articles</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
        <H1 style="text-align: center;">Mes articles</H1>
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
    $queryArticleUser = "SELECT * FROM `message` WHERE `user_id`='$user_id' ";
     
    $queryArticleUser =  mysqli_query($link, $queryArticleUser);
    while ($row = mysqli_fetch_assoc($queryArticleUser)) {
        $id = $row["id"];

         echo ("<div class='div-article'><h2 class='titre-article'>" .$row["titre"]."</h2>" );
         echo ("<p>" .$row["date"]."</p>" );
         echo ("<p>" .$row["text"]."</p></div>" );
         echo ("<div class='div-boutton'><form method='post'action='administration/supprimer-article.php'> <button class='transparent '  name='id' value='$id'><i class='suppr bi bi-x-square'></i></button> </form>" );
         echo ("<form method='post' action='administration/modifier-article.php'> <button type='submit' class='btn btn-secondary btn-sm' name='id' value='$id'><i class='bi bi-pencil'></i></button> </form></div> </div>");

       

      }
    
    
    ?>   
    </section>
    </main>
    <footer>
        <p>Site réalisé par Justin LELUC Web 2 HETIC</p>
    </footer>

    

    
</body>
</html>