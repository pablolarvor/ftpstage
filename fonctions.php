<?php
    function init_variables_session($login)
    {
         // on crée la requête SQL 
        $sql = 'SELECT * FROM utilisateur WHERE login = "' . $login .'"'; 

        // on envoie la requête 
        $req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

        // on prend la première ligne
        $donnees = mysql_fetch_array($req);
        
        $_SESSION["login"] = $donnees["login"];
        $_SESSION["nom"] = $donnees["nom"];
        $_SESSION["prenom"] = $donnees["prenom"];
        $_SESSION["date_naissance"] = $donnees["date_naissance"];
        $_SESSION["profil"] = $donnees["profil"];
        $_SESSION["email"] = $donnees["email"];
        $_SESSION["promotion"] = $donnees["promotion"];
    }
    
    function date_us_to_fr($date)
    {
        $jour = substr($date,8,2);
        $mois = substr($date,5,2);
        $annee = substr($date,0,4);
        
        return $jour .'/'. $mois .'/'. $annee;
    }
    
    function date_fr_to_us($date)
    {
        $jour = substr($date, 0, 2);
        $mois = substr($date,3,2);
        $annee = substr($date,6,4);
        
        return $annee .'-'. $mois .'-'. $jour;
    }
?>
