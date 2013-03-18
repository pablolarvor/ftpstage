<?php
    session_start();
    require_once("head.php");
    require_once ("connexion.php");
    require_once ("fonctions.php");
   
     
    // On vérifie si l'id d'un stage a bien été envoyé
    if(isset($_GET["id_stage"]) && is_numeric($_GET["id_stage"]))
    {
        $id_stage = $_GET["id_stage"];
    }
    else{
        die("Id du stage invalide");
    }
    
    // On vérifie si l'utilisateur est un éleve ou un gestionnaire
     if(!isset($_SESSION["profil"]) || ($_SESSION["profil"] != "eleve" && $_SESSION["profil"] != "gestionnaire" ))
    {
        die("Accès non autorisé !");
    }
       
    
    // On vérifie que le stage est une offre

    $sql = 'SELECT id_stage, statut FROM stage WHERE statut = "offre" AND id_stage = "' . $id_stage . '"'; 

    $req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

    $count = mysql_num_rows($req);

    // Si on n'a pas 1 ligne, l'utilisateur n'a pas le droit d'être ici.
    if($count != 1)
    {     
        die("Le stage ne correspond pas à l'utilisateur connecté.");
    }                                                     
    
    // Obtention des informations du stage
    
    
    $sql_stage = 'SELECT * FROM stage, etablissement, entreprise WHERE id_stage = ' . $id_stage . ' AND stage.id_etab = etablissement.id_etab AND etablissement.id_ent = entreprise.id_ent   '; 

    $req_stage = mysql_query($sql_stage) or die('Erreur SQL !<br>'.$sql_stage.'<br>'.mysql_error());

    $donnees_stage = mysql_fetch_array($req_stage);
    
?>
	<body><div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->
		
		<?php 
                    $page = "visualiser_offre.php";
                    require_once("sidebar.php"); 
                ?>
		
		<div id="main-content"> <!-- Main Content Section with everything -->
			
			<noscript> <!-- Show a notification if the user has disabled javascript -->
				<div class="notification error png_bg">
					<div>
						JavaScript n'est pas supporté par votre navigateur. <a href="http://browsehappy.com/" title="Mettez à jour votre navigateur">Mettez à jour</a> votre navigateur ou <a href="http://www.google.com/support/bin/answer.py?answer=23852" title="Activez le JavaScript dans votre navigateur">activez</a> le Javascript s'il vous plaît.
					</div>
				</div>
			</noscript>
			
			<!-- Page Head -->
			<h2>Bienvenue <?php echo $_SESSION["prenom"]; ?></h2>
			<p id="page-intro">Interface de gestion des stages à l'ENSC</p>
			
			<div class="clear"></div> <!-- End .clear -->
			
			<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Visualisation de l'offre de stage</h3>

                                        <div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
                                        
					
					
							
                                                <fieldset class="column-left"> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->

                                                        <!-- Infos sur le stage -->

                                                            <p>
                                                                    Thème du stage : <?php echo $donnees_stage["theme"]; ?>
                                                            </p>

                                                            <p>
                                                                    Date de début du stage : <?php echo date_us_to_fr($donnees_stage["date_deb"]); ?>
                                                            </p>
 

                                                    </fieldset>

                                                    <fieldset class="column-right">

                                                            <p>
                                                                    Statut du stage : <?php echo $donnees_stage["statut"]; ?>
                                                            </p>
                                                            

                                                            <p>
                                                                    Date de fin du stage : <?php echo date_us_to_fr($donnees_stage["date_fin"]); ?>
                                                            </p>

                                                            <p>
                                                                     Numéro de téléphone du contact : <br/><?php echo $donnees_stage["num_contact"]; ?>
                                                            </p> 

                                                                                                            
                                                            <p>
                                                                     Entreprise : <br/><?php echo $donnees_stage["nom_ent"]; ?>
                                                            </p> 


                                                            <p>
                                                                     Établissement : <br/><?php echo $donnees_stage["adresse"] . ' ' . $donnees_stage["ville"]. ' ' . $donnees_stage["pays"]; ?>
                                                            </p>
                                                            
                                                        

                                                    </fieldset>
                                    
                                                    <div class="clear"></div>
                                                    
                                                    
                                                    <p>
                                                            Résumé de l'offre : <br/><?php echo $donnees_stage["resume"]; ?>
                                                    </p>
                                                    
                                                    
                                                    <div class="clear"></div><!-- End .clear -->
                                                    
                                                <?php
                                                // Si l'utilisateur est un élève, on lui donne la possibilité de postuler
                                                    if($_SESSION["profil"] == "eleve"){?>
                                                    <form id="form_postuler" action="postuler.php" method="post">
                                                        <input type="hidden" name="id_stage" id="id_stage" value="<?php echo $donnees_stage["id_stage"]; ?>">
                                                        <input class="button" type="submit" id="submit" value="postuler" />                       
                                                    </form>
                                                <?php }
                                                ?>
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
			
                        
                        <a class="button" href="offres_stage.php">Retour aux offres de stage</a>
                        
			
			<div class="clear"></div>
                        
                       
          
                        <?php require_once ("footer.php"); ?>