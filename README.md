# HOWLING ABYSS

![Homepage de l'application Howling Abyss](https://zupimages.net/up/23/16/0hkk.png)

**Howling Abyss** est une application web créée à l'occasion du projet de fin d'année de la formation "*KERCODE*" dispensée au GRETA de Vannes.

Son but étant de présenter à un jury de professionnels, les compétences acquises au cours de cette année d'apprentissage du développement web. 

# L'application :

**Howling Abyss** est une application web dédiée aux joueurs de ***League of Legends** **(LoL)***, l'un des jeux les plus populaires sur PC de ces 10 dernières années.

Le but de cette application est principalement d'aider à **l'homogénéisation** du niveau des joueurs lors des parties d'***ARAM***.

> Bref topo au sujet de l'***ARAM*** : 
> 
> L'**ARAM** (**A**ll **R**andom **A**ll **M**id) est un mode de jeu particulier au sein du jeu *League of Legends*. 
> 
> En effet, comme son nom peut l'indiquer, il s'agît d'un mode de jeu où les personnages (aussi appelés ***champions***) attribués aux joueurs lors d'une partie sont **aléatoires**, contrairement au mode de jeu principal de *League of Legends*,  qui permet aux joueurs de choisir le personnage qu'il souhaitera jouer durant la partie.

**Howling Abyss** aidera donc les joueurs, par un système participatif et communautaire d'enregistrement de leurs parties,  à la fois de garder un historique de ces dernières, mais aussi de décider au mieux des *équipements* (aspect essentiel d'une partie de jeu de *LoL*) à acheter.

C'est cette problématique particulière, que cette application vise à régler au terme de son développement car le jeu compte actuellement **186 *champions*** et environ une **centaine d'équipements achetables au cours d'une partie.** 

Même les plus aguerris des joueurs ne peuvent connaître sur le bout des doigts les bonnes combinaisons *d'équipements* à acheter sur l'ensemble des **186 *champions*** que propose le jeu, une assistance extérieure, se trouve alors nécessaire. 

## Contenu de l'application et technologies utilisées :

Pour ce faire, **Howling Abyss** permet à un joueur, de chercher, depuis la homepage, le nom du ***champion*** qui lui a été attribué et de consulter les meilleurs options pour un personnage **donné aléatoirement**.

Grâce à un système de collaboration participative où les joueurs, après s'être enregistrés et connectés, pourront enregistrer les résultats de leurs parties, les champions joués et les équipements achetés lors de cette dernière.

Les technologies suivantes ont été utilisées à ces fins :

 - HTML 
 - CSS
 - JavaScript 
 - PHP 
 - SQL

## Installation du projet : 

L'installation de ce projet nécessite l'installation préalable, si ce n'est pas déjà le cas, de **Composer** et **PHP** : 

 - **Composer** : https://getcomposer.org/
 - **PHP** : https://www.php.net/downloads.php

Le développement de l'application a été effectué sur un serveur local **Apache**, via **XAMPP**.

 - **XAMPP** : https://www.apachefriends.org/fr/index.html

Marche à suivre pour l'installation du projet : 

 - Cloner le projet. 
 - Exécuter les commandes nécessaires à l'installation de **Composer** et **Dotenv** sur le projet (le "*namespacing*" est utilisé pour ce projet, en voici sa forme à éditer dans fichier **composer.json** : 

		"autoload": {
			"psr-4": {
			"HApp\\": "src/"
			}
		},

 - Remplacer le nommage du fichier **.env.example** en **.env** et remplir les données des variables d'environnement en adéquation avec les paramètres de votre base de données.
 - Un dump de la base de données ainsi qu'une image de sa conception MCD sont présents dans le dossier **/ressources/** de l'application.
 - Deux utilisateurs de test sont à votre disposition :

 1) mail : test@test.fr pwd : test
 2) mail : test2@test.fr pwd : test2

![Un Poro, mascotte de l'ARAM](https://zupimages.net/up/23/16/wd8w.png) Pour toute question, contactez-moi à david.howlingabyss@gmail.com !
