<?php 
//Comme les variables de sessions, il fautr définir avant tout code html les cookies
setcookie('pseudo', 'Yuss92', time() + 365*24*3600, null,null, false, true); //On écrit un cookie en mode httpOnly
setcookie('pays', 'France', time() + 365*24*3600, null,null, false, true); //On écrit un cookie en mode httpOnly

// Et là on écrit le code html

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Ma super page</title>
    </head>
    <body>
        <p>
            Hé ! Je me souviens de toi <br />
            Tu t'appelles <?php echo  $_COOKIE["pseudo"];?> et tu viens de <?php echo $_COOKIE["pays"];?> c'est bien ça ? 
       </p>
    </body>
</html>
