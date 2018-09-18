<?php 
/**
 * PDO a sa propre classe d'héritage : PDOException
 * Elle n'hérite pas d'Exception mais de RuntimeException
 * IL existe des classes pour chaque circonstance dans laquelle l'exception est lancée 
 */



 /**
  * Pour éxécuter du code même si une exception n'a pas été attrapée, on utilise le bloc Finally. 
  * Il s'exécutera avant qu'une erreur fatale soit levée. Il contient généralement des opérations de nettoyage ou la fermeture de fichiers.
  */


try
{
  $db = new PDO('mysql:host=localhost;dbname=test', 'root', 'root'); // Tentative de connexion.
  echo 'Connexion réussie !'; // Si la connexion a réussi, alors cette instruction sera exécutée.

  
}

catch (PDOException $e) // On attrape les exceptions PDOException.
{
  echo 'La connexion a échoué.<br />';
  echo 'Informations sur l\'erreur : [', $e->getCode(), '] '. "<br />Numéro de l'erreur " . $e->getMessage(); // On affiche le n° de l'erreur ainsi que le message.
}