# Welchome

## Usage

Install dependencies.
``` bash   
# For Symfony
composer install
# For npm
npm install
```

Create Symfony project
``` bash
 composer create-project symfony/website-skeleton my-project
```



Server
``` bash
# Run server
php bin/console server:run
```

## Helpers

``` bash
# Create entity
php bin/console make:entity
# Create Controller
php bin/console make:controller
# Create Form
php bin/console make:form
# Create CRUD
php bin/console make:crud
```

Database
``` bash
# Update .env DATABASE_URL line
DATABASE_URL=mysql://user:password@127.0.0.1:8889/db-name
# Create database
php bin/console doctrine:database:create
# Load tables in database
php bin/console doctrine:migrations:migrate
# Drop database
php bin/console doctrine:database:drop --force
```

## API

``` bash
# Access to all housings
127.0.0.1/api/housings
# Access to one housing
127.0.0.1/api/housing/id
```
French translation

# WelcHome

WelcHome est un projet Symfony 4 qui a pour but de permettre à des particuliers de mettre en location très simplement leurs biens.

## C'est partis

Ces instructions vous permettront d'obtenir une copie du projet en cours d'exécution sur votre machine locale à des fins de développement et de test.

### Prérequis

Pour installer le projet sur votre machine il vous faudra avoir PHP 7.1 minimum.
Pour cela il vous faudra installer WAMP sur Windows, MAMP sur macOS ou LAMP sur Linux. Pour ce faire, référez-vous à la procédure d'installation propre à chaque logiciel cité précédemment. 
Avoir "composer" d'installer en local ou en global

#### Pour installer composer sur Windows, il vous faudra :

Aller sur le site <a href="https://getcomposer.org/Composer-Setup.exe"> Get Composer</a>, télécharger le fichier et l'exécuter en suivant les instructions affichées.

#### Pour installer Composer sur macOS ou Linux, il vous faudra : 

##### Ouvrir un terminal sur macOS :
- Pressez simultanément sur les touches "Commande" + "Espace" de votre clavier
- Tapez ensuite "terminal" et validez avec la touche "Entrer"

##### Ouvrir un terminal sur Linux :
- Pressez simultanément sur les touches "Ctrl" + "Alt" + "T" de votre clavier

Une fois dans l'invite de commande ou le terminal déplacez-vous dans le dossier du projet grâce à la commande "cd".
Puis copiez et collez les lignes suivantes dans le terminal.

```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === '93b54496392c062774670ac18b134c3b3a95e5a5e5c8f1a9f115f203b75bf9a129d5daa8ba6a13e2cc8a1da0806388a8') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
mv composer.phar /usr/local/bin/composer
```

### Installation

- Commencez par lancer WAMP, LAMP ou MAMP en fonction du système ou vous êtes.
- Grâce à un terminal ou une invite de commande, déplacez-vous à la racine du projet, puis faites les commandes suivantes pour créer la base de données

```
composer install
php bin/console doctrine:database:create
php bin/console make:migration
php bin/console doctrine:migrations:migrate
```

Une fois la base de données créé et initialisé vous n'aurez qu'à lancer le serveur (mais pas trop fort ^_^) via la commande

```
php bin/console server:start
```

Le site est alors disponible à l'adresse indiqué dans le terminal ou l'invite de commande

## Étapes de création 

#### Indication des lettres utilisées :
- F : Fonctionnel
- B : Buggé
- A : En attente
- E : En cours de développement
- Vide : Non Commencé

#### Taches à faire
- [F] Créer les entités
- [F] Créer un formulaire d'inscription
- [B] Créer un formulaire de connexion
- [A] Créer un formulaire de création de bien
- [F] Créer la page d'accueil
- [E] Créer un formulaire de recherche
- [F] Pouvoir visualiser les biens
- [F] Pouvoir visualiser un bien
- [  ] Pouvoir éditer un bien
- [  ] Pouvoir ajouter des photos à un bien
- [  ] Pouvoir ajouter des alertes
- [  ] Pouvoir ajouter des équipements à bien
- [  ] Pouvoir créer une chambre
- [  ] Pouvoir créer un lit

## Testes

Prochainement


## Créé avec 

* [Symfony](https://symfony.com/doc/current/index.html) - Le Framework utilisé
* [Composer](https://getcomposer.org) - Le gestionnaire de dépendance
* [MAMP](https://www.mamp.info/en/) - Utilisé pour la base de données et php
* [LAMP](https://doc.ubuntu-fr.org/lamp) - Utilisé pour la base de données et php


## Auteurs

* **Florian Blandin** - *Développeur* - [BlandinF](https://github.com/blandinf)
* **Nicolas Duwavrent** - *Développeur* - [Nicopuissance](https://github.com/Nicopuissance)

## License

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details

## Remerciements

* Merci à notre professeur de nous avoir permis de réaliser ce projet en cours
* Merci à nos camarades de classe pour l'aide qu'ils nous ont fournis.
 
