<?php 


class PersonnageManager 
{ 
    //Cette classe a pour fonction de gérer les objets de la class Personnage avec la base de données 
    //Le manager a besoin de se connecter à la base de données d'effectuer le CRUD 
    private $_id;

    public function __construct($db){
        $this->setDb($db); 
    }
    
    //Les opérations de CRUD

    public function add(Personnage $perso){
        //Pour ajouter un personnage 
        //Requête préparée pour ajouter un personnage 
        $q = $this->_db->prepare('INSERT INTO personnages(nom,degats,experience)VALUES (:nom,:degats,:experience)'); 
        $q->bindValue(':nom', $perso->nom()); 
        $q->bindValue(':degats', $perso->degats()); 
        $q->bindValue(':experience', $perso->experience()); 
        $q->execute(); 

        $perso->hydrate([
            'id' => $this->_db->lastInsertId(), 
            'degats' => 0,
            'experience' => 10
        ]); 


    }
    public function count(){
        // Exécute une requête COUNT() et retourne le nombre de résultats retourné.
        return $this->_db->query('SELECT COUNT(*) FROM personnages')->fetchColumn(); 

    }
    public function delete(Personnage $perso){
        // Exécute une requête de type DELETE.
        $this->_db->exec('DELETE FROM personnages WHERE id ='. $perso->id()); 

    }
    public function exists($info){
        // Si le paramètre est un entier, on veut récupérer le personnage avec son identifiant.
      // Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Personnage.
    
    // Sinon, on veut récupérer le personnage avec son nom.
    // Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Personnage.
       if(is_int($info)){
           return (bool) $this->_db->query('SELECT COUNT(*) FROM personnages WHERE id ='. $info)->fetchColumn(); 
       }

    }
    public function get($info){
        // Si le paramètre est un entier, on veut récupérer le personnage avec son identifiant.
      // Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Personnage.
    
    // Sinon, on veut récupérer le personnage avec son nom.
    // Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Personnage.
       if(is_int($info)){
           $q = $this->_db->query('SELECT id, nom, degats, experience FROM personnages WHERE id = ' .$info); 
           $data = $q->fetch(PDO::FETCH_ASSOC); 
           return new Personnage($data); 
       }else{
           $q = $this->_db->prepare('SELECT id,nom, degats, experience FROM personnages WHERE nom = :nom'); 
           $q->execute([':nom' => $info ]); 
           $data = $q->fetch(PDO::FETCH_ASSOC); 
           return new Personnage($data); 
       }

    }
    public function getList($info){
        // Retourne la liste des personnages dont le nom n'est pas $nom.
    // Le résultat sera un tableau d'instances de Personnage.
          $persos = []; 
          $q = $this->_db->prepare('SELECT id, nom, degats, experience FROM personnages WHERE nom <> :nom ORDER BY nom ');
          $q->execute([':nom' => $nom]); 

          while( $data = $q->fetch(PDO::FETCH_ASSOC)){
              $persos[] = new Personnage($data); 
          }
          return $persos;


    }
    public function update(Personnage $perso){
         // Prépare une requête de type UPDATE
         // Assignation des valeurs à la requête
         // Exécution de la requête.
         $q = $this->_db->prepare('UPDATE personnages SET degats = :degats  WHERE id = :id');
         $q->bindValue(':degats', $perso->degats(), PDO::PARAM_INT);
         $q->bindValue(':id', $perso->id(), PDO::PARAM_INT); 
         $q->execute();

    }
    public function setDb(PDO $db){
        $this->_db = $db;
    }


}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>TP : Mini jeu de combat</title>
    
    <meta charset="utf-8" />
  </head>
  <body>
    <form action="" method="post">
      <p>
        Nom : <input type="text" name="nom" maxlength="50" />
        Experience : <input type="text" name="experience" maxlength="50" />
        <input type="submit" value="Créer ce personnage" name="creer" />
        <input type="submit" value="Utiliser ce personnage" name="utiliser" />
      </p>
    </form>
  </body>
</html>