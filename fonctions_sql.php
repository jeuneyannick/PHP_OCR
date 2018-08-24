<?php 
require 'crud.php';
//Fonctions scalaires SQL : des fonctions qui agissent sur chaque entrée pour parfois transformer la valeur de chacune d'elles dans un champ
//Exemple : UPPER() pour mettre en majuscules. 

// $rep = $bdd->query('SELECT UPPER(nom) as nom_maj FROM jeux_video'); 

// while($data = $rep->fetch()){
//     echo $data['nom_maj'] . '<br />'; 
// }

//LOWER() pour mettre en minuscules 

$rep2 = $bdd->query('SELECT LOWER(nom) as nom_min FROM jeux_video'); 
while($dataz = $rep2->fetch()){
    echo $dataz['nom_min'] . '<br />'; 
}

//LENGTH : compter le nombre de caractères
//Cela renvoie le nombre de caractères des entrées pour le champs selectionné

$rep3 = $bdd->query('SELECT LENGTH(nom) as long_nom FROM jeux_video'); 

while( $data3 = $rep3->fetch()){
    echo $data3['long_nom'];
}

//Round : arrondir un nombre décimal
// prend en paramètre le nom du champ à arrondir, et le nombre de chiffre après la virgule qu'on veut

$rep4 = $bdd->query('SELECT ROUND(prix, 2) as new_prix FROM jeux_video'); 
while($data4 = $rep4->fetch()){
    echo $data4['new_prix'] . '<br />'; 
}


//Les fonctions d'agrégat 
//Font des opérations sur plusieurs entrées pour au final retourner une seule valeur

//La fonction AVG qui calcule la moyenne d'un champ contenant des nombres

$rep5 = $bdd->query('SELECT AVG(prix) as prix_moyen FROM jeux_video'); 
while($data5 = $rep5->fetch()){
    echo $data5['prix_moyen']; 
}

//On ne doit pas ajouter d'autres champs de la table quand on utilise une fonction d'agrégat <!DOCTYPE html>

//SUM : additionne les valeurs 
//Additionne les valeurs d'un champ
// SELECT SUM(prix) AS prix_total FROM jeux_video WHERE possesseur='Patrick'
/*MAX: Retourne la valeur maximale

Analyse un champ et retourne la valeur maximale trouvée 
SELECT MAX(prix) AS prix_max FROM jeux_video

MIN: retoune la valeur minimale trouvée 
fait la même chose que MAX mais en retournant la valeur la plus petite du champ


COUNT: compte le nombre d'entrées dans une table en fonction des paramètres qu'on lui passe
SELECT COUNT(*) AS nbjeux FROM jeux_video
On selectionne le nombre total de jeux dans la table 

On peut aussi filtrer avec un WHERE 
SELECT COUNT(*) AS nbjeux FROM jeux_video WHERE possesseur='Florent'

Pour éviter les doublons on utilise en paramètres DISTINCT
SELECT COUNT(DISTINCT possesseur) AS nbpossesseurs FROM jeux_video
*/

//Le groupement de données avec Group By ET Having

/*
Il faut utiliser GROUP BY en même temps qu'une fonction d'agrégat 
Elle sert a obtenir des informations sur des groupes de données précis

SELECT AVG(prix) AS prix_moyen, console FROM jeux_video GROUP BY console
Sélectionne le prix moyen de chaque console de la table jeux_video
SELECT SUM(prix) AS total_price, possesseur FROM jeux_video GROUP BY possesseur


Having : Filtrer les données groupées 
Having est l'équivalent de WHERE sur des données groupées 
SELECT AVG(prix) AS prix_moyen, console FROM jeux_video GROUP BY console HAVING prix_moyen <= 10
selectionne le prix moyen par console de moins ou égal à 10 dans la table jeux vidéo
Having ne s'utilise que sur le résultat d'une fonction d'agrégat

La différence avec le WHERE et HAVING 
WHERE s'utilise avant le groupement de données 

*/




