<!DOCTYPE HTML>
<html lang="en">
<head>
	<title>Projet 5 - BLOG PHP</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8">


	<!-- Font -->

	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500" rel="stylesheet">


	<!-- Stylesheets -->

	<link href="public/common-css/bootstrap.css" rel="stylesheet">

	<link href="public/common-css/ionicons.css" rel="stylesheet">


	<link href="public/layout-1/css/styles.css" rel="stylesheet">

	<link href="public/layout-1/css/responsive.css" rel="stylesheet">

</head>
<body >

	<header>
		<div class="container-fluid position-relative no-side-padding">

			<a href="#" class="logo">MON BLOG</a>

			<div class="menu-nav-icon" data-nav-menu="#main-menu"><i class="ion-navicon"></i></div>

			<ul class="main-menu visible-on-click" id="main-menu">
				<li><a href="Accueil">Home</a></li>
			</ul><!-- main-menu -->

            
		</div><!-- conatiner -->
	</header>


  <?= $content ?>







	<footer>

		<div class="container">
			<div class="row">

				<div class="col-lg-4 col-md-6">
					<div class="footer-section">
						<p class="copyright">Tous droits réservés</p>
						
						<ul class="icons">
							<li><a href="#"><i class="ion-social-facebook-outline"></i></a></li>
							<li><a href="#"><i class="ion-social-twitter-outline"></i></a></li>
							<li><a href="#"><i class="ion-social-instagram-outline"></i></a></li>
							<li><a href="#"><i class="ion-social-vimeo-outline"></i></a></li>
							<li><a href="#"><i class="ion-social-pinterest-outline"></i></a></li>
						</ul>

					</div><!-- footer-section -->
				</div><!-- col-lg-4 col-md-6 -->
                
                
                <section id="contactez-nous"><center>
				<div class="col-lg-4 col-md-6" style="border:1px solid black;">
					<div class="footer-section2">

						<h4 class="title"><b>CONTACTEZ-NOUS</b></h4>
						<form>
                        <div class="input-area">
                                <input style="width:98%;" id="nom_prenom" placeholder="NOM et Prénom">
                        </div>
                        <div class="input-area">
                                <input style="width:98%;" id="email" type="email" placeholder="Entrez votre email">
                                
                        </div><br>
                            <input type="hidden" name="formulaire" value="true">
                                <textarea placeholder="Entrez votre message" id="message" class="form-group" cols="150" style="resize:none;width:98%" ></textarea>
								<button class="submit-btn" id="contactButton" type="button">Envoyer</button> <br>
							</form>
				

					</div><!-- footer-section -->
				</div><!-- col-lg-4 col-md-6 -->
</center></section>	
			</div><!-- row -->
		</div><!-- container -->
	</footer>


	<!-- SCIPTS -->

	<script src="public/common-js/jquery-3.1.1.min.js"></script>

	<script src="public/common-js/tether.min.js"></script>

	<script src="public/common-js/bootstrap.js"></script>

	<script src="public/common-js/scripts.js"></script>
    
<script>
//FONCTION DE VERIFICATION DE LA CONFORMITE DE L'EMAIL
function isEmail(email) {
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
  return regex.test(email);
}
 
//EVENEMENT: LORS DU CLIC SUR LE BOUTON DU FORMULAIRE DE CONTACT
$("#contactButton").click(function(){
    //RECUPERATION DES VALEURS DES CHAMPS
    var email = $('#email').val();
    var nom_prenom = $('#nom_prenom').val();
    var message = $('#message').val();

        //ON VERIFIE QUE L'EMAIL EST VALIDE 
        if(isEmail(email))
            {
                //L'EMAIL EST VALIDE
                console.log('Email valide');

                //ET QUE LA TAILLE DU MESSAGE EST COMPRISE ENTRE 50 ET 1500
                if(message.length > 50 && message.length < 1500 && nom_prenom.length > 5 && nom_prenom.length < 100)
                    {
                        //LE MESSAGE EST VALIDE
                        console.log("Message ou Nom et Prénom non valides !");
                        
                        //ENVOIE D'UNE REQUETE AJAX SUR LA PAGE PHP DE CONTACT AVEC LES VALEURS DES CHAMPS
                        $.get("contactezNous.php?nom_prenom=" +nom_prenom+ "&email=" +email+ "&message=" +message, function(data, status){
                        console.log("Data: " + data + "\nStatus: " + status);
                            
                        //SI LA PAGE RENVOIE TRUE (mail envoyé)
                        if(data == "true")
                        {
                            //ON INDIQUE A L'UTILISATEUR QUE LE MAIL EST ENVOYé
                            $('.footer-section2').html("<b>Message envoyé !</b>");
                        }
                        else{
                        //SINON ON LUI INDIQUE QU'IL Y A UNE ERREUR
                        $('#contactez-nous').html("<center><b>ERREUR</b></center>");
                    }
                    });
                    
                }
                else{
                    //MESSAGE NON VALIDE
                    console.log("Taille du message ou du nom-prénom non valide !");
                }
            }
            else{
                console.log("Email non valide");
            }
});
  
    </script>

</body>
</html>
