<?php 

if(isset($_POST["mdp"]) ){
    if($_POST["mdp"] === "kangourou"){
        echo "<p> Bravo tu as trouvé que le mot de passe était " . htmlspecialchars($_POST["mdp"]) . " : Voici maintenant les codes de la nasa ! </p>"; 

    } else {
        echo " Ce n'est pas le bon mot de passe"; 
    }
}





?>