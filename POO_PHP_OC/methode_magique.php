<?php

/*
Les METHODES MAGIQUES 
Une METHODE MAGIQUE est une méthode qui s'éxécute lors d'un évenement. 
Il intercepte l'evenement; s'exécute et renvoit une valeur ou pas si besoin. 
*/



/*
La SURCHARGE MAGIQUE D'ATTRIBUTS OU DE METHODES consiste à créer dynamiquement des attributs et méthodes. 
Cela est possible lorsque l'on tente d'accéder à un élément qui n'existe pas ou auquel on n'a pas accès 
(s'il est privé et qu'on tente d'y accéder depuis l'extérieur de la classe par exemple). 

*/
class MaClasse
{
  private $attributs = [];
  private $unAttributPrive;
  
  public function __set($nom, $valeur)
  /* La méthode magique __set() se déclenche quand on essaie d'assigner une valeur à un attribut qui n'existe pas 
  ou qu'on peut pas aller chercher (en private ou en protected par exemple). 
  Il prend deux paramètres : en premier, il prend le nom de l'attribut appelé, en second la valeur qu'on a tenté de lui donner. 
  */
  {
    $this->attributs[$nom] = $valeur;
  }
  
  public function afficherAttributs()
  {
    echo '<pre>', print_r($this->attributs, true), '</pre>';
  }

  /*La méthode magique __get() se déclenche lorsqu'on essaie d'assigner une valeur à un attribut qui n'existe pas 
  ou auquel nous n'avons pas accès. Elle prend en paramètre uniquement le nom de l'attribut pour le retourner.  
  */
  public function __get($nom)
  {
    if (isset($this->attributs[$nom]))
    {
      return $this->attributs[$nom];
    }
  }
  /*La methode magique __isset() s'active lorsque l'on appelle la fonction isset() sur un attribut qui n'existe pas ou auquel on a pas accès. 
  Il doit renvoyer un booléen, isset() renvoie soit true soit false. 
  Il prend en paramètre le nom de l'attribut sur lequel est implementé le isset(). 
  */
  public function __isset($nom){
    return isset($this->attributs[$nom]); 
  }
  /*
  La méthode magique __unset() s'active lorsqu'on tente d'appliquer la fonction unset() sur un attribut qui n'existe pas ou 
  auquel on n'a pas accès. 
  Cette méthode ne retourne rien. 

  */
  public function __unset($nom){
    if(isset($this->attributs[$nom])){
      unset($this->attributs[$nom]);
    }
  }

  /*
  La méthode magique __call() s'active dès lors qu'on essaie d'appeler une méthode qui n'existe pas 
  ou à laquelle nous n'avons pas accès. Elle prend deux paramètres : le nom de la méthode appelée et ses arguments sous forme d'un array.
  */
  public function __call($nom, $arguments)
  {
    echo 'La méthode <strong>', $nom, '</strong> a été appelée alors qu\'elle n\'existe pas ! Ses arguments étaient les suivants : <strong>', implode($arguments, '</strong>, <strong>'), '</strong>';
  }
  /*
  La méthode magique __callStatic() est quasi pareil que la méthode magique __call sauf qu'elle ne se déclence que pour les méthodes statiques auxquelles on ne peut pas accéder 
  ou qui n'existe pas. Elle doit nécessairement être statique. 
  */

  public static function __callStatic($nom, $arguments){
    echo 'La méthode <strong>', $nom, '</strong> a été appelée dans un contexte statique alors qu\'elle n\'existe pas ! Ses arguments étaient les suivants : <strong>', implode ($arguments, '</strong>, <strong>'), '</strong><br />';
  }

}

$obj = new MaClasse;

$obj->attribut = 'Simple test';
echo '</br>'; 
$obj->unAttributPrive = 'Autre simple test';
$obj->newMethode("nouvelle", "methode"); 
echo '<br/>'; 
MaClasse::MethodeStatique("Méthode", "Statique"); 


// if (isset($obj->attribut))
// {
//   echo 'L\'attribut <strong>attribut</strong> existe !<br />';
// }
// else
// {
//   echo 'L\'attribut <strong>attribut</strong> n\'existe pas !<br />';
// }

// if (isset($obj->unAutreAttribut))
// {
//   echo 'L\'attribut <strong>unAutreAttribut</strong> existe !';
// }
// else
// {
//   echo 'L\'attribut <strong>unAutreAttribut</strong> n\'existe pas !';
//}

unset($obj->attribut);

if (isset($obj->attribut))
{
  echo 'L\'attribut <strong>attribut</strong> existe !<br />';
}
else
{
  echo 'L\'attribut <strong>attribut</strong> n\'existe pas !<br />';
}

if (isset($obj->unAutreAttribut))
{
  echo 'L\'attribut <strong>unAutreAttribut</strong> existe !';
}
else
{
  echo 'L\'attribut <strong>unAutreAttribut</strong> n\'existe pas !';
}