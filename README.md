# TP Vikings

## Modalités

Ce TP est à faire par **groupes de 3**.

Les livrables sont à rendre sur MyGES au plus tard à la date de rendu indiquée dans l'espace de rendu sur MyGes. Ces livrables incluent :
- Le code source de votre projet
- Un export de l'environnement Postman de votre projet
- Un export de la base de données de votre projet
- Le lien du repository GitHub de votre projet s'il y en a un
- Une brève explication de votre stratégie de travail en équipe (qui a fait quoi, comment vous avez travaillé ensemble, etc.) dans un fichier `WORK.md`

## Objectifs


En partant du code source disponible dans les ressources TP, vous devez ajouter de nouvelles fonctionnalités à l'API des vikings.

### Armes

Ajouter une nouvelle table `Weapon` qui aura les propriétés suivantes :
- `id` : int, clé primaire auto-incrémentée
- `type` : string, type de l'arme (ex: "sword", "axe", "bow", "spear", etc.) (obligatoire)
- `damage` : int, dégâts infligés par l'arme (obligatoire)
Mettre à jour le fichier `ressources/vikings.sql` avec la structure de création de la table.

Ajouter les fonctionnalités CRUD pour les armes :
- `GET /weapon/findOne.php?id=<id>` : retourne l'arme d'id `<id>`
- `GET /weapon/find.php` : retourne toutes les armes avec un système de limite et d'offset
- `PUT /weapon/create.php` : crée une nouvelle arme
- `PATCH /weapon/update.php?id=<id>` : modifie une arme d'id `<id>`
- `DELETE /weapon/delete.php?id=<id>` : supprime une arme d'id `<id>`

### Vikings

Un viking ne peut avoir qu'une seule arme au maximum, mais peut n'en avoir aucune.
- Modifier la table `viking` pour qu'elle ait une arme (clé étrangère `weaponId` vers la table `Weapon`, peut être null).

Ajouter les fonctionnalités CRUD pour les vikings :
- Mettre à jour les fonctionnalités Read du viking (findOne et findAll) pour qu'elles retournent le détail de l'arme du viking si celui-ci en a une. L'arme doit être retournée au format d'un lien vers le détail de l'arme (HATEOAS) si le viking en a une (sinon renvoyer `"weapon": ""`). Exemple :
```JSON
{
  "id": 1,
  "name": "Ragnar",
  "health": 300,
  "attack": 200,
  "defense": 150,
  "weapon": "/weapon/findOne.php?id=3"
}
```
- Mettre à jour la fonctionnalité Create du viking pour qu'il puisse être créé avec une arme par défaut si elle existe. Retourner une erreur appropriée si elle n'existe pas et ne pas créer le viking.
- Mettre à jour la fonctionnalité Update avec PUT pour mettre à jour le viking dans son intégralité. Faire les vérifications appropriées pour mettre à jour l'arme si elle existe, ou la supprimer si elle n'existe pas.
- Créer une nouvelle fonctionnalité Update dans le fichier `api/viking/updateWeapon.php` du viking pour lui ajouter une arme si elle existe, ou lui retirer une arme en passant `null` au lieu d'un id existant. Retourner une erreur appropriée si elle n'existe pas et ne pas mettre à jour le viking. Faire les vérifications appropriées pour correspondre aux contraintes d'appel suivantes :
```JSON
{
  "weaponId": 3
}
```
Attention : la nouvelle fonctionnalité d'Update ne doit mettre à jour **que** le champ WeaponId du viking, et ne doit pas mettre à jour les autres champs du viking. Utiliser le verbe HTTP approprié.

### Bonus

- Dans le cas où une arme est supprimée, mettre à jour les vikings qui la possèdent pour qu'ils n'aient plus d'arme.
- Ajouter une fonctionnalité `GET /viking/findByWeapon.php?id=<weaponId>` qui retourne tous les vikings possédant l'arme d'id `<weaponId>`. Le corps de réponse doit retourner uniquement le nom des vikings et un lien vers leur détail (HATEOAS). Exemple :
```JSON
[
  {
    "name": "Ragnar",
    "link": "/viking/findOne.php?id=1"
  },
  {
    "name": "Lagertha",
    "link": "/viking/findOne.php?id=2"
  }
]
```

