<?php 

class Personnage 
{
    //Les attributs toujours en privé 
    private $_force;
    private $_localisation;
    private $_experience;
    private $_degats;

    //Attribut statique 
    private static $_textADire = 'Je serais le meilleur développeur du monde un jour !'; 

    //Déclarations des constantes en rapport avec la force 

    const FORCE_PETITE = 20; 
    const FORCE_MOYENNE = 50; 
    const FORCE_GRANDE = 80; 

    public function __construct($forceInitiale){

        $this->setforce($forceInitiale);

    }
    public function deplacer(){

    }
    public function frapper(){

    }
    public function gagnerExperience(){

    }

    public function setForce($force){
        if(in_array($force,[self::FORCE_GRANDE,self::FORCE_MOYENNE,self::FORCE_PETITE])){
            $this->_force = $force; 
        }
        
    }
    public static function parler(){
        //Pour appeler un attribut ou une fonction en statique, ne pas utiliser le mot clé this mais self 
    
        echo self::$_textADire;  
    }
  
}


//En instanciant la classe, on envoie au constructeur une des forces identifiées 



$newPerso = new Personnage(Personnage::FORCE_MOYENNE); 
//appel préférentiel d'une méthode statique 
$newPerso::parler(); 
echo'<br />';
$newPerso->parler(); 