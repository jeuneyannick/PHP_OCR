<?php
//Connexion à la base de données 
try {
    $bdd = new PDO('mysql:hist=localhost;dbname=test;charset=utf8','root','root'); 
} catch (Exception $e){
    die('Erreur : ' . $e->getMessage()); 
}



//Requête pour voir la table Jeux_videos entière

$reponse = $bdd->query('SELECT * FROM jeux_video'); 

//Pour afficher le résultat d'une requete on fait fetch()

$donnees = $reponse->fetchAll(PDO::FETCH_ASSOC); 

foreach($donnees as $data){
?>
 <p>
     <strong>Jeu</strong> : <?php echo $data['nom'];  ?><br/>
     le possesseur de ce jeu est : <?php echo $data['possesseur']; ?>, et il le vend à 
     <?php $data['prix']?> euros !<br />
     Ce jeu fonctionne sur <?php echo $data['console']; ?> et on peut y jouer à <?php echo $data['nbre_joueurs_max']; ?> au maximum <br />
     <?php echo $data['possesseur']; ?> a laissé ses commentaire sur <?php $data['nom']; ?> : <em> <?php $data['commentaires']; ?> </em>
</p>
<?php 
}

$reponse->closeCursor(); 

// Selection 

$name = $bdd->query('SELECT nom FROM jeux_video'); 
$query_name = $name->fetchAll(PDO::FETCH_ASSOC); 
foreach($query_name as $data_name){

    echo $data_name['nom'] . '<br/>'; 
}

$name->closeCursor(); 


//les critères de sélection

//WHERE permet de trier les données que l'on veut récupérer

$game = $bdd->query('SELECT* FROM jeux_video WHERE possesseur= "Patrick"');
//Slectionne tous les champs de la table jeux_video quand le champ possesseur est égal à Patrick
$game2 = $bdd->query('SELECT nom, possesseur FROM jeux_video WHERE possesseur = "Patrick"'); 
$fetch_game2 = $game2->fetchAll(PDO::FETCH_ASSOC); 
foreach($fetch_game2 as $data_game){
    echo  $data_game['nom'] . ' appartient à ' . $data_game['possesseur'] . '<br />'; 
}
$game2->closeCursor(); 

//ADDITIONER LES CONDITIONS
 
$game3 = $bdd->query('SELECT * FROM jeux_video WHERE possesseur = "Patrick" AND prix < 30 '); 
//Slectionnne tous les champs de jeux_video lorsque le possesseur est Patrick et lorsque le prix est inféireur à 30


//ORDER BY permet d'ordonner les resultats des requêtes
$game4 = $bdd->query('SELECT nom, prix FROM jeux_video ORDER BY prix DESC '); 
$fetch_game4 = $game4->fetchAll(PDO::FETCH_ASSOC); 
foreach($fetch_game4 as $data4){
    echo $data4['nom'] . ' coûte ' . $data4['prix'] . '<br />'; 
}

//LIMIT permet de selectionner une partie des résulatats et de pouvoir paginer les résultats
 $game5 = $bdd->query('SELECT nom FROM jeux_video LIMIT 0,10'); 
 //Affiche tous les champs des vingt premières entrées de la table jeux_video
echo '<p> Voici les 10 premières entrées de la table jeux_video : </p> '; 
while($donnes_game = $game5->fetch()){
    echo $donnes_game['nom'] . '<br />'; 
}
$game5->closeCursor(); 

?>
