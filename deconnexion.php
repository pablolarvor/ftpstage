<?php
    require_once('head.php');
?>
    
 
	<body id="login">
		
		<div id="login-wrapper" class="png_bg">
			<div id="login-top">
                            <!-- Logo (221px width) -->
				<img id="logo" src="resources/images/logo.png" alt="Logo" />
			</div> <!-- End #logn-top -->
			
			<div id="login-content">
				
                           
                                    	<div class="notification information png_bg">
						<div>
							Déconnexion ...
						</div>
					</div>                         

                                    <?php                                   
                                    session_start();
                                    session_destroy();
                                    header( "refresh:2;url=index.php" );                                                           
                                    ?>
                            
			</div> <!-- End #login-content -->
			
		</div> <!-- End #login-wrapper -->
		
  </body>
  
</html>
