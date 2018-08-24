<?php 
/*
DATE : stocke une date au format AAAA-MM-JJ (Année-Mois-Jour) ;

TIME : stocke un moment au format HH:MM:SS (Heures:Minutes:Secondes) ;

DATETIME : stocke la combinaison d'une date et d'un moment de la journée au format AAAA-MM-JJ HH:MM:SS. Ce type de champ est donc plus précis ;

TIMESTAMP : stocke le nombre de secondes passées depuis le 1er janvier 1970 à 00 h 00 min 00 s ;

YEAR : stocke une année, soit au format AA, soit au format AAAA.


*/
require 'crud.php'; 

/*
Fonction de gestion de dates 

NOW() pour obtenir la date et l'heure actuelles 
INSERT INTO minichat(pseudo, message, date) VALUES('Mateo', 'Message !', NOW())
la date sera envoyée au format AAAA-MM-JJ HH-MM-SS
CURDATE() ET CURTIME() renvoient aussi des dates en format AAAA-MM-JJ et l'heure HH-MM-SS

DAY(), MONTH(), YEAR() pour extraire le jour, le mois ou l'année d'une date. 
SELECT pseudo, message, DAY(date) AS jour FROM minichat

On recupère ici entr autres le numéro du jour où le message a été posté 
HOUR(), MINUTE(), SECOND() pour extraire les heures, minutes, secondes

extraire les heures, minutes, et secondes pareil sur un champ de type DATETIME ou TIME
SELECT pseudo, message, HOUR(date) AS heure FROM minichat

DATE_FORMAT formate une date 
permet d'adapter directement la date au format que l'on souhaite 
On met devant les initiales le caractère %d/%min/%Hh/%ss
SELECT pseudo, message, DATE_FORMAT(date, '%d/%m/%Y %Hh%imin%ss') AS date FROM minichat

DATE_ADD et DATE_SUB : Ajouter ou soustraire des dates 
Avec cette fonction on peut soustraire des heures, minutes, secondes, jours, mois ou années à une date 
Elle prend deux paramètres : la date sur laquelle il faut travailler et le nombre à ajouter ainsi que son type. 
SELECT pseudo, message, DATE_ADD(date, INTERVAL 15 DAY) AS date_expiration FROM minichat
SELECT pseudo, message, DATE_ADD(date, INTERVAL 2 MONTH) AS date_expiration FROM minichat
*/

?>