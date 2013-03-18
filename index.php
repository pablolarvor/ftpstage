<?php
    require_once("head.php");
?>
  
	<body id="login">
		
		<div id="login-wrapper" class="png_bg">
			<div id="login-top">
			
		
				<!-- Logo (221px width) -->
				<img id="logo" src="resources/images/logo.png" alt="Logo" />
			</div> <!-- End #logn-top -->
			
			<div id="login-content">
				
				<form action="login.php" method="post">
				
					<div class="notification information png_bg">
						<div>
							Entrez votre identifiant et votre mot de passe IPB.
						</div>
					</div>
					
					<p>
						<label>Login</label>
						<input name="login" class="text-input" type="text" />
					</p>
					<div class="clear"></div>
					<p>
						<label>Mot de passe</label>
						<input name="mot_de_passe" class="text-input" type="password" />
					</p>
                                        
                                        <!--
					<div class="clear"></div>
                                        
					<p id="remember-password">
						<input type="checkbox" />Remember me
					</p>
                                        -->
                                        
					<div class="clear"></div>
					<p>
						<input class="button" type="submit" value="Connexion" />
					</p>
					
				</form>
			</div> <!-- End #login-content -->
			
		</div> <!-- End #login-wrapper -->
		
  </body>
  
</html>
