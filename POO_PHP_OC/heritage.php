<?php

require 'Personnage.php'; 


class Magicien extends Personnage // Classe qui hérite de Personnage
{
    /*
    On insère de nouveaux attributs et de nouvelles méthodes dans la classe heritée
    */
    private $_magie; // Indique la puissance du magicien sur 100, sa capacité à produire de la magie.
  
  public function lancerUnSort($perso)
  {
    $perso->recevoirDegats($this->_magie); // On va dire que la magie du magicien représente sa force.
  }
  /* 
  Pour modifier une méthode héritée de la classe parente sans l'écraser
  */
  public function gagnerExperience()
  {
    // On appelle la méthode gagnerExperience() de la classe parente
    parent::gagnerExperience();
    
    if ($this->_magie < 100)
    {
      $this->_magie += 10;
    }
  }

}


class MagicienBlanc extends Magicien // Classe qui hérite de Magicien
{


}

class MagicienNoir extends Magicien //Classe qui hérite de Magicien
{

}

 $merlin = new Magicien([
   "id" => 4, 
   "nom" => "Joseph", 
   "forcePerso" => 50, 
   "degats" => 0, 
   "niveau" => 2, 
   "experience" => 0
 ]); 

 $perso = new Personnage([
   "id" => 7,
  'nom' => 'Victor',
  'forcePerso' => 5,
  'degats' => 0,
  'niveau' => 1,
  'experience' => 0
]);

 $merlin->lancerUnSort($perso); 