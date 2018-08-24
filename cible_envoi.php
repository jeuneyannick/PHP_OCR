<?php
// On teste si le fichier a bien été envoye et s'il ne contient pas d'erreur
if(isset($_FILES["monfichier"]) && $_FILES["monfichier"]["error"]== 0){

    //Vérification de la taille du fichier 
    if($_FILES["monfichier"]["size"] <= 2000000){
    // vérification de l'extension du fichier 
   // la fonction pathinfo() renvioie un array contenant entre autres l'extension du fichier contenu dans $infosfichier["extension"] 
    $infosfichier = pathinfo($_FILES["monfichier"]["name"]); 
    // on stocke ça dans extension_upload
    $extension_upload = $infosfichier['extension']; 
    //On fait un tableaux avec les extensions qu'on autorise
    $extensions_autorisees = array('jpg','jpeg','gif', 'png');
    if(in_array($extension_upload,$extensions_autorisees)){
        //On valide le fichier et on le stocke définitvement

        move_uploaded_file($_FILES["monfichier"]["tmp_name"], 'uploads/' . basename($_FILES["monfichier"]["name"])); 
        echo "l'envoi a bien été effectué "; 
    }
    }

}

?>