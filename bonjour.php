<!-- Pour récupérer les paramètres envoyés par le ficher index.php, il faut utiliser la superglobale $_GET[] !-->
<!--
<p>Bonjour <?php echo $_GET["prenom"];?>!</p>
<p> Bonjour <?php echo $_GET["prenom"] . ' ' . $_GET["nom"]; ?></p>

!-->

<!-- Pour controler les valeurs des paramètres envoyés  utiliser la fonction isset()!-->

<?php
//On teste l'existence du tableau GET[]
if(isset($_GET["prenom"]) AND isset($_GET["nom"]) AND isset($_GET["repeter"])){

    //On force la conversion en int du GET
    $_GET["repeter"] = (int) $_GET["repeter"]; 

    //le nombre doit être compris entre 1 et 100

   if($_GET["repeter"] >= 1 && $_GET["repeter"] <= 100){

    for( $i = 0; $i < $_GET["repeter"]; $i++){
        echo 'Bonjour ' . $_GET["prenom"] . ' ' . $_GET["nom"] . '!</br>'; 
    }
  
    } else {
        echo ' Il faut renseigner un nom, un prénom et un nombre de répétitions !'; 
    }
}




?>