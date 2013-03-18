<?php
    session_start();
    require_once("head.php");
    require_once ("connexion.php");
    require_once ("fonctions.php");
?>
  
	<body><div id="body-wrapper"> <!-- Wrapper for the radial gradient background -->
		
		<?php 
                    $page = "accueil_gestionnaire.php";
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
                        
                        <ul class="shortcut-buttons-set">
				
				<li><a class="shortcut-button new-page" href="ajouter_entreprise.php"><span class="png_bg">
					Ajouter une entreprise
				</span></a></li>
                                
                                <li><a class="shortcut-button new-page" href="#"><span class="png_bg">
					Ajouter un établissement
				</span></a></li>
				
			</ul>
			
			<div class="clear"></div> <!-- End .clear -->
			
			<div class="content-box"><!-- Start Content Box -->
				
				<div class="content-box-header">
					
					<h3>Mes stages</h3>
					
					<ul class="content-box-tabs">
						<li><a href="#tab1" class="default-tab">Liste des stages</a></li> <!-- href must be unique and match the id of target div -->
						<li><a href="#tab2">Ajouter un nouveau stage</a></li>
					</ul>
					
					<div class="clear"></div>
					
				</div> <!-- End .content-box-header -->
				
				<div class="content-box-content">
			   
					<div class="tab-content default-tab" id="tab1"> <!-- This is the target div. id must match the href of this div's tab -->
						
						<table>
							
							<thead>
								<tr>
								   <th><input class="check-all" type="checkbox" /></th>
								   <th>Thème</th>
								   <th>Établissement</th>					   
								   <th>Date de début</th>
								   <th>Date de fin</th>
                                                                   <th>Statut</th>
                                                                   <th>Options</th>
								</tr>
								
							</thead>
						 
							<tbody>
								<tr>
									<td><input type="checkbox" /></td>
									<td>Aviation</td>
									<td><a href="#" title="title">établissement cool</a></td>
									<td>25/10/2003</td>
									<td>30/05/3404</td>
                                                                        <td>pourvu</td>
									<td>
										<!-- Icons -->
										 <a href="#" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>
										 <a href="#" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a> 
										 <a href="#" title="Edit Meta"><img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>
									</td>
								</tr>
                                                                
                                                                <tr>
									<td><input type="checkbox" /></td>
									<td>Aviation</td>
									<td><a href="#" title="title">établissement cool</a></td>
									<td>25/10/2003</td>
									<td>30/05/3404</td>
                                                                        <td>pourvu</td>
									<td>
										<!-- Icons -->
										 <a href="#" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>
										 <a href="#" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a> 
										 <a href="#" title="Edit Meta"><img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>
									</td>
								</tr>
                                                                
                                                                <tr>
									<td><input type="checkbox" /></td>
									<td>Aviation</td>
									<td><a href="#" title="title">établissement cool</a></td>
									<td>25/10/2003</td>
									<td>30/05/3404</td>
                                                                        <td>pourvu</td>
									<td>
										<!-- Icons -->
										 <a href="#" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>
										 <a href="#" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a> 
										 <a href="#" title="Edit Meta"><img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>
									</td>
								</tr>
                                                                
                                                                <tr>
									<td><input type="checkbox" /></td>
									<td>Aviation</td>
									<td><a href="#" title="title">établissement cool</a></td>
									<td>25/10/2003</td>
									<td>30/05/3404</td>
                                                                        <td>pourvu</td>
									<td>
										<!-- Icons -->
										 <a href="#" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>
										 <a href="#" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a> 
										 <a href="#" title="Edit Meta"><img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>
									</td>
								</tr>
                                                                
                                                                <tr>
									<td><input type="checkbox" /></td>
									<td>Aviation</td>
									<td><a href="#" title="title">établissement cool</a></td>
									<td>25/10/2003</td>
									<td>30/05/3404</td>
                                                                        <td>pourvu</td>
									<td>
										<!-- Icons -->
										 <a href="#" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>
										 <a href="#" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a> 
										 <a href="#" title="Edit Meta"><img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>
									</td>
								</tr>
                                                                
                                                                <tr>
									<td><input type="checkbox" /></td>
									<td>Aviation</td>
									<td><a href="#" title="title">établissement cool</a></td>
									<td>25/10/2003</td>
									<td>30/05/3404</td>
                                                                        <td>pourvu</td>
									<td>
										<!-- Icons -->
										 <a href="#" title="Edit"><img src="resources/images/icons/pencil.png" alt="Edit" /></a>
										 <a href="#" title="Delete"><img src="resources/images/icons/cross.png" alt="Delete" /></a> 
										 <a href="#" title="Edit Meta"><img src="resources/images/icons/hammer_screwdriver.png" alt="Edit Meta" /></a>
									</td>
								</tr>
                                                                
								
							</tbody>
							
						</table>
						
					</div> <!-- End #tab1 -->
					
					<div class="tab-content" id="tab2">
					
						<form action="" method="post">
							
							<fieldset> <!-- Set class to "column-left" or "column-right" on fieldsets to divide the form into columns -->
								
								<p>
									<label>Small form input</label>
										<input class="text-input small-input" type="text" id="small-input" name="small-input" /> <span class="input-notification success png_bg">Successful message</span> <!-- Classes for input-notification: success, error, information, attention -->
										<br /><small>A small description of the field</small>
								</p>
								
								<p>
									<label>Medium form input</label>
									<input class="text-input medium-input" type="text" id="medium-input" name="medium-input" /> <span class="input-notification error png_bg">Error message</span>
								</p>
								
								<p>
									<label>Large form input</label>
									<input class="text-input large-input" type="text" id="large-input" name="large-input" />
								</p>
								
								<p>
									<label>Checkboxes</label>
									<input type="checkbox" name="checkbox1" /> This is a checkbox <input type="checkbox" name="checkbox2" /> And this is another checkbox
								</p>
								
								<p>
									<label>Radio buttons</label>
									<input type="radio" name="radio1" /> This is a radio button<br />
									<input type="radio" name="radio2" /> This is another radio button
								</p>
								
								<p>
									<label>This is a drop down list</label>              
									<select name="dropdown" class="small-input">
										<option value="option1">Option 1</option>
										<option value="option2">Option 2</option>
										<option value="option3">Option 3</option>
										<option value="option4">Option 4</option>
									</select> 
								</p>
								
								<p>
									<label>Textarea with WYSIWYG</label>
									<textarea class="text-input textarea wysiwyg" id="textarea" name="textfield" cols="79" rows="15"></textarea>
								</p>
								
								<p>
									<input class="button" type="submit" value="Submit" />
								</p>
								
							</fieldset>
							
							<div class="clear"></div><!-- End .clear -->
							
						</form>
						
					</div> <!-- End #tab2 -->        
					
				</div> <!-- End .content-box-content -->
				
			</div> <!-- End .content-box -->
			
			
			<div class="clear"></div>
                        
                        <?php require_once ("footer.php"); ?>