<?php
    session_start();
    require_once("head.php");
    require_once ("connexion.php");
    require_once ("fonctions.php");
    
    
    // On vérifie si l'utilisateur est un éleve
    if(!isset($_SESSION["profil"]) || $_SESSION["profil"] != "gestionnaire")
    {
        die("Accès non autorisé !");
    } 
    
?>

<!-- ajout d'une règle de style css pour cacher le champ "Spécifiez" au chargement -->
<style type="text/css">
    #cach { display:none;}
</style>
 
<!-- fonction javascript permettant d'afficher le champ "Spécifiez" si la valeur "Autres" est sélectionnée dans la liste déroulante -->
<script type="text/javascript">
    function plus(op){
	document.getElementById("cach").style.display= op=="autres" ? "block" : "none"
    }
</script>

	<body><div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->
		
		<?php 
                    $page = "ajouter_entreprise.php";
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
					
					<h3>Ajouter une entreprise</h3>
					
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
					
						<form id="forment" action="enregistrement_entreprise.php" method="post">
							
                                                  <!--  <fieldset class="column-left">  Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
                                                            <!-- Infos sur le stage -->
                                                            
								<p>
									<label>Nom de l'entreprise</label>
                                                                        <input class="text-input small-input" type="text" id="nom"  name="nom"/>
								</p>
                                                                
                                                                <p>
									<label>Secteur d'activité</label>
                                                                        <select name="sect_act" id="sect_act" onchange="plus(this.value)"  >
                                                                            <option>Choisissez ...</option>
                                                                            <option>Agriculture et agroalimentaire</option>
                                                                            <option>Commerce et artisanat</option>
                                                                            <option>Énergie</option>
                                                                            <option>Finance et assurance</option>
                                                                            <option>Industrie</option>
                                                                            <option>Recherche</option>
                                                                            <option>Télécoms et Internet</option>
                                                                            <option>Tourisme</option>
                                                                            <option value="autres">Autres</option>
                                                                        </select>
                                                                        
                                                                <div id="cach">
                                                                     Spécifiez
                                                                        <input class="text-input small-input" type="text" id="autres" name="autres"/>
                                                                </div>
                                                                    
                                                                        
                                                             </p>
								
                                                                <p>
									<label>Adresse du siège social</label>
                                                                        <input class="text-input small-input" type="text" id="adr" name="adr"/>
								</p>
                                                                
                                                                
                                                                
                                                                <p>
									<label>Ville</label>
										<input class="text-input small-input" type="text" id="ville" name="ville"/>
								</p>
                                                                
                                                                                                             
                                                                
                                                                <p>
									<label>Code postal</label>
                                                                        <input class="text-input" type="texte" id="cp" name="cp" maxlength="5"/>
								</p>
                                                                                                              
								<p>
									<input class="button" type="submit" id="submit" value="Envoyer" />
                                                                        
								</p>
								
							<!-- </fieldset> -->
                                                    
                                                        <div class="clear"></div><!-- End .clear -->
                                                        
						</form>
						    					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
			
                        <a class="button" href="accueil_eleve.php">Retour à l'accueil</a>
			
			<div class="clear"></div>
                        
                       
                             <script>
                              /*  $(document).ready(function(){
                                  $("#forment").validate({
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