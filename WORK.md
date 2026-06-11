# Travail en équipe

## Membres
Wissam, Sanjay, Hilel

## Répartition

**Wissam** a géré la base de données (création de la table Weapon, ajout du weaponId sur la table viking avec la FK) et tout le CRUD des armes côté DAO et endpoints.

**Sanjay** s'est occupé des endpoints viking qui touchent à l'arme : le create et l'update pour gérer le weaponId optionnel, et le updateWeapon.php. Il a aussi fait les tests Postman au fur et à mesure.

**Hilel** a fait la route findByWeapon, exporté la BDD, et relu l'ensemble du code pour s'assurer que tout était cohérent. Il a aussi rédigé ce fichier.

## Organisation

On a travaillé principalement sur Discord, avec GitHub pour se partager le code. On a d'abord défini ensemble la structure de la BDD avant de se répartir les tâches pour éviter les conflits. Chacun testait ses routes dans Postman avant de push.

## Ce qui nous a posé problème

Le plus compliqué c'était de gérer le weaponId nullable dans toutes les requêtes SQL et PHP — au début on avait des erreurs parce qu'on ne gérait pas bien le cas null. On a aussi mis du temps à comprendre le format HATEOAS, notamment qu'il faut retourner une chaîne vide `""` et pas `null` quand le viking n'a pas d'arme.
