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
                        
                        
                        
                         // Test d' id_stage
                        if (!empty($_POST["id_stage"]) && is_numeric($_POST["id_stage"])){
                            $id_stage = $_POST["id_stage"];
                        }
                        else {
                            $form_valide = false;
                            echo ("id_stage incorrect<br/>");
                        }
                        
                        
                        
                        // Si le formulaire est valide, on effectue la reaquête d'insertion
                        if($form_valide){
                            // on crée la requête SQL 
                       
                            // on crée la requête SQL 
                                $sql = 'INSERT INTO postuler (login_util, id_stage)
                                        VALUES ("'  .$_SESSION["login"] . '","'
                                                  . $id_stage . '")';
                            
                            
                           
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