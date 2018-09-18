<?php
abstract class Personnage
{
  // Méthode normale.
  
  public function frapper(Personnage $perso)
  {
    // Instructions.
  }
  
  // Méthode finale.
  
  final public function recevoirDegats()
  // Les méthodes finales sont héritables mais les classes herités ne peuvent pas les redéfinir
  {
    // Instructions.
  }
}

class Guerrier extends Personnage
{
  // Aucun problème.
  
  public function frapper(Personnage $perso)
  {
    // Instructions.
  }
  
  // Erreur fatale car cette méthode est finale dans la classe parente.
  
  //public function recevoirDegats()
  //{
    // Instructions.
  //}
}