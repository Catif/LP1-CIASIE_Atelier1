# LP1-CIASIE_Atelier1

## Groupe

- [Christopher JUE](https://github.com/JUEChristopher)
- [Khaoula BOULHDIR](https://github.com/KhaoulaCode)
- [Mehdi TAHRI](https://github.com/MehdiThr)
- [Bradley BARBIER](https://github.com/Catif)

## Installation du projet :

####  Génération du fichier `main.css`
Lancer `sass html\style\sass\:html\style\css\` à la racine du projet dans votre terminal

#### Installation et configuration de la base de donnée
Dans un premier temps, récupéré le fichier `conf/demo_database.sql` et importé le dans votre SGBD favori.

Renommer le fichier `conf/db.ini.example` en `conf/db.ini` puis remplacer les données par celle correspondante à la base de donnée faite à l'étape précédente.

#### Lancement du serveur Local
Lancer `php -S localhost:8000` pour lancer un serveur local à partir de php.


#### Comptes de démo
Dans la banque de données préalablement installée, des comptes ont été générés.
Leurs informations de connexion sont : 
- email : **user<$number>@photomedia.fr**
- password : **user_<$number>**

<$number> étant un nombre allant de 0 à 25.

exemple : 
- email : **user15@photomedia.fr**
- password : **user_15**