<?php
//Connexion à la base de données 
try {
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8','root','root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); 
} catch (Exception $e){
    die('Erreur : ' . $e->getMessage()); 
}
//Requete preparée avec des points d'interrigation 

$req = $bdd->prepare('SELECT nom FROM jeux_video WHERE possesseur = ? '); 
$req->execute(array($_GET['possesseur'])); 

$query = $req->fetchAll(PDO::FETCH_ASSOC); 

//S'il y a plusieurs marqueurs, il faut bien les mettre dans le même ordre 
$req2 = $bdd->prepare('SELECT nom FROM jeux_video WHERE possesseur = ? AND prix <= ?');
$req2->execute(array($_GET['possesseur'], $_GET['prix_max'])); 
$req3 = $req2->fetchAll(PDO::FETCH_ASSOC); 


