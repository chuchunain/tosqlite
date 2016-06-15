# tosqlite
Couche d'abstraction simple en PHP pour migrer de mysql vers sqlite


Par Matthieu ONFRAY (http://www.onfray.info)
Licence : CC by sa
Utilisation : abstraction SGBD minimaliste pour migrer de mysql vers sqlite (et inversement)
quelques explications :
- session nécessaire pout stocker le lien vers la base ouverte $_SESSION["LIEN_BASE_SQL"]
- pour se connecter à mysql, j'utilise des constantes IP, USER, PASS, NOM_BASE (les noms sont évocateurs)
- pour se connecter à sqlite, un nom de fichier suffit, c'est la constante FIC_SQLITE
