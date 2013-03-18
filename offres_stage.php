<?php
    session_start();
    require_once("head.php");
    require_once("connexion.php");
    require_once("fonctions.php");
    
    if(!isset($_SESSION["profil"]) || ($_SESSION["profil"] != "eleve" && $_SESSION["profil"] != "gestionnaire" ))
    {
        die("Accès non autorisé !");
    }
?>

	<body><div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->
		
		<?php 
                $page = "offres_stage.php";
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
					
					<h3>Liste des offres de stage</h3>
					
					<ul class="content-box-tabs">
						<li><a href="#tab1" class="default-tab">Liste des stages</a></li> <!-- href must be unique and match the id of target div -->
						<?php
                                                    if($_SESSION["profil"] == "gestionnaire")
                                                        echo '<li><a href="#tab2">Ajouter une nouvelle offre</a></li>';
                                                ?>
					</ul>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
                                        <?php
                                           // Si l'utilisateur souhaite supprimmer un stage
                                           if($_SESSION["profil"] == "gestionnaire" && isset($_GET["deleteid"]) && is_numeric($_GET["deleteid"]))
                                           {
                                               // on crée la requête SQL 
                                               $sql = 'DELETE FROM stage WHERE id_stage = '. $_GET["deleteid"];

                                               // on envoie la requête 
                                               $result = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

                                                if($result)
                                                {
                                                     ?>
                                                                 <div class="notification success png_bg">
                                                                         <div>
                                                                                 Suppression réussie.
                                                                         </div>
                                                                 </div>
                                                     <?php
                                                }
                                                else
                                                {
                                                     ?>
                                                                 <div class="notification success png_bg">
                                                                         <div>
                                                                                 Erreur de suppression.
                                                                         </div>
                                                                 </div>
                                                     <?php
                                                }
                                           }
                                       ?>

					<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
						
						<table>
							
							<thead>
								<tr>
								   <th>Thème</th>
								   <th>Entreprise</th>					   
								   <th>Date de début</th>
								   <th>Date de fin</th>
                                                                   <th>Statut</th>
                                                             <?php if($_SESSION["profil"] == "gestionnaire") echo '
                                                                   <th>Options</th>'; 
                                                             ?>
								</tr>
								
							</thead>
						 
							<tbody>
                                                            
                                                            <?php
                                                            // on crée la requête SQL 
                                                            $sql = 'SELECT * FROM stage, entreprise, etablissement WHERE stage.statut = "offre" AND stage.id_etab = etablissement.id_etab AND etablissement.id_ent = entreprise.id_ent'; 

                                                            // on envoie la requête 
                                                            $req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

                                                            // on prend la première ligne
                                                            while ($donnees = mysql_fetch_array($req)){
                                                               echo('
                                                                <tr>
									<td><a href="visualiser_offre.php?id_stage=' . $donnees["id_stage"] . '">' . $donnees["theme"] . '</a></td>
									<td>' . $donnees["nom_ent"] . '</td>
									<td>' . date_us_to_fr($donnees["date_deb"]) . '</td>
									<td>' . date_us_to_fr($donnees["date_fin"]) . '</td>
                                                                        <td>' . $donnees["statut"] . '</td>');
                                                                       if($_SESSION["profil"] == "gestionnaire"){ 
                                                                            echo '
                                                                            <td>
                                                                                    <!-- Icons -->
                                                                                     <a href="modifier_offre.php?id_stage=' . $donnees["id_stage"] . '" title="Modifier"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>
                                                                                     <a href="offres_stage.php?deleteid=' . $donnees["id_stage"] . '" title="Supprimer" onclick="javascript:return confirm(\'Etes vous sûr de vouloir supprimer cette offre de stage ?\')"><img src="resources/images/icons/cross.png" alt="Delete"/></a>
                                                                            </td>';
                                                                       }
								echo '</tr>';
                                                            }
                                                            
                                                            
                                                            ?>
		
							</tbody>
							
						</table>
						
					</div> <!-- End #tab1 -->
					
					
                                        
                                        <!-- Si l'utilisateur est un gestionnaire, il peut ajouter une offre-->
                                        <?php if($_SESSION["profil"] == "gestionnaire") { ?>
                                        <div class="tab-content" id="tab2">
					
						<form id="myform" action="enregistrement_offre_stage.php" method="post">
						 <input type="hidden" name="action" id="action" value="add">	
                                                    <fieldset class="column-left"> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
                                                            <!-- Infos sur le stage -->
                                                            
								<p>
									<label for="theme">Thème du stage</label>
										<input class="text-input small-input" type="text" id="theme" name="theme" />
										<br /><small>Titre de l'offre de stage</small>
								</p>
								
                                                                <p>
									<label for="date_deb">Date de début du stage</label>
										<input class="text-input small-input" type="text" id="date_deb" name="date_deb" />
										<br /><small>Au format jj/mm/aaaa</small>
								</p>
                                                                
                                                                
                                                                
                                                                <p>
									<label for="mail_contact">Adresse e-mail du contact</label>
										<input class="text-input small-input" type="text" id="mail_contact" name="mail_contact" />
										<br /><small>Au format exemple@exemple.com</small>
								</p>
                                                                
                                                                                                             
                                                                
                                                                <p>
									<label for="resume">Résumé de l'offre</label>
									<textarea class="text-input textarea wysiwyg" id="resume" name="resume" cols="79" rows="15"></textarea>
                                                                        <br />
                                                                        <p id="compteur"><small>0 caractères/500</small></p>
								</p>
                                                                
                                    
                                                                
								<p>
									<input class="button" id="submit" type="submit" value="Envoyer" />
								</p>
								
							</fieldset>
                                                    
                                                        <fieldset class="column-right">
                                                                
                                                                <p>
									<label for="statut">Statut</label>              
									<input type="hidden" name="statut" id="statut" value="offre">
                                                                        <p>Offre de stage</p>
								</p>
                                                                
                                                                
                                                                
                                                                <p>
									<label for="date_fin">Date de fin du stage</label>
										<input class="text-input small-input" type="text" id="date_fin" name="date_fin" />
										<br /><small>Au format jj/mm/aaaa</small>
								</p>
                                                                
                                                                <p>
									<label for="num_contact">Numéro de téléphone du contact</label>
										<input class="text-input small-input" type="text" id="num_contact" name="num_contact" />
										<br /><small>Indiquez l'indicatif si étranger</small>
								</p> 
                                                                
                                                                                                                                <p>
									<label for="id_ent">Entreprise</label>              
									<select name="id_ent" id="id_ent" class="small-input" onchange="getEtab(this.value);">
                                                                            <option value="vide" >Choisissez une entreprise</option>
                                                                            <?php
                                                                                 // on crée la requête SQL 
                                                                                 $sql = 'SELECT id_ent, nom_ent FROM entreprise';
                                                                                     
                                                                                // on envoie la requête 
                                                                                $req2 = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());

                                                                                // on prend la première ligne
                                                                                while ($donnees = mysql_fetch_array($req2)){
                                                                                    echo '<option value="' . $donnees["id_ent"] . '">' . $donnees["nom_ent"] . '</option>';
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
						
					</div> <!-- End #tab2 -->      
                                        <?php } //fin if($_SESSION["profil"] == "gestionnaire") { ?>
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
			
                        
			
			<div class="clear"></div>
                        
                       
   

                                                        
                        <?php include("footer.php"); ?>