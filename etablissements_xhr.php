<?php

require_once("connexion.php");

/**

 * Code qui sera appelé par un objet XHR et qui

 * retournera la liste déroulante des établissements

 * correspondant à l'entreprise sélectionnée.

 */


/* On récupère l'identifiant de l'entreprise choisie. */

$idr = isset($_GET['idr']) ? $_GET['idr'] : false;

/* Si on a une entreprise, on procède à la requête */

if(false !== $idr)

{

    /* Création de la requête pour avoir les établissement de cette entreprise */

    $sql2 = "SELECT `id_etab`, `adresse`, `ville`, `pays`".

            " FROM `etablissement`".

            " WHERE `id_ent` = ". $idr ."".

            " ORDER BY `id_etab`;";

    
    $rech_etab = mysql_query($sql2, $bdd);

    /* Un petit compteur pour les établissements */

    $nd = 0;

    /* On crée deux tableaux pour les numéros et les cracs des établissements */

    $id_etab = array();

    $adresse = array();

    $ville = array();
    
    $pays = array();
    
    /* On va mettre les numéros et caracs des etablissements dans les quatres tableaux */

    while(false != ($ligne_etab = mysql_fetch_assoc($rech_etab)))

    {

        $id_etab[] = $ligne_etab['id_etab'];

        $adresse[] = $ligne_etab['adresse'];

        $ville[] = $ligne_etab['ville'];

        $pays[] = $ligne_etab['pays'];

        $nd++;

    }

    /* Maintenant on peut construire la liste déroulante */

    $liste = "<label>Établissement </label>     ";

    $liste .= '<select name="id_etab" id="etablissement">'."\n";

    for($d = 0; $d < $nd; $d++)

    {

        $liste .= '<option value="'. $id_etab[$d] .'">'. $adresse[$d] .' '. $ville[$d]  .' '. $pays[$d] . '</option>';

    }

    $liste .= '</select>'."\n";

    /* Un petit coup de balai */

    mysql_free_result($rech_etab);

    /* Affichage de la liste déroulante */

    echo($liste);

}

/* Sinon on retourne un message d'erreur */

else

{

    echo("<p>Une erreur s'est produite. L'entreprise sélectionnée comporte une donnée invalide.</p>\n");

}

?>