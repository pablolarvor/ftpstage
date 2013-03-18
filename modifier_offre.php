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
    
    
    // On vérifie si l'utilisateur est un gestionnaire
    if(!isset($_SESSION["profil"]) || $_SESSION["profil"] != "gestionnaire")
    {
        die("Accès non autorisé !");
    }
    
   
    // Obtention des informations du stage
    
    $sql_stage = 'SELECT * FROM stage, etablissement, entreprise WHERE id_stage = ' . $id_stage . ' AND stage.id_etab = etablissement.id_etab AND etablissement.id_ent = entreprise.id_ent   '; 

    $req_stage = mysql_query($sql_stage) or die('Erreur SQL !<br>'.$sql_stage.'<br>'.mysql_error());

    $donnees_stage = mysql_fetch_array($req_stage);
    

?>

	<body><div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->
		
		<?php 
                    $page = "modifier_offre.php";
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
					
					<h3>Modifier un stage</h3>
					
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
						<form id="myform" action="enregistrement_offre_stage.php" method="post">
                                                    <input type="hidden" name="action" id="action" value="update">
                                                    <input type="hidden" name="id" id="id" value="<?php echo $donnees_stage["id_stage"] ?>">
                                                    <fieldset class="column-left"> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
                                                            <!-- Infos sur le stage -->
                                                            
								<p>
									<label>Thème du stage</label>
                                                                        <input class="text-input small-input" type="text" id="theme"  name="theme" value="<?php echo $donnees_stage["theme"] ?>"/>
										<br /><small>Titre de votre stage</small>
								</p>
								
                                                                <p>
									<label>Date de début du stage</label>
                                                                        <input class="text-input small-input" type="text" id="date_deb" name="date_deb" value="<?php echo date_us_to_fr($donnees_stage["date_deb"]) ?>" />
										<br /><small>Au format jj/mm/aaaa</small>
								</p>
                                                                
                                                                
                                                                
                                                                <p>
									<label>Adresse e-mail du contact</label>
										<input class="text-input small-input" type="text" id="mail_contact" name="mail_contact" value="<?php echo $donnees_stage["mail_contact"] ?>"/>
										<br /><small>Au format exemple@exemple.com</small>
								</p>
                                                                
                                                                                                             
                                                                
                                                                <p>
									<label>Résumé de votre stage</label>
                                                                        <textarea class="text-input textarea wysiwyg" id="resume" name="resume" cols="79" rows="15"><?php echo $donnees_stage["resume"] ?></textarea>
                                                                        <br /><small>Limité à 500 caractères</small>
								</p>
                                                                
                                    
                                                                
								<p>
									<input class="button" type="submit" id="submit" value="Envoyer" />
                                                                        
								</p>
								
							</fieldset>
                                                    
                                                        <fieldset class="column-right">
                                                                
                                                                <p>
									<label for="statut">Statut</label>              
									<input type="hidden" name="statut" id="statut" value="offre">
                                                                        <p>Offre de stage</p>
								</p>
                                                                
                                                                
                                                                
                                                                <p>
									<label>Date de fin du stage</label>
										<input class="text-input small-input" type="text" id="date_fin" name="date_fin" value="<?php echo date_us_to_fr($donnees_stage["date_fin"]) ?>"/>
										<br /><small>Au format jj/mm/aaaa</small>
								</p>
                                                                
                                                                <p>
									<label>Numéro de téléphone du contact</label>
										<input class="text-input small-input" type="text" id="num_contact" name="num_contact" value="<?php echo $donnees_stage["num_contact"] ?>"/>
										<br /><small>Indiquez l'indicatif si étranger</small>
								</p> 
                                                                
                                                                                                                                <p>
									<label>Entreprise</label>              
									<select name="id_ent" id="id_ent" class="small-input" onchange="getEtab(this.value);">
                                                                            <option value="vide" >Choisissez une entreprise</option>
                                                                            <?php
                                                                                 // on crée la requête SQL 
                                                                                 $sql = 'SELECT id_ent, nom_ent FROM entreprise';
                                                                                     
                                                                                // on envoie la requête 
                                                                                $req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

                                                                                // on prend la première ligne
                                                                                while ($donnees = mysql_fetch_array($req)){
                                                                                    echo '<option value="' . $donnees["id_ent"] . '"';
                                                                                   // if($donnees_stage["id_ent"]==$donnees["id_ent"])echo 'selected="selected"';
                                                                                    echo '>' . $donnees["nom_ent"] . '</option>';
                                                                                }
                                                                            ?>
									</select>
                                                                        
                                                                        
								</p>
                                                                
                                                                
                                                                <p>
                                                                        <!-- Emplacement de la liste déroulante des établissements -->
                                                                        <span id="blocEtab"></span> 
                                                                </p>
                                                                
                                                        </fieldset>
							
							<div class="clear"></div><!-- End .clear -->
                                                        
						</form>
						    					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
			
                        <a class="button" href="accueil_eleve.php">Retour à l'accueil</a>
			
			<div class="clear"></div>
                        
                       
                             <script>
                              /*  $(document).ready(function(){
                                  $("#myform").validate({
                                rules: {
                                  theme: {
                                    required: true,
                                    min: 13
                                  }
                                }
                              });
                                });*/
                            </script>


                                                        
                        <?php require_once ("footer.php"); ?>