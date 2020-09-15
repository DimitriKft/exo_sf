# exo-sf

### Objectifs

Le but de cet exercice est de récupérer les données météo via l'API https://openweathermap.org et de l'afficher dans une page web.

L'objectif principal de cet exercice est d'évaluer votre capacité à utiliser le PHP, JS, HTML, CSS. N'hésitez pas à ajouter des fonctionnalités sur la page qui affiche la météo ou à créer d'autre pages.

Les "points à faire" correspondent à une base d'objectifs, ils ne sont pas obligatoires, et vous pouvez en faire d'autres si vous avez des idéees.

Il n'y a pas de limitation sur les libraires utilisés.

### Informations utiles

Afin de simplifier le développement, les composants suivants sont déjà présents :

- Le template : situé dans `templates/weather/index.html.twig` doit afficher les données de la météo
- Le controller : situé dans `src/Controller/WeatherController.php` doit récupérer les données et les passer au template
- Le service : situé dans `src/Service/WeatherService.php` doit s'occuper de réaliser l'appel à l'API

L'ensemble du projet a été initialisé afin de vous faire gagner du temps.

La technologie utilisée est `symfony 4.3.2`

L'api utilisé pour récupérer la météo est `Open Weather`

La fonction `dump` de symfony permet d'afficher des données lorsqu'on est en mode debug.

### Installation du projet

Installer PHP 7.2 ou supérieur

- sur debian utiliser ces instructions:

> apt install apt-transport-https lsb-release ca-certificates

> wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg

> echo "deb https://packages.sury.org/php/ \$(lsb_release -sc) main" > /etc/apt/sources.list.d/php.list

> apt update

> apt install php7.2

- sur ubuntu utiliser ces instructions:

> apt-get install software-properties-common

> add-apt-repository ppa:ondrej/php

> apt update

> apt install php7.2

Installer composer: https://getcomposer.org/
Clonner le repo git sur votre PC
Lancer la commande `composer install`
Se créer un compte sur le site `https://openweathermap.org/`, obtenir une clef d'API gratuite.
Renseigner la clef dans la variabl d'environnement `WHEATHER_API_KEY` (suivre les instructions fournies dans le fichier `.env`)
Lancer la commande `php bin/console server:run` pour lancer un serveur web qui écoute sur l'adresse `http://127.0.0.1:8000`
La page qui affichera la météo est disponible à l'url `http://127.0.0.1:8000/weather`

### Points à faire

- [ ] Formater les données récupérées par le service afin que le tableau en retour renvoi de vraies valeurs
- [ ] Passer les données au template via le controller
- [ ] Mettre à jour le template pour afficher les données
- [ ] Remonter la météo de toulouse en Occitanie
- [ ] Gérer les erreurs de l'API via un bloc `try catch` dans le service
- [ ] Ajouter un formulaire et des appels API pour permettre à l'utilisateur de choisir sa ville
- [ ] Faire de la page qui affiche la météo la home page
- [ ] Rendre la page qui affiche la météo responsive
