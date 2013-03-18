<!-- Page d'enregistrement d'un nouveu stage par un stagiaire -->

<?php
    session_start();
    require_once("head.php");
    require_once ("connexion.php");
    require_once ("fonctions.php");
    
    if(!isset($_SESSION["profil"]) || $_SESSION["profil"] != "eleve")
    {
        die("Accès non autorisé !");
    }
?>

	<div id="sidebar"><div id="sidebar-wrapper"> <!-- Sidebar with logo and menu -->
        </div></div>
		
		<div id="main-content"> <!-- Main Content Section with everything -->
			
                    <?php
                    
                        $form_valide = true;
                        
                        // Test de "theme"
                        if (!empty($_POST["theme"]) && strlen($_POST["theme"]) > 1 && strlen($_POST["theme"]) <= 50){
                            $theme = mysql_real_escape_string(stripslashes($_POST["theme"]));
                        }
                        else {
                            $form_valide = false;
                            echo ("theme incorrect<br/>");
                        }
                        
                        
                        // Test de date_deb
                         if(!empty($_POST["date_deb"]) && strlen($_POST["date_deb"]) == 10){
                            $jour = substr($_POST["date_deb"], 0, 2);
                            $mois = substr($_POST["date_deb"],3,2);
                            $annee = substr($_POST["date_deb"],6,4);
                            
                            if(checkdate($mois, $jour, $annee)){
                                $date_deb = date_fr_to_us($_POST["date_deb"]);
                            }
                            else 
                            {
                                $form_valide = false;
                                echo ("date_deb incorrect checkdate<br/>  ");
                            }
                        }
                        else                           
                        {
                            $form_valide = false;
                            echo ("date_deb incorrect !empty/size<br/>");
                        }
                        
                        
                        // Test de date_fin
                        if(!empty($_POST["date_fin"]) && strlen($_POST["date_fin"]) == 10){
                            $jour = substr($_POST["date_fin"], 0, 2);
                            $mois = substr($_POST["date_fin"],3,2);
                            $annee = substr($_POST["date_fin"],6,4);
                            
                            if(checkdate($mois, $jour, $annee)){
                                $date_fin = date_fr_to_us($_POST["date_fin"]);
                            }
                            else 
                            {
                                $form_valide = false;
                                echo ("date_fin incorrect checkdate<br/>  ");
                            }
                        }
                        else                           
                        {
                            $form_valide = false;
                            echo ("date_fin incorrect !empty/size<br/>");
                        }
                        
                        
                        // Test de mail_contact
                        if(!empty($_POST["mail_contact"]) && strlen($_POST["mail_contact"]) > 3 &&  strlen($_POST["mail_contact"]) <= 30){

                            
                            if(preg_match("/^[_a-z0-9-]+(\.[_a-z0-9+-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i", $_POST["mail_contact"]))
                            {
                                $mail_contact = mysql_real_escape_string(stripslashes($_POST["mail_contact"]));
                            }
  
                            else 
                            {
                                $form_valide = false;
                                echo ("mail_contact incorrect (preg match)<br/>  ");
                            }
                        }
                        else                           
                        {
                            $form_valide = false;
                            echo ("mail_contact incorrect  !empty/size<br/>");
                        }
                        
                        
                        // Test de numero de num_contact
                        if (!empty($_POST["num_contact"]) && strlen($_POST["num_contact"]) > 1 && strlen($_POST["num_contact"]) <= 30){
                            $num_contact = mysql_real_escape_string(stripslashes($_POST["num_contact"]));
                        }
                        else {
                            $form_valide = false;
                            echo ("num_contact incorrect<br/>");
                        }
                        
                        
                        // Test de resume
                        if (!empty($_POST["resume"]) && strlen($_POST["resume"]) > 1 &&  strlen($_POST["resume"]) <= 5000  ){
                            $resume = mysql_real_escape_string(stripslashes($_POST["resume"]));
                        }
                        else {
                            $form_valide = false;
                            echo ("resume incorrect<br/>");
                        }
                        
                        // Test de status
                        if (!empty($_POST["statut"]) && strlen($_POST["statut"]) > 1 && strlen($_POST["statut"]) <= 15){
                            $statut = mysql_real_escape_string(stripslashes($_POST["statut"]));
                        }
                        else {
                            $form_valide = false;
                            echo ("status incorrect<br/>");
                        }
                        
                         // Test d' id_etab
                        if (!empty($_POST["id_etab"]) && is_numeric($_POST["id_etab"])){
                            $id_etab = $_POST["id_etab"];
                        }
                        else {
                            $form_valide = false;
                            echo ("id_etab incorrect<br/>");
                        }
                        
                        
                        // Si le formulaire est valide, on effectue la reaquête d'insertion
                        if($form_valide){
                            // on crée la requête SQL 
                            // 
                            // 
                            // Si on ajoute le stage
                            if($_POST["action"] == "add"){
                            // on crée la requête SQL 
                                $sql = 'INSERT INTO stage (date_deb, date_fin, mail_contact, num_contact, theme, id_etab, resume, login_realisateur, statut)
                                        VALUES ("'  .$date_deb . '","'
                                                  . $date_fin . '","'
                                                  . $mail_contact . '","'
                                                  . $num_contact . '","'
                                                  . $theme . '","'
                                                  . $id_etab . '","'
                                                  . $resume . '","'
                                                  . $_SESSION["login"] . '","'
                                                  . $statut . '")';
                            }
                            
                            // Si on modifie le stage
                            else if ($_POST["action"] == "update"){
                                                  
                                $sql = 'UPDATE stage
                                        SET  date_deb =     "'.$date_deb . '",
                                             date_fin =     "'. $date_fin . '",
                                             mail_contact = "'. $mail_contact . '",
                                             num_contact =  "'. $num_contact . '",
                                             theme =        "'. $theme . '",
                                             id_etab =      "'. $id_etab . '",
                                             resume =       "'. $resume . '",
                                             statut =       "'. $statut . '"
                                        WHERE id_stage =     "'.$_POST["id"] . '"';
                            }

                           // on envoie la requête 
                           $result = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

                           if($result)
                           {
                                ?>
                                            <div class="notification success png_bg">
                                                    <div>
                                                            Enregistrement réussi, redirection ...
                                                    </div>
                                            </div>
                                <?php
                                header( "refresh:2;url=accueil_eleve.php" );
                           }
                           else
                           {
                               die("Erreur SQL");
                           }
                        }
                        else {
                            die("Formulaire invalide");
                        }

                    ?>
                    
                </div>

                                                        
                        <?php require_once ("footer.php"); ?>