<?php 
/**
 * Les exceptions sont des erreurs lancées par PHP quand quelque chose ne va pas. 
 * Quand on lance une exception, on instancie en fait la classe Exception qui peut prendre 3 paramètres facultatifs.
 * Le message d'erreur, son code et/Ou l'exception précédente. 
 * 
 */

 //Une fonction pour additionner deux nombres 
 class MonException extends Exception
{
  public function __construct($message, $code = 0)
  {
    parent::__construct($message, $code);
  }
  
  public function __toString()
  {
    return $this->message;
  }
}

 function additionner($a, $b){

    if (!is_numeric($a) || !is_numeric($b)){
        // On lance une nouvelle exception grâce à throw et on instancie directement un objet de la classe MonException.
        // throw new MonException('Les deux paramètres doivent être des nombres'); 

        /**
         * Il existe des exceptions pré-définies qui nous évitent d'instancier toit le temps la classe Exception
         * Comme InvalidArgumentException qui est une classe à instancier quand un paramètre est invalide.
         */
    }
    if( func_num_args() > 2){
        throw new InvalidArgumentException('Pas plus de deux arguments dans cette fonction');// Ici on lance une exception de type Exception, on va emboiter un deuxième catch derrière
    }
    return $a + $b;

 }
 // Le try nous permet d'effectuer nos instructions jusqu'à ce qu'une erreur survienne et c'est là qu'on lance l'excecption attrapée dans le catch
 try 
 {
    echo additionner(12, 3). "<br />";
    echo additionner(78, 3, 6). "<br />";

 } catch(MonException $e)// On attrape ici les exceptions de type Exception ici s'il y en a une 
 {
    echo "[MonException] ". $e; 
 }

 // Deuxième exception à attraper 
 catch(InvalidArgumentException $e)
 {
     echo "[Exception] :". $e->getMessage() . "<br />"; // On veut juste le message d'erreur
 }


 echo "Fin du script"; 