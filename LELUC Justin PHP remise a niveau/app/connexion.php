<?php
    session_start();
    $link = mysqli_connect('db', 'root', 'root', 'data');
    // if (mysqli_connect_errno()) {
    // echo 'erreur de connexion : ' . mysqli_connect_error();
    //      exit;
    //  }
    //  else {
    //      echo "connexion réussie";
    //  }
    if (isset($_POST['submit'])) {
      $name = $_POST['name'];
      $mdp = $_POST['password'];
      $queryUser = "SELECT * FROM user ";
      $queryUser =  mysqli_query($link, $queryUser);
      while ($row = mysqli_fetch_assoc($queryUser)) {
        $id = $row["id"];
        $isMdpOk=password_verify($mdp,$row["password"]);
        if ($row["name"]==$name && $isMdpOk==true) {
          
            $_SESSION["id_user"]=$row["id"];
            $_SESSION["user_type"]=$row["user_type"];
            header("Location:index.php") ;
        }
      }
    }
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Connexion</title>
</head>
<body>
    <header>
        <h1>Connexion</h1>
    </header>
    <main>

    
    <form class="form-connexion"  action="" method="POST" enctype="multipart/form-data" id="form" >
            <input type="text" name="name" placeholder="Votre pseudo" required>
            <input type="password" name="password" placeholder="Votre mot de passe"  required>
            
             <input type="submit" name="submit" class="b-connexion" value="Connexion">
            </div>
    </form>
    <div class="div-bouton-nouv-compte" > <p><a class="bouton-nouv-compte" href="inscription.php">Ou créer un compte</a> </p>  </div>
    
    </main>
    <footer>
        <p>Site réalisé par Justin LELUC Web 2 HETIC</p>
    </footer>
</body>
</html>