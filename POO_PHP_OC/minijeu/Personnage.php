<?php 

class Personnage
{
    //Attributs de nos futurs objets 
    private $_id;
    private $_nom;
    private $_degats; 

    //Notre constructeur 
    public function __construct(array $data){
        $this->hydrate($data); 
    }

    //Les constantes de classe pour indiquer l'état des personnages 
    const PERSONNAGE_TUE = 0; 
    const PERSONNAGE_FRAPPE = 1; 
    const CEST_MOI = 2; 

    //Les getters 
    public function id(){
        return $this->_id; 
    }
    public function nom(){
        return $this->_nom;  
    }
    public function degats(){
        return $this->_degats; 
    }
    //Les setters 

    public function setId($id){
      $id = (int) $id; 
      if ( $id > 0){
          $this->_id = $id; 
      }
    }
    public function setNom($nom){
        if (is_string($nom) && $nom < 30){
            $this->_nom = $nom; 
        }
    }
    public function setDegats($degats){
        $degats = (int) $degats; 
        if($degats >= 0 && $degats < 100){
            $this->_degats = $degats; 
        }
    }

    //Les fonctionnalités du personnages sont : pouvoir frapper un autre personnage et recevoir des dégats. 

    public function frapper(Personnage $perso){
      //Verifie qu'on ne se frappe pas soi même 
      if( $perso->id() == $this->_id){
          return self::CEST_MOI; 
      }
      return $perso->recevoirDegats(); 

      //Ajouter des degats au personnage frapppé
    }
    public function recevoirDegats(){
        //On augmente les degats de 5 
       $this->_degats += 5; 

       if( $this->_degats >= 100){
           return self::PERSONNAGE_TUE; 
       }

     return self::PERSONNAGE_FRAPPE; 
        //Si les degats dépasent ou atteignent 100, indiquer que le personnage est mort
        //Sinon indiquer une valeur qui signifie qu'il a été touché 
    }

    public function hydrate (array $data){
     // On hydrate l'objet, on assigne les valeurs aux attributs 
        foreach( $data as $key => $value){

            $method = 'set'. ucfirst($key); 

            if (method_exists($this, $method)){

                $this->$method($value); 
            }
        }
    }
    public function nomValide()
    {
      return !empty($this->_nom);
    }
    
}