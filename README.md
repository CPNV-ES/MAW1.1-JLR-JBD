# MAW1.1-JLR-JBD
Projet MAW1.1
---
# Auteurs

| Nom | 
| ----------- | 
| [Jonathan Letourneur](https://github.com/jonathan-letourneur) | 
| [Jessy Borcard](https://github.com/tristepin222) | 

# Environnement de travail 

Notre environnement de travail consiste d'un IDE, PHP, visialiseur de base de données, Github, voici une liste détaillée avec les version des bonnes application et framework :
| Logiciel/Framework | Version |
| ----------- | ----------- |
| Visual Studio Code | 1.70.2 |
| PHP | 8.1.9 |
| HeidiSQL | 12.1 |
| GitHub Desktop | 3.0.6 |
| Mysql Workbench | 8.0.30 |
| DrawIO | 20.2.3 |
## Procédure d'installation

- Visual Studio Code : installez la version 1.70.2 ou plus récente de Visual Studio Code : https://code.visualstudio.com/
- PHP : installez la version 8.1.9 et seulement cette version pour avoir la garantie de compatiblité, sans ça, il y a des risques de problèmes : voici le lien pour l'installation : [https://www.php.net/releases/](https://windows.php.net/downloads/releases/archives/), choissez la bonne version, et téléchargez-la, après que le téléchargement soit terminé, décompressez le fichier, et mettez le à la racine de C:\
- HeidiSQL : Insatallez la version 12.1 ou supérieur de [HeidiSQL](https://www.heidisql.com/download.php), pensez a bien créer un utilisateur dans HeidiSQL que le site web pourras utiliser pour se connecter à la base de données
- GitHub Desktop : installez la version 3.0.6 de [Github Desktop](https://desktop.github.com/) ou supérieur
- Mysql Workbench : la version de l'application à peu d'importance, l'application est juste utilisée pour faire un schéma MLD, une autre application qui peux faire un schéma MLD, est aussi une option valable pour le projet
- DrawIO : parreil que pour Mysql Workbench, peu importe, l'application ou la version, il faut juste une application permmetant de faire un MCD


# Source
Le projet de base (Vue), est pris de [stormy-plateau-54488.herokuapp.com](https://stormy-plateau-54488.herokuapp.com), y compris le CSS
# Language utilisé
Principalement du php et HTML
# Features à ajouter

En anglais 
## Exercise building

- [ ] Create a new blank exercise with a title
- [ ] Add a new field with a title and a value type
- [ ] Edit an existing field to either rename it or change the value type
- [ ] Destroy an existing field

## Exercise taking

- [ ] List the exercises that are ready for answers
- [ ] Take an exercise to see all the fields
- [ ] Answer the taken exercise by filling the fields
- [ ] Update the existing answers for a taken exercise

## Exercise management

- [ ] List all the exercises in 3 columns based on their state
- [ ] Destroy an exercise (only when building or closed)
- [ ] Change state of an exercise through icon buttons
- [ ] Stats for an exercise: show the recap (all takes, all fields)
- [ ] Stats for an exercise: show the answers of all fields of one take
- [ ] Stats for an exercise: show the answers on one field of all takes

## Modalités particulières

### Echéances

Rendu intérmédiaire le 31.10.2022

Rendu final le 21.12.2022

### Rendu

Le code ainsi que la documentation **doivent** être livrés au moyen d'un repo Git de l'organisation CPNV-ES.

Le code est évalué selon les critères suivants:

- forme: respect d'une convention d'écriture et cohérence dans l'ensemble du code
- forme: cohérence entre les noms des fichiers et le contenu
- fond: découpage modulaire des fonctionnalités
- fond: respect des responsabilités dans les modules (business-logic, présentation, services, ...)
- volume (pas les SLoC mais une estimation de la production par rapport au temps à disposition)
- effort particulier démontré
- La contribution au code de chaque participant donne une note individuelle qui sera la note de technique.

La documentation:

- Contient **toutes** les informations utiles et **rien que** les informations utiles à un développeur qui reprend le flambeau. Parmi les informations utiles, on compte au minimum:
  - Un modèle conceptuel de données, qui permet d'appréhender les aspects métiers
  - Un modèle logique de données, qui permet d'appréhender les aspects techniques
  - Une procédure de mise en place de l’environement de dévelopement
- Est éditée avec n'importe quelle application, mais elle est remise en PDF.
- Fait l'objet d'une évaluation pour le groupe dans son ensemble

### Sujet

Créer une copie de l'application "exercise looper" disponible à: [https://stormy-plateau-54488.herokuapp.com


### Contraintes

Groupe de deux personnes hétérogène dans le niveau technique et la provenance de la formation initiale.

- HTML CSS PHP
- Pas de JS

L'utilisation de framework n'est pas autorisée. Par contre l'utilisation de librairies
fournissant un service de bas niveau est autorisé.
Exemples: moteur de templating, router simple.
Contre-exemples: ORM, composants de framework comme Symfony.

