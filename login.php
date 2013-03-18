<?php
    require_once('head.php');
    require_once ('connexion.php');
    require_once ('fonctions.php');
    
    // récupération des variables et protection contre les injections
    $login_post = mysql_real_escape_string(stripslashes($_POST["login"]));
    $mdp_post   = mysql_real_escape_string(stripslashes($_POST["mot_de_passe"]));
?>  
	<body id="login">
		
		<div id="login-wrapper" class="png_bg">
			<div id="login-top">
                            <!-- Logo (221px width) -->
				<img id="logo" src="resources/images/logo.png" alt="Logo" />
			</div> <!-- End #logn-top -->
			
			<div id="login-content">
				
                            <?php
                                
                                // on crée la requête SQL 
                                $sql = 'SELECT login, mdp FROM utilisateur WHERE login = "' . $login_post .'" AND mdp = "' . $mdp_post . '"'; 

                                // on envoie la requête 
                                $req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
                                
                                // On compte le nombre de lignes
                                $count = mysql_num_rows($req);
                                
                                // Si on a une ligne, l'identification est réussie
                                if($count == 1)
                                {                                                              
                                    ?>
                                    	<div class="notification success png_bg">
						<div>
							Identification réussie. Redirection ...
						</div>
					</div>
                                    <?php
                                    session_start();
                                    
                                    init_variables_session($login_post);                            
                                    if($_SESSION["profil"] == "eleve")
                                        header( "refresh:2;url=accueil_eleve.php" );
                                    else 
                                        header( "refresh:2;url=accueil_gestionnaire.php" );
                                }
                                
                                // Sinon, on affiche un message d'erreur et on renvoie l'utilisateur au formulaire de login
                                else
                                {
                                    ?>
                                    	<div class="notification error png_bg">
						<div>
							Erreur d'identification. Redirection ...
						</div>
					</div>
                                    <?php
                                    
                                    header( "refresh:2;url=index.php" );
                                }
                             
                            ?>
                            
			</div> <!-- End #login-content -->
			
		</div> <!-- End #login-wrapper -->
		
  </body>
  
</html>

<?php
// on ferme la connexion à mysql 
mysql_close(); 
?>
