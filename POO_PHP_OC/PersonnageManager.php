<?php 

function loadClass($class){
    require $class . '.php' ; 
}

spl_autoload_register('loadClass'); 

class PersonnageManager
// Cette classe a pour but de gerer les entités de la BDD représenté par la classe Personnage
{
    //Notre class PersonnageManager aura besoin d'une connexion à la base de données pour gérer les personnages

    private $_db; // Instance de PDO 

    public function __construct($db){
        $this->setDb($db); 
    }
    
    public function add(Personnage $perso){
        // Requête d'insertion 
        //Assignation des valeurs pour les attributs correspondants
        // Exécution de la requête
        $q = $this->_db->prepare('INSERT INTO personnages(nom, forcePerso, degats, niveau, experience) VALUES(:nom, :forcePerso, :degats, :niveau, :experience)');

        $q->bindParam(':nom', $perso->nom());
        $q->bindParam(':forcePerso', $perso->forcePerso(), PDO::PARAM_INT);
        $q->bindParam(':degats', $perso->degats(), PDO::PARAM_INT);
        $q->bindParam(':niveau', $perso->niveau(), PDO::PARAM_INT);
        $q->bindParam(':experience', $perso->experience(), PDO::PARAM_INT);

    $q->execute(); 
    }
    public function delete(Personnage $perso){
        //Execute une requête DELETE
        $this->_db->exec('DELETE FROM personnages WHERE id = '.$perso->id());
    }
    public function get($id){
        //Execute une requête de type SELECT avec une clause WHERE et retourne un objet Personnage
        $id = (int) $id;

        $q = $this->_db->query('SELECT id, nom, forcePerso, degats, niveau, experience FROM personnages WHERE id = '.$id);
        $donnees = $q->fetch(PDO::FETCH_ASSOC);
    
        return new Personnage($donnees);
    }
    public function getList(){
        //Retourne la liste de tous les personnages
        $persos = [];

        $q = $this->_db->query('SELECT id, nom, forcePerso, degats, niveau, experience FROM personnages ORDER BY nom');

        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
         $persos[] = new Personnage($donnees);
        }

        return $persos;

    }
    public function update(Personnage $perso){
        //Requête de type UPDATE
        //Assignation des valeurs à la requête 
        //Execute la requête
        $q = $this->_db->prepare('UPDATE personnages SET forcePerso = :forcePerso, degats = :degats, niveau = :niveau, experience = :experience WHERE id = :id');

        $q->bindParam(':forcePerso', $perso->forcePerso(), PDO::PARAM_INT);
        $q->bindParam(':degats', $perso->degats(), PDO::PARAM_INT);
        $q->bindParam(':niveau', $perso->niveau(), PDO::PARAM_INT);
        $q->bindParam(':experience', $perso->experience(), PDO::PARAM_INT);
        $q->bindParam(':id', $perso->id(), PDO::PARAM_INT);

        $q->execute();
    }
    public function setDb(PDO $db){
        $this->_db = $db; 
    }

}
 


$perso = new Personnage([
    'nom' => 'Victor',
    'forcePerso' => 5,
    'degats' => 0,
    'niveau' => 1,
    'experience' => 0
  ]);
  
  $db = new PDO('mysql:host=localhost;dbname=tests', 'root', 'root');
  $manager = new PersonnageManager($db);
      
  $manager->add($perso);