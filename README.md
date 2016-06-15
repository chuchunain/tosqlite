# tosqlite
Couche d'abstraction simple en PHP pour migrer de mysql vers sqlite

Par Matthieu ONFRAY (http://www.onfray.info)

Licence : CC by sa

Utilisation : abstraction SGBD minimaliste pour migrer de mysql vers sqlite (et inversement)

Quelques explications :
- session nécessaire pout stocker le lien vers la base ouverte $_SESSION["LIEN_BASE_SQL"]
- pour se connecter à mysql, j'utilise des constantes IP, USER, PASS, NOM_BASE (les noms sont évocateurs)
- pour se connecter à sqlite, un nom de fichier suffit, c'est la constante FIC_SQLITE

Ce script est bien utile pour migrer vite d'un sgbd à l'autre mais côté PHP uniquement. Pour la base et ses données, le meilleur outil est celui-ci à mon avis https://github.com/dumblob/mysql2sqlite
