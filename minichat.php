<?php 
try{
    $bdd = new PDO('mysql:host=localhost;dbname=minichat;charset=utf8','root','root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)); 
} catch (Exception $e){
   die('Erreur : ' . $e->getMessage()); 
}

//Affichage des 10 DERNIERS messages

$req = $bdd->query('SELECT pseudo, message, DATE_FORMAT(date_chat, "[%d/%m%/%Y à %Hh%i:%s]") as date_chat FROM minichat ORDER BY id ASC LIMIT 0,10'); 
$reponse = $req->fetchAll(PDO::FETCH_ASSOC); 



?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>

        
</style>

<body>
<form action="minichat_post.php" method="post">
     <label for="pseudo"><strong>Pseudo</strong></label><br />
     <input type="text" name="pseudo" value= <?php 
        if(isset($_COOKIE['pseudo']))
        {
            echo $_COOKIE['pseudo']; 
        }
        
        
     ?> /></br />

     <label for="message"><strong>Message</strong></label><br />
     <textarea name="message" id="" cols="30" rows="10"></textarea><br />
     <input type="submit" value="Envoyer">
    </form>
    
    <?php 
      foreach( $reponse as $data)
      {
          echo '<div><strong> Pseudo :' . htmlspecialchars($data['pseudo']). ' </strong>'; 
          echo '<br />' . htmlspecialchars($data['date_chat']) . '<br />'; 
          echo 'Message :' . htmlspecialchars($data['message']) . '</div><br />'; 

      }
    ?>
</body>
</html>