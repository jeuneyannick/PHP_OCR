<?php 
/*
Il existe des interfaces prédéfinies qui nous permettent de modifier le comportement de nos objets. 
Création d'un iterateur avec l'interface iterator. 
*/

class MaClasse implements SeekableIterator, ArrayAccess
/*L'interface pré-définie iterator rend un objet iteratif en incluant 5 méthodes. 

   current: renvoie l'élément courant ;

   key: retourne la clé de l'élément courant ;

   next: déplace le pointeur sur l'élément suivant ;

   rewind: remet le pointeur sur le premier élément ;

   valid: vérifie si la position courante est valide. 

   L'interface SeekableIterator hérite d'Iterator en rajoutant une méthode pour placer un curseur à l'interieur du tableau.
   Cette méthode prend donc en paramère la position à la paquelle on désire placer le curseur.  
   /** METHODES DE L' INTERFACE SEEKABLEITERATOR */

{
  private $position = 0;
  private $tableau = ['Premier élément', 'Deuxième élément', 'Troisième élément', 'Quatrième élément', 'Cinquième élément'];
  
  /**
   * Retourne l'élément courant du tableau.
   */
  public function current()
  {
    return $this->tableau[$this->position];
  }
  
  /**
   * Retourne la clé actuelle (c'est la même que la position dans notre cas).
   */
  public function key()
  {
    return $this->position;
  }
  
  /**
   * Déplace le curseur vers l'élément suivant.
   */
  public function next()
  {
    $this->position++;
  }
  
  /**
   * Remet la position du curseur à 0.
   */
  public function rewind()
  {
    $this->position = 0;
  }
  
  /**
   * Permet de tester si la position actuelle est valide.
   */
  public function valid()
  {
    return isset($this->tableau[$this->position]);
  }
  public function seek($position){
      // La fonction rajoutée par l'interface seekableIterator pour placer le curseur et vérifier 
      // qu'il est bien valide. 
      $anciennePosition = $this->position; 
      $this->position = $position; 
      if(!$this->valid()){
        trigger_error('La position spécifiée n\'est pas valide', E_USER_WARNING);
        $this->position = $anciennePosition;
      }
  }
  /** METHODES DE L'INTERFACE ArrayAccess */

  // Vérifie si la clé existe bien 
  public function offsetExists($key){
      return isset($this->tableau[$key]); 
  }
  //Retourne la clé demandée 
  public function offsetGet($key){
      return $this->tableau[$key]; 
  }
  //Assigne une valeur à une entrée
  public function offsetSet($key, $value){
      $this->tableau[$key] = $value; 
  }
  public function offsetUnset($key){
      unset($this->tableau[$key]); 
  }

}

// Instanciation de ma classeÒ
$objet = new MaClasse;

//Parcours de l'objet 

echo "Parcours de l'objet ...</br>"; 
foreach( $objet as $key => $value){
    echo $key. ' => ' . $value . '<br />'; 
}

echo '<br /> Remise du curseur en quatrieme position... <br/ >'; 
// méthode de l'interface seekableInterator
$objet->seek(3); 
echo 'Element courant : '. $objet->current() .'<br />'; 

echo '<br />Affichage du troisième élément : '. $objet[2] . '<br />'; 
echo 'Modification du troisième élément...<br />';
$objet[2] = 'Konichiwa Mundo';
echo " Nouvelle valeur : " . $objet[2] . "<br /><br />"; 

echo " Destruction du cinquième élément...<br />"; 
$objet->offsetUnset(4); 

if (isset($objet[4]))
{
  echo '$objet[3] existe toujours... Bizarre...';
}
else
{
  echo 'Tout se passe bien, $objet[4] n\'existe plus !';
}

