<?php
// L'abstraction : Une classe abstraite est une classe qui n'est pas instanciable. 
// Elle sert uniquement de modèle pour ses classes filles puissent hériter de ses méthodes et de ses attributs 

abstract class Personnage // Notre classe Personnage est abstraite.
// Cette classe n'est pas instanciable. 
{
    // On va forcer toute classe fille à écrire cette méthode car chaque personnage frappe différemment.
    // !!! Pour définir une méthode abstracte il faut que la classe dans laquelle elle se trouve soit elle-même abstracte. 
  abstract public function frapper(Personnage $perso);
  
  // Cette méthode n'aura pas besoin d'être réécrite.
  public function recevoirDegats()
  {
    // Instructions.
  }
}

class Magicien extends Personnage // Création d'une classe Magicien héritant de la classe Personnage.
// On récupère les méthodes et attributs de la classe mère. 
{
     public function frapper(Personnage $perso){
       
        // On écrit la méthode abstract herité de la classe Personnage 
        // Instructions
     }
}

$magicien = new Magicien; // Tout va bien, la classe Magicien n'est pas abstraite.
$perso = new Personnage; // Erreur fatale car on instancie une classe abstraite.