<!doctype html>
    <html lang="fr">
 
	<head>
		
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
		<title>Gestion des stages - ENSC</title>
                <link id="page_favicon" href="resources/images/favicon.ico" rel="icon" type="image/ico">
		
		<!--                       CSS                       -->
	  
		<!-- Reset Stylesheet -->
		<link rel="stylesheet" href="resources/css/reset.css" type="text/css" media="screen" />
	  
		<!-- Main Stylesheet -->
		<link rel="stylesheet" href="resources/css/style.css" type="text/css" media="screen" />
		
		<!-- Invalid Stylesheet. This makes stuff look pretty. Remove it if you want the CSS completely valid -->
		<link rel="stylesheet" href="resources/css/invalid.css" type="text/css" media="screen" />	
		
		<!-- Colour Schemes
	  
		Default colour scheme is green. Uncomment prefered stylesheet to use it.
		
		<link rel="stylesheet" href="resources/css/blue.css" type="text/css" media="screen" />
		-->
                <?php
                // Si l'utilisateur est un gestionnaire, on met le thème en rouge
                if(isset($_SESSION["profil"]) && $_SESSION["profil"] == "gestionnaire")
                    echo '<link rel="stylesheet" href="resources/css/red.css" type="text/css" media="screen" />';
	 
		?>
		
		<!-- Internet Explorer Fixes Stylesheet -->
		
		<!--[if lte IE 7]>
			<link rel="stylesheet" href="resources/css/ie.css" type="text/css" media="screen" />
		<![endif]-->
		
		<!--                       Javascripts                       -->
	  
		<!-- jQuery -->
		<script type="text/javascript" src="resources/scripts/jquery-1.3.2.min.js"></script>
		
		<!-- jQuery Configuration -->
		<script type="text/javascript" src="resources/scripts/simpla.jquery.configuration.js"></script>
		
		<!-- Facebox jQuery Plugin -->
		<script type="text/javascript" src="resources/scripts/facebox.js"></script>
		
		<!-- jQuery WYSIWYG (What you see is what you get) Plugin -->
		<script type="text/javascript" src="resources/scripts/jquery.wysiwyg.js"></script>
                
                <!-- jQuery JQuery Validate Plugin -->
                <script type="text/javascript" src="resources/scripts/jquery.validate.min.js"></script>
                
                <!-- Source permettant les listes liées d'entreprise à établissement -->
                <script type="text/javascript" src="resources/scripts/etab_xhr.js" ></script>
                
                <!-- Source permettant de valider les formulaires -->
                <script src="resources/scripts/form.js" type="text/javascript"></script>

		
		<!-- Internet Explorer .png-fix -->
		
		<!--[if IE 6]>
			<script type="text/javascript" src="resources/scripts/DD_belatedPNG_0.0.7a.js"></script>
			<script type="text/javascript">
				DD_belatedPNG.fix('.png_bg, img, li');
			</script>
		<![endif]-->
		
	</head>