<?php
/*
Licence : CC by sa
Utilisation : abstraction SGBD minimaliste pour migrer de mysql vers sqlite (et inversement)
quelques explications :
- session nécessaire pout stocker le lien vers la base ouverte $_SESSION["LIEN_BASE_SQL"]
- pour se connecter à mysql, j'utilise des constantes IP, USER, PASS, NOM_BASE (les noms sont évocateurs)
- pour se connecter à sqlite, un nom de fichier suffit, c'est la constante FIC_SQLITE
*/


function sql_connect()
{
	switch (SQL)
	{
		case "mysql" :
		$_SESSION["LIEN_BASE_SQL"] = mysqli_connect(IP, USER, PASS, NOM_BASE) or die("Connexion impossible au serveur"); 
		break;
		
		case "sqlite" :
		//serveur SQLite
		$_SESSION["LIEN_BASE_SQL"] = new SQLite3(FIC_SQLITE);
		break;
	}
}

function sql_close()
{
	switch (SQL)
	{
		case "mysql" : return mysqli_close($_SESSION["LIEN_BASE_SQL"]);
		case "sqlite" : return $_SESSION["LIEN_BASE_SQL"]->close();
	}
}

function sql_query($req)
{
	switch (SQL)
	{
		case "mysql" : return mysqli_query($_SESSION["LIEN_BASE_SQL"], $req);
		case "sqlite" : return $_SESSION["LIEN_BASE_SQL"]->query($req);
	}
}

function sql_num_rows($res)
{ 
	switch (SQL)
	{
		case "mysql" : return mysqli_num_rows($res);
		case "sqlite" : //cette fonction n'existe pas, on l'implémente
			$numRows = 0;
			while ($rowR = $res->FetchArray()) $numRows++;
			$res->reset();
			return $numRows;
	}
}

function sql_fetch_array($res)
{ 
	switch (SQL)
	{
		case "mysql" : return mysqli_fetch_array($res);
		case "sqlite" : return $res->fetchArray();
	}
}
