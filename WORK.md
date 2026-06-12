# Travail en équipe

## Membres
Wissam, Sanjay, Hilel

## Comment on s'est organisés

On s'est retrouvés en cours pour lire la consigne ensemble et décider qui faisait quoi avant de commencer à coder. On a d'abord réfléchi ensemble à la structure de la base de données — notamment la relation entre viking et weapon avec la clé étrangère nullable — pour être sûrs qu'on partait tous sur la même base avant de se séparer.

On a utilisé GitHub pour partager le code et Discord pour communiquer. Quand quelqu'un bloquait sur quelque chose, il demandait sur le groupe et on essayait de résoudre ça ensemble.

## Qui a fait quoi

**Wissam** a pris en charge la partie base de données : la création de la table Weapon et la modification de la table viking pour ajouter la FK weaponId. Il a ensuite développé le DAO weapon et tous les endpoints du CRUD armes (findOne, find, create, update, delete).

**Sanjay** a repris les endpoints viking existants pour les adapter à la nouvelle relation avec les armes. Il a modifié create.php et update.php pour gérer le weaponId optionnel avec la vérification que l'arme existe bien, et il a créé updateWeapon.php. Il s'est aussi occupé de tester toutes les routes dans Postman.

**Hilel** a développé la fonctionnalité bonus findByWeapon, vérifié la cohérence du code entre les différentes parties, exporté la base de données et rédigé ce fichier.

## Les difficultés qu'on a rencontrées

La principale galère c'était le weaponId nullable. Au début on ne gérait pas bien le cas où il vaut null dans les requêtes SQL, ce qui faisait crasher le create viking. On a mis un moment à comprendre qu'il fallait passer `null` explicitement en paramètre PDO plutôt que de l'ignorer.

Le format HATEOAS nous a aussi posé question : on ne savait pas trop si on devait retourner `null` ou une chaîne vide quand le viking n'a pas d'arme. On a relu la consigne et choisi la chaîne vide `""` comme indiqué dans l'exemple.

On a également eu un bug sur le update viking où si on envoyait les mêmes données qu'avant, `rowCount()` retournait 0 et on renvoyait un 404 à tort. On a corrigé ça en vérifiant d'abord que le viking existe avant de lancer la requête SQL.

## Ce qu'on retient

Ce TP nous a bien fait pratiquer la séparation DAO / endpoint et la gestion des relations entre tables en PHP. Le concept de HATEOAS était nouveau pour nous et c'était intéressant à mettre en place même si au début on voyait pas trop l'intérêt.
