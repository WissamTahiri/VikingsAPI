# Stratégie de travail en équipe

## Membres du groupe

- **Wissam**
- **Sanjay**
- **Hilel**

## Répartition des tâches

### Wissam
- Mise en place de la table `Weapon` (SQL + migrations)
- Développement du CRUD complet pour les armes (`api/weapon/`)
- Mise à jour du DAO viking pour intégrer la relation avec l'arme (HATEOAS)

### Sanjay
- Mise à jour des endpoints viking (create, update) pour gérer l'arme
- Développement de `updateWeapon.php` (PATCH)
- Tests Postman et export de la collection

### Hilel
- Développement des fonctionnalités bonus (`findByWeapon`, suppression en cascade via FK `ON DELETE SET NULL`)
- Revue de code et correction des bugs
- Export de la base de données et rédaction du `WORK.md`

## Méthode de collaboration

- **GitHub** : travail sur la branche `main`, chaque membre pousse ses commits régulièrement.
- **Communication** : points réguliers pour synchroniser l'avancement.
- **Tests** : chaque endpoint est testé via Postman avant d'être considéré comme terminé.
- **Base de données** : phpMyAdmin utilisé pour visualiser les données et vérifier les contraintes de clé étrangère.

## Difficultés rencontrées

- Gestion de la clé étrangère nullable (`weaponId`) et construction du lien HATEOAS dans les réponses viking.
- Distinction entre `PATCH /viking/updateWeapon.php` (mise à jour uniquement de l'arme) et `PUT /viking/update.php` (mise à jour complète).
- La suppression en cascade des armes sur les vikings a été gérée directement via la contrainte SQL `ON DELETE SET NULL`.
