<?php 


class Personnage 
{
//Attributs pour mes objets 

private $_id;
private $_nom;
private $_forcePerso;
private $_degats;
private $_experience;
private $_niveau;

public function __construct (array $data){

}
// Listes de nos getters 

public function getId(){
    return $this->_id; 
}
public function getNom(){
    return $this->_nom; 
}
public function getForcePerso(){
    return $this->_forcePerso; 
}
public function getExperience(){
    return $this->_experience; 
}
public function getNiveau(){
    return $this->_niveau; 
}

// Listes de nos setters 

public function setId($id){
    //On force la conversion en nombre du paramètre 
    $id = (int) $id; 
    // Si ce qui est envoyé est bien un nombre positif, on assigne sa valeur à l'attribut correspondant 
    if ($id > 0){
        $this->_id = $id; 
    }
}
public function setNom($nom){
    if(is_string($nom) ){
        $this->_nom = $nom; 
    }
}
public function setForcePerso($forcePerso){
    $forcePerso = (int) $forcePerso; 
    if( $forcePerso >= 1 && $forcePerso <= 100){
        $this->_forcePerso = $forcePerso; 
    }
}
public function setDegats($degats){
    $degats = (int) $degats; 
    if( $degats >= 1 && $degats <= 100){
        $this->_degats = $degats; 
    }
}
public function setExperience($experience){
    $experience = (int) $experience; 
    if( $experience >= 1 && $experience <= 100){
        $this->_experience = $experience; 
    }
}
public function setNiveau($niveau){
    $niveau = (int) $niveau; 
    if( $niveau >= 1 && $niveau <= 100){
        $this->_niveau = $niveau; 
    }
}
public function recevoirDegats()
  {
    $this->_degats += 5;
    
    // Si on a 100 de dégâts ou plus, on dit que le personnage a été tué.
    if ($this->_degats >= 100)
    {
      return "Il est mort !!";
    }
    
    // Sinon, on se contente de dire que le personnage a bien été frappé.
    return "Aie j'ai mal ";
  }

}