<?php
session_start(); //On démarre la session avant toute chose

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Titre de ma page</title>
    </head>
    <body>
        <p>Re-bonjour !</p>
        <p>
             Je me souviens de toi ! Tu t'appelles <?php echo $_SESSION["prenom"]; ?> . ' ' . <? $_SESSION["nom"]; ?> !<br />
             Et ton âge huuum ... tu as <?php  echo $_SESSION["age"]; ?> ans, c'est ça ?
        </p>
    </body>
</html>