// Fonctions javascript de validation de formulaires
// Fonctionne avec jquery



// Fonction qui vérifie si le paramètre est une date qui existe
function isDate(txtDate)
{
    
    var currVal = txtDate;
    if(currVal == '')
      return false;

    //Declare Regex  
    var rxDatePattern = /^(\d{1,2})(\/|-)(\d{1,2})(\/|-)(\d{4})$/; 
    var dtArray = currVal.match(rxDatePattern); // is format OK?

    if (dtArray == null)
       return false;

    //Checks for dd/mm/yyyy format.
    dtDay = dtArray[1];
    dtMonth= dtArray[3];
    dtYear = dtArray[5];   

    if (dtMonth < 1 || dtMonth > 12)
        return false;
    else if (dtDay < 1 || dtDay> 31)
        return false;
    else if ((dtMonth==4 || dtMonth==6 || dtMonth==9 || dtMonth==11) && dtDay ==31)
        return false;
    else if (dtMonth == 2)
    {
       var isleap = (dtYear % 4 == 0 && (dtYear % 100 != 0 || dtYear % 400 == 0));
       if (dtDay> 29 || (dtDay ==29 && !isleap))
            return false;
    }
    return true;
}


// Fonction qui vérifie si un mail est valide 
function mailValide(mail)

{
	var reg = new RegExp('^[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*@[a-z0-9]+([_|\.|-]{1}[a-z0-9]+)*[\.]{1}[a-z]{2,6}$', 'i');

	if(reg.test(mail))
	{
		return(true);
	}
	else
	{
		return(false);
	}
}





// Lorsque la page est chargée
$(document).ready(function() {
    
    
    
    
    // Calcul du nombre de caractères restant pour résumé
     $('#resume').keyup(function() {
        var nombreCaractere = $(this).val().length;
         var msg = ' ' + nombreCaractere + ' Caractere(s) / 500';
         $('#compteur').text(msg);
     })
    
    
    
    
    
    // Vérification du formulaire d'ajout et de modification de stage et d'offre de stage avant envoi des données
    $("#myform").bind('submit', function(){
        var bReturn = true;
        
        
        // Vérification de theme
        $("#theme").css({border: ''});
        $('label[for="theme"]').css({color: ''});
        if ( jQuery.trim($("#theme").val()).length < 1 || jQuery.trim($("#theme").val()).length > 50 ) {
            $("#theme").css({border: '1px solid red'});
            $('label[for="theme"]').css({color: 'red'});           
            bReturn = false;
        }
        
        // Vérification de date_deb
        $("#date_deb").css({border: ''});
        $('label[for="date_deb"]').css({color: ''});
        if (!isDate(jQuery.trim($("#date_deb").val()))) {
            $("#date_deb").css({border: '1px solid red'});
            $('label[for="date_deb"]').css({color: 'red'});           
            bReturn = false;
        }
        
        // Vérification de date_fin
        $("#date_fin").css({border: ''});
        $('label[for="date_fin"]').css({color: ''});
        if (!isDate(jQuery.trim($("#date_fin").val()))) {
            $("#date_fin").css({border: '1px solid red'});
            $('label[for="date_fin"]').css({color: 'red'});           
            bReturn = false;
        }
        
        // Vérification de mail_contact
        $("#mail_contact").css({border: ''});
        $('label[for="mail_contact"]').css({color: ''});
        if (!mailValide(jQuery.trim($("#mail_contact").val())) || jQuery.trim($("#mail_contact").val()) > 30) {
            $("#mail_contact").css({border: '1px solid red'});
            $('label[for="mail_contact"]').css({color: 'red'});           
            bReturn = false;
        }
        
        // Vérification de num_contact
        $("#num_contact").css({border: ''});
        $('label[for="num_contact"]').css({color: ''});
        if ( jQuery.trim($("#num_contact").val()).length < 1 || jQuery.trim($("#num_contact").val()).length > 30 ) {
            $("#num_contact").css({border: '1px solid red'});
            $('label[for="num_contact"]').css({color: 'red'});           
            bReturn = false;
        }
        
        // Vérification de resume
        $("#resumeIFrame").css({border: ''});
        $('label[for="resume"]').css({color: ''});
        if ( jQuery.trim($("#resume").val()).length < 1 || jQuery.trim($("#resume").val()).length > 500 ) {
            $("#resumeIFrame").css({border: '1px solid red'});
            $('label[for="resume"]').css({color: 'red'});           
            bReturn = false;
        }
   
        
        // Vérification de id_ent
        $("#id_ent").css({border: ''});
        $('label[for="id_ent"]').css({color: ''});
        if ( jQuery.trim($("#id_ent").val()).length < 1 || isNaN(jQuery.trim($("#id_ent").val()))) {
            $("#id_ent").css({border: '1px solid red'});
            $('label[for="id_ent"]').css({color: 'red'});           
            bReturn = false;
        }
        
         // Vérification de statut
        $("#statut").css({border: ''});
        $('label[for="statut"]').css({color: ''});
        if ( jQuery.trim($("#statut").val()).length < 1 ||  jQuery.trim($("#statut").val()) == "vide" ) {
            $("#statut").css({border: '1px solid red'});
            $('label[for="statut"]').css({color: 'red'});           
            bReturn = false;
        }




        if(!bReturn){
            $("#submit").parent("p").after('<div class="notification error png_bg"><div>Une ou plusieurs informations sont incorrectes.</div></div>');
        }

        return bReturn;
    });
    
    
    
     
    
    
    
    
     // Vérification du formulaire d'ajout d'entreprise avant envoi des données
    $("#forment").bind('submit', function(){
        var bReturn = true;

    
        // Vérification du nom de l'entreprise
        $("#nom").css({border: ''});
        $('label[for="nom"]').css({color: ''});
        if ( jQuery.trim($("#nom").val()).length < 1 || jQuery.trim($("#nom").val()).length > 30 ) {
            $("#nom").css({border: '1px solid red'});
            $('label[for="nom"]').css({color: 'red'});           
            bReturn = false;
        }
        
  
        // Vérification du secteur d'activité
        $("#sect_act").css({border: ''});
        $('label[for="sect_act"]').css({color: ''});
        if ( jQuery.trim($("#sect_act").val()) == "Choisissez ..." || jQuery.trim($("#sect_act").val()).length < 1 || jQuery.trim($("#sect_act").val()).length > 30 ) {
            $("#sect_act").css({border: '1px solid red'});
            $('label[for="sect_act"]').css({color: 'red'});           
            bReturn = false;
        }
           
        // Vérification de l'adresse
        $("#adr").css({border: ''});
        $('label[for="adr"]').css({color: ''});
        if ( jQuery.trim($("#adr").val()).length < 1 || jQuery.trim($("#adr").val()).length > 50 ) {
            $("#adr").css({border: '1px solid red'});
            $('label[for="adr"]').css({color: 'red'});           
            bReturn = false;
        }
        
        // Vérification de la ville
        $("#ville").css({border: ''});
        $('label[for="ville"]').css({color: ''});
        if ( jQuery.trim($("#ville").val()).length < 1 || jQuery.trim($("#ville").val()).length > 30 ) {
            $("#ville").css({border: '1px solid red'});
            $('label[for="ville"]').css({color: 'red'});           
            bReturn = false;
        }
        
        // Vérification du code postal
        $("#cp").css({border: ''});
        $('label[for="cp"]').css({color: ''});
        if ( isNaN(jQuery.trim($("#cp").val()))|| jQuery.trim($("#cp").val()).length < 5 ) {
            $("#cp").css({border: '1px solid red'});
            $('label[for="cp"]').css({color: 'red'});           
            bReturn = false;
        }
        
        // Vérification du pays
        $("#pays").css({border: ''});
        $('label[for="pays"]').css({color: ''});
        if ( jQuery.trim($("#pays").val()).length < 1 || jQuery.trim($("#pays").val()).length > 30 ) {
            $("#pays").css({border: '1px solid red'});
            $('label[for="pays"]').css({color: 'red'});           
            bReturn = false;
        }


        if(!bReturn){
            $("#submit").parent("p").after('<div class="notification error png_bg"><div>Une ou plusieurs informations sont incorrectes.</div></div>');
        }

        return bReturn;
        
    });
     

    
    
});