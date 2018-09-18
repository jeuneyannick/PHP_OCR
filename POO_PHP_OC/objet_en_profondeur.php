<?php

class MaClasse
{
  public $attribut1;
  public $attribut2;
}
/* Lors de l'instanciation de la classe, la variable $a ne contient en fait pas vraiment l'objet issu de la classe
mais son identifiant. 
*/
 
$a = new MaClasse;//La variable $a ne contient pas l'objet instancié mais son identifiant.

$b = $a; // On assigne à $b l'identifiant de $a, donc $a et $b représentent le même objet.

$a->attribut1 = 'Hello';
echo $b->attribut1; // Affiche Hello.

$b->attribut2 = 'Salut';
echo $a->attribut2; // Affiche Salut.
echo '<pre>'; 

/*
Pour copier tous les attributs et valeurs dans un nouvel objet unique, il faut alors cloner l'objet. 
Pour ce faire, il faut appliquer à l'objet qu'on désire copier le mot-clé clone. 
Après cela, les deux objets auront les mêmes attributs et valeurs mais avec des identifiants différents. 
On pourra modifier l'un sans que l'autre ne soit concernée. 
*/

$c = clone $a; 

if ( $c === $a){
    echo '$c = $a';
}else {
    echo '$c != $a'; 
}