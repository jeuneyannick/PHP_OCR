<?php 

class Personnage 
{
   //Création d'attributs 

   private $_force = 20; 
   private $_localisation = 'France';
   private $_experience = 0;
   private $_degats = 0;

   public function __construct($force, $degats){
       echo 'Voici le constructeur <br/>'; 
       $this->setForce($force); 
       $this->setDegats($degats); 
       $this->_experience = 1; 
   }

   //Les getters : pour récuperer les attributs en dehors de la classe 
   public function getDegats(){
       return $this->_degats; 
   }
   public function getExperience(){
       return $this->_experience; 
   }
   public function getForce(){
       return $this->_force; 
   }
   //Les setters: chargés de modifier les attributs à l'extérieur de la classe 
   public function setForce($force){
       if(!is_int($force)){
           trigger_error("La force du personnage doit être un nombre entier ! ", E_USER_WARNING); 
           return; 

       }elseif($force > 100){
        trigger_error('La force d\'un personnage ne peut dépasser 100', E_USER_WARNING);
      return;
       }
       $this->_force = $force;
   }
   public function setExperience($experience){
       if(!is_int($experience)){
           trigger_error("L'experience du personnage doit être un nombre entier ! ", E_USER_WARNING); 
           return; 

       }elseif($experience > 100){
        trigger_error("L'experience du personnage doit être un nombre entier !" , E_USER_WARNING);
      return;
       }
       $this->_experience = $experience;
   }
   public function setDegats($degats){
       if(!is_int($degats)){
           trigger_error("Les dégâts du personnage doivent être un nombre entier ! ", E_USER_WARNING); 
           return; 

       }elseif($degats> 100){
        trigger_error("Les dégâts du personnage doivent être un nombre entier !" , E_USER_WARNING);
      return;
       }
       $this->_degats = $degats;
   }

   
   //Création d'un méthode (comportement de l'objet à instancier)

   public function frapper(Personnage $cible){
       $cible->_degats += $this->_force; 
   }
   public function afficherExperience(){
       echo $this->_experience; 
   }
   public function gagnerExperience(){
       //On ajoute 1 à notre attribut _experience
      $this->_experience += 1;
   }
}

$perso1 = new Personnage(50,30); 
$perso2 = new Personnage(60,20); 



$perso1->frapper($perso2);
$perso1->gagnerExperience(); 

$perso2->frapper($perso1);
$perso2->gagnerExperience(); 

echo " Le personnage 1 a " . $perso1->getForce() . " de force, contrairement au personnage 2 qui a " . 
$perso2->getForce() . " de force <br />"; 
echo " Le personnage 1 a " . $perso1->getExperience() . " d'experience, contrairement au personnage 2 qui a " . 
$perso2->getExperience() . " d'exeprience <br />"; 
echo " Le personnage 1 a " . $perso1->getDegats() . " de dégâts, contrairement au personnage 2 qui a " . 
$perso2->getDegats() . " de dégâts <br />"; 
