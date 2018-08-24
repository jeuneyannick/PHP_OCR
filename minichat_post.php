<?php 
setCookie('pseudo', $_POST['pseudo'], time() + 365*24*3600, null,null, false, true); 
//Connexion à la base de données 

try{
    $bdd = new PDO('mysql:host=localhost;dbname=minichat;charset=utf8','root','root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); 
} catch (Exception $e){
   die('Erreur : ' . $e->getMessage()); 
}

//Vérification des données reçues en formulaire
if( !empty($_POST['pseudo']) AND !empty($_POST['message']))
{
      $pseudo = $_POST['pseudo']; 
      $message = $_POST['message'];

   // Vérification du nombre de caractères 
   if(strlen($pseudo) >1 && strlen($pseudo) <= 255)
   {
    $insert = $bdd->prepare('INSERT INTO minichat (pseudo , message, date_chat ) VALUES(:pseudo, :message , NOW() )');
    $insert->execute(array(
      'pseudo' => $pseudo, 
      'message' => $message, 
        
    ));
    header('Location: minichat.php'); 

   }
} else {
   header('Location: minichat.php'); 
} ;

?>