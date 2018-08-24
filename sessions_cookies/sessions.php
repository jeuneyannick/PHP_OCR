<?php
//On démarre la session avant d'écrire du code Html
session_start(); 

//Dès lors on peut créer autant de variables de session qu'on veut avec $_SESSION

$_SESSION["prenom"] = "Yannick"; 
$_SESSION["nom"] = "Bley"; 
$_SESSION["age"] = 27; 

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title> Titre de ma page </title>
    </head>
    <body>
        <p> Salut <?php echo $_SESSION["prenom"]; ?><br />
        Tu es à l'accueil de mon site. Tu veux aller sur une autre page ? 
    </p>
    <p>
        <a href="mange.php">Lien vers mange.php</a><br />
        <a href="monscript.php">Lien vers monscript.php</a><br />
        <a href="informations.php">Lien vers informations.php</a><br />
    </p>
    </body>
</html>