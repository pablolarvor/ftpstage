<?php

        /* Pour une utilisation sur le serveur
        $serveur = "mysql12.000webhost.com";
        $nom_base = "a3178971_stage";
        $login = "a3178971_user";
        $motdepasse = "1gorill€";
         */

        if($_SERVER['SERVER_NAME'] == "localhost")
	{
            $serveur = "localhost";
            $nom_base = "projet-stage";
            $login = "root";
            $motdepasse = "";
        }
        else if($_SERVER['SERVER_NAME'] == "projet-stages.webatu.com")
	{
            $serveur = "mysql12.000webhost.com";
            $nom_base = "a3178971_db";
            $login = "a3178971_user";
            $motdepasse = "1gorille";
        }
        else if($_SERVER['SERVER_NAME'] == "projet-stage.p.ht")
	{
            $serveur = "mysql.hostinger.fr";
            $nom_base = "u398670541_bdstage";
            $login = "u398670541_usst";
            $motdepasse = "1gorille";
        }
        
        
        
        // on se connecte à MySQL 
        $bdd = mysql_connect ($serveur,$login,$motdepasse) or die ('ERREUR '.mysql_error());
        
        // on sélectionne la base 
        mysql_select_db($nom_base,$bdd); 
        
?>
