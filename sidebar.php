<?php
    

    //Si la variable $page n'existe pas , on lui attribut une chaine vide pour éviter d'avoir un erreur php "$page n'existe pas"
    if(!isset($page)){
        $page = "";
    }
?>


<div id="sidebar"><div id="sidebar-wrapper"> <!-- Sidebar with logo and menu -->
			
			<h1 id="sidebar-title"><a href="#">Gestion des stages</a></h1>
		  
			
          

                    <?php if($_SESSION["profil"] == "eleve"){ ?>
                    <!-- Si l'utilisateur est un élève -->
                            
                        <!-- Logo (221px wide) -->
                        <a href="accueil_eleve.php"><img id="logo" src="resources/images/logo.png" alt="Logo" /></a>

                        <!-- Sidebar Profile links -->
                        <div id="profile-links">
                                Login : <?php echo $_SESSION["login"];?>.<br/>
                                Profil : Élève.<br />
                                <br />
                                <a href="deconnexion.php" title="Se déconnecter">Se déconnecter</a>
                        </div>        
			
			<ul id="main-nav">  <!-- Accordion Menu -->
				<li>
					<a href="accueil_eleve.php" class="nav-top-item no-submenu <?php if($page=="accueil_eleve.php") echo "current"; ?>"> <!-- Add the class "no-submenu" to menu items with no sub menu -->
						Mes stages
					</a>       
				</li>
				
				<li> 
					<a href="offres_stage.php" class="nav-top-item no-submenu <?php if($page=="offres_stage.php") echo "current"; ?>"> <!-- Add the class "current" to current menu item -->
                                                Offres de stage
					</a>
					<!--<ul>
						<li><a href="#">Par lieu</a></li>
						<li><a href="#">Par entreprise</a></li>
						<li><a href="#">Par theme</a></li>
                                                <li><a href="#">Par date</a></li>
					</ul>-->
				</li>
				
				<li>
					<a href="#" class="nav-top-item <?php if($page=="conventions.php") echo "current"; ?>">
						Mes documents
					</a>
					<ul>
						<li><a href="conventions.php" class="<?php if($page=="conventions.php") echo "current"; ?>">Conventions de stage</a></li>
						<li><a href="#">Rapports de stage</a></li>
					</ul>
				</li>
                            <?php }     // fin   if($_SESSION["profil"] == "eleve"){ 
                                  
                            
                            
                            
                            
                           

                    else if($_SESSION["profil"] == "gestionnaire"){?>
                     <!-- Si l'utilisateur est un gestionnaire -->
                     
                     
                        <!-- Logo (221px wide) -->
                        <a href="accueil_gestionnaire.php"><img id="logo" src="resources/images/logo.png" alt="Logo" /></a>

                        <!-- Sidebar Profile links -->
                        <div id="profile-links">
                                Login : <?php echo $_SESSION["login"];?>.<br/>
                                Profil : Gestionnaire.<br />
                                <br />
                                <a href="deconnexion.php" title="Se déconnecter">Se déconnecter</a>
                        </div>        
			
                        
                        
			<ul id="main-nav">  <!-- Accordion Menu -->
                                <li>
					<a href="accueil_gestionnaire.php" class="nav-top-item no-submenu <?php if($page=="accueil_gestionnaire.php") echo "current"; ?>"> <!-- Add the class "no-submenu" to menu items with no sub menu -->
						Liste des stages
					</a>       
				</li>
				
				<li> 
					<a href="offres_stage.php" class="nav-top-item no-submenu <?php if($page=="offres_stage.php"|| $page=="modifier_offre.php") echo "current"; ?>"> <!-- Add the class "current" to current menu item -->
                                                Offres de stage
					</a>
					<!--<ul>
						<li><a href="#">Par lieu</a></li>
						<li><a href="#">Par entreprise</a></li>
						<li><a href="#">Par theme</a></li>
                                                <li><a href="#">Par date</a></li>
					</ul>-->
				</li>
				
				<li>
					<a href="#" class="nav-top-item">
						Mes documents
					</a>
					<ul>
						<li><a href="conventions.php">Conventions de stage</a></li>
						<li><a href="#">Rapports de stage</a></li>
					</ul>
				</li>
                                
				
			</ul> <!-- End #main-nav -->		
                        
                        <?php } // Fin else if($_SESSION["profil"] == "gestionnaire"){?>
			
</div></div> 

<!-- End #sidebar -->