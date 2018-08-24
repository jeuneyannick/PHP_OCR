<?php
//Connexion à la base de données 
try {
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); 
} catch (Exception $e){
    die('Erreur : ' . $e->getMessage()); 
}
//INSERT: pour ajouter des données dans la base. 

//On utilise INSERT INTO + le nom de la table (le nom des champs ) VALUES (valeurs à insérer dans le même ordre que les champs qu'on a indiqués )
$bdd->exec('INSERT INTO jeux_video(nom,possesseur,console, prix, nbre_joueurs_max, commentaires) VALUES ("Battlefield 1942", "Yannick", "PS2",45,50, "2ème Guerre Mondiale")');
echo 'Le jeu a bien été ajouté <br />'; 

// INSERTION DYNAMIQUES AVEC LES MARQUEURS 

//  $req = $bdd->prepare('INSERT INTO jeux_video(nom,possesseur,console,prix, nbre_joueurs_max,commentaires)VALUES(:nom, :possesseur, :console,:prix, :nbre_joueurs_max, :commentaires )');
//  $req->execute(array(
//      'nom' => $nom,
//      'possesseur' => $possesseur, 
//      'console'=> $console, 
//      'prix'=> $prix, 
//      'nbre_joueurs_max' => $nbre_joueurs_max, 
//      'commentaires'=> $commentaires
//  )); 

//  echo ' le jeu a bien été ajouté aussi'; 

//UPDATE : requête de modification de valeurs d'une table dans la base de données

$update = $bdd->exec('UPDATE jeux_video SET prix = 15, nbre_joueurs_max = 40 WHERE nom = "Battlefield 1942"'); 
//Cet appel renvoi le nombre de ligne modifiées 

echo $update . ' entrées ont été modifiés ! '; 

//REQUETE PREPAREE AVEC DES VARIABLES
// $req = $bdd->prepare('UPDATE jeux_video SET prix = :nvprix, nbre_joueurs_max = :nv_nb_joueurs WHERE nom = :nom_jeu');
// $req->execute(array(
// 	'nvprix' => $nvprix,
// 	'nv_nb_joueurs' => $nv_nb_joueurs,
// 	'nom_jeu' => $nom_jeu
// 	));


//DELETE POUR EFFACER

$delete = $bdd->exec('DELETE FROM jeux_video WHERE nom = "Battlefield 1942" ');

$reponse = $bdd->query('SELECT nom FROM jeux_video') or die(print_r($bdd->errorInfo()));
?>

