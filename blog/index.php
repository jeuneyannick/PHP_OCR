<?php 
//Etapes dans la construction de la page Index.php 
//Doit afficher les 5 derniers billets 
//Lien vers commentaires.php

//Connexion à la base de données

try {
    $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8','root','root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); 
} catch (Exception $e){
    die('Erreur : ' . $e->getMessage()); 
}

//Requête de selection pour aller afficher les billets 

$req = $bdd->query('SELECT id, titre , contenu, auteur, DATE_FORMAT(date_creation, "%d/%m/%Y %Hh%imin%ss" ) AS date_creation FROM billets  ORDER BY date_creation DESC LIMIT 0,5'); 
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

foreach($request as $data){
    echo '<div>'; 
    echo '<h1>'. htmlspecialchars($data['titre']) . '</h1>'; 
    echo '<h3>'. htmlspecialchars($data['auteur']). '</h3>'; 
    echo '<span>'. htmlspecialchars($data['date_creation']) . '</span>';
    echo '</div'; 

    echo '<div class="news"> <p>'. htmlspecialchars($data['contenu']) . '</p></div>'; 

    echo  '<a href=commentaires.php?billets='. $data['id'] . '>Voir le commentaire </a>'; 
}

?>


    
</body>
</html>