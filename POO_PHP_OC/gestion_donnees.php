<?php 
// On cherche non pas à travailler avec des tableaux mais avec des objets. 
//Il s'agit de savoir comment transformer nos tableaux provenant de la BDD en objet
class Personnage //Création de la classe où nous ferons des objets représentant nos personnages
//Cette classe a pour rôle de représenter une ligne dans la BDD. Donc un personnage c'est tout.
{
    //Les atttibuts de notre classe pour nos objets 

    private $_id; 
    private $_nom; 
    private $_niveau; 
    private $_experience;
    private $_forcePerso;
    private $_degats; 
    
    public function __construct(array $data){
        if(!empty($data)){
            $this->hydrate($data); 
        }

    }
    //Hydratation = assigner des valeurs valides avec les données qu'on recoit de la BDD à l'objet

    public function hydate(array $data){
        // Pour hydrater l'objet, on va faire une boucle sur l'array reçu contenant les données dont chaque clé correspond à un attribut de notre objet
     foreach($data as $key => $value){

        //On créer une variable qui contient set + le nom de des clés du tableaux pour vérifier..

        $method = 'set' .ucfirst($key); 
        // Avec la méthode method_exists(), on va vérifier si le contenu de la variable crée correspond bien aux setters de notre classe
        if(method_exists($this,$method)){
            //si la variable correspond aux setters, on assigne les valeurs 
          $this->method($value); 

        }

     }

    }
   
    //Liste des getters chargés de renvoyer les attributs
    public function getId(){
        return $this->_id; 
    }
    public function getNom(){
        return $this->_nom; 
    }
    public function getNiveau(){
        return $this->_niveau; 
    }
    public function getExperience(){
        return $this->_experience; 
    }
    public function getForcePerso(){
        return $this->_forcePerso; 
    }
    public function getDegats(){
        return $this->_degats; 
    }

    //Liste des setteurs qui assignent des valeurs aux attributs en vérifiant leur intégrité

    public function setId($id){
        //On contrôle l'intégrité des valeurs qu'on assigne aux attributs en les forçant à être des nombres
        $id = (int)$id; 
        // On vérifie si le nombre est positif 
        if( $id > 0 ){
            //Si c'est le cas, on assigne alors la valeur à l'attribut 
            $this->_id = $id; 
        }
    }
    public function setNom($nom){
        //On vérifie qu'il s'agit bien d'une chaine de caractères
        if(is_string($nom)){
           $this->_nom = $nom; 
        }
    }
    public function setForcePerso($forcePerso)
  {
    $forcePerso = (int) $forcePerso;
    
    if ($forcePerso >= 1 && $forcePerso <= 100)
    {
      $this->_forcePerso = $forcePerso;
    }
  }
  
  public function setDegats($degats)
  {
    $degats = (int) $degats;
    
    if ($degats >= 0 && $degats <= 100)
    {
      $this->_degats = $degats;
    }
  }
  
  public function setNiveau($niveau)
  {
    $niveau = (int) $niveau;
    
    if ($niveau >= 1 && $niveau <= 100)
    {
      $this->_niveau = $niveau;
    }
  }
  
  public function setExperience($experience)
  {
    $experience = (int) $experience;
    
    if ($experience >= 1 && $experience <= 100)
    {
      $this->_experience = $experience;
    }
}

}