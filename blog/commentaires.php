<?php 
//Etapes dans la construction de la page Index.php 
//Doit afficher le billet et ses commentaires 
//Lien vers commentaires.php

//Connexion à la base de données

try {
    $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8','root','root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); 
} catch (Exception $e){
    die('Erreur : ' . $e->getMessage()); 
}

//Requête le billet

 $req = $bdd->prepare('SELECT id, titre, contenu, auteur, DATE_FORMAT(date_creation, "%d/%m/%Y à %Hh%imin%ss") as date_creation FROM billets WHERE id = ? '); 
 $req->execute(array ($_GET['billets'])); 
 $request = $req->fetchAll(PDO::FETCH_ASSOC); 




?>


<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/styles.css">
    <title>BLOG PHP</title>
</head>
<body>

<?php 

//Affichage du billet 
foreach($request as $data){
    echo '<div>'; 
    echo '<h1>'. htmlspecialchars($data['titre']) . '</h1>'; 
    echo '<h3>'. htmlspecialchars($data['auteur']). '</h3>'; 
    echo '<span>'. htmlspecialchars($data['date_creation']) . '</span>';
    echo '</div'; 

    echo '<div class="news"> <p>'. htmlspecialchars($data['contenu']) . '</p></div>'; 
}

$req->closeCursor(); 


//Récupération du commentaire 


$r =$bdd->prepare('SELECT auteur, commentaire, DATE_FORMAT(date_commentaire, "%d/%m/%Y %Hh%imin%ss") as date_commentaire_fr FROM commentaires WHERE id_billet = ? ');
$r->execute( array($_GET['billets'])); 

$rek = $r->fetchAll(PDO::FETCH_ASSOC); 

foreach ($rek as $donnees){
    echo '<p><strong>' . htmlspecialchars($donnees['auteur']) . '</strong></p>';
    echo '<p><em>' . htmlspecialchars($donnees['date_commentaire_fr']) . '</em></p>';
    echo '<div>' . htmlspecialchars($donnees['commentaire']) . '</div>'; 
}

?>


