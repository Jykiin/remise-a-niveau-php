<?php


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
    <title>Inscription</title>
</head>
<body>
    <header>
        <h1>Inscription</h1>
    </header>
    <main>
<form  action="administration/inserer-user.php" method="POST" enctype="multipart/form-data" id="form" >
            <input type="text" name="name" placeholder="Votre pseudo" autocomplete="off" required>
            <input type="password" name="password" placeholder="Votre mot de passe" autocomplete="off" required>
            <select name="user_type" id="">
                <option value="0">Utilisateur</option>
                <option value="1">Admin</option>
            </select>
             <input type="submit" name="submitInsertion" value="ajouter">
            </div>
    </form>
    <div class="div-bouton-nouv-compte" > <p><a class="bouton-nouv-compte" href="connexion.php">Ou se connecter</a> </p>  </div>
    </main>
    <footer>
        <p>Site réalisé par Justin LELUC Web 2 HETIC</p>
    </footer>
</body>
</html>