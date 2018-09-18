<?php 
function loadClass($class){
    require $class . '.php' ; 
}

spl_autoload_register('loadClass');  
/*Une interface est une classe entièrement abstraite décrivant un comportement à nos objets.
Toutes les méthodes dans une interface doivent être en visibilité publique. 
Une interface ne possède pas de méthodes abstraites ou finales.
Une interface ne doit pas avoir le même nom qu'une classe et vice versa. 
*/


interface Speaker 
{
    public function speak($name); 
}
/*
On implémente les interfaces grâce au mot-clé implements qu'on utilise comme pour l'héritage avec extends
*/
class Personnage implements Speaker {
    public function speak($name){
        echo "Hello " . $name . " ,  je suis crée à partir d'une interface "; 
    }

}

$perso = new Personnage; 

$perso->speak("Spirou"); 