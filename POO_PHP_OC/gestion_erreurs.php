<?php

/**
 * On va essayer de convertir les erreur en exceptions grâce à la méthode set_error_handler()
 * // On va créer une classe qui va hériter de la classe errorException. 
 * Le constructeur de cette classe prend 5 paramètres facultatifs : le massage d'erreur, le code de l'erreur, la sévérité de l'erreur, son fichier et la ligne où elle se trouve.
 * 
 */
// MonException hérite d'ErrorException
class MonException extends ErrorException
{
  public function __toString()
  {
      //Les erreur de type E_X sont générés par PHP. Les erreurs de type E_USER son générées de l'utiisateur avec la méthode trigger_error
    switch ($this->severity) 

    {
      case E_USER_ERROR : // Si l'utilisateur émet une erreur fatale;
        $type = 'Erreur fatale';
        break;
      
      case E_WARNING : // Si PHP émet une alerte.
      case E_USER_WARNING : // Si l'utilisateur émet une alerte.
        $type = 'Attention';
        break;
      
      case E_NOTICE : // Si PHP émet une notice.
      case E_USER_NOTICE : // Si l'utilisateur émet une notice.
        $type = 'Note';
        break;
      
      default : // Erreur inconnue.
        $type = 'Erreur inconnue';
        break;
    }
    
    return '<strong>' . $type . '</strong> : [' . $this->code . '] ' . $this->message . '<br /><strong>' . $this->file . '</strong> à la ligne <strong>' . $this->line . '</strong>';
  }
}

function error2exception($code, $message, $fichier, $ligne)
// Notre fonction callback pour set_error_handleur doit avoir 2 à 5 paramètres. 
/**
 * Le numéro de l'erreur, le message de l'erreur, le nom du fichier dans lequel l'erreur a été lancée, le numéro de la ligne à laquelle l'erreur a été identifiée
 * Un tableau avec toutes les variables qui existaient jusqu'à ce que l'erreur soit rencontrée.
 */
{
  // Le code fait office de sévérité.
  // Reportez-vous aux constantes prédéfinies pour en savoir plus.
  // http://fr2.php.net/manual/fr/errorfunc.constants.php
  throw new MonException($message, 0, $code, $fichier, $ligne);
}

function customException($e)
{
  echo 'Ligne ', $e->getLine(), ' dans ', $e->getFile(), '<br /><strong>Exception lancée</strong> : ', $e->getMessage();
}

set_error_handler('error2exception');// fonction pour transformer les erreurs fatales, les notices et alerts en exceptions. 
//Prend en paramètre le callaback error2exception dans lequel on jette une exception de type ErrorException avec une classe héritée d'elle (MonException). 

set_exception_handler('customException');// Fonction pour personnaliser les exceptions non attrapées. 
//Prend en paramètre un callback qui a pour seul paramètre l'objet de représentation de l'exception


//Résumé
/**
 * Une exception est une erreur que l'on peut attraper grâce aux mots-clé try et catch.
*Une exception est une erreur que l'on peut personnaliser, que ce soit au niveau de son affichage ou au niveau de ses renseignements (fichier concerné par l'erreur, le numéro de la ligne, etc.).

*Une exception se lance grâce au mot-cléthrow.

*Il est possible d'hériter des exceptions entre elles.

*Il existe un certain nombre d'exceptions déjà disponibles dont il ne faut pas hésiter à se servir pour respecter la logique du code.
 */