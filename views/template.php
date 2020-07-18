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
                <?php if(isset($_SESSION['id']))
                {
                 ?>
                	<li><a href="User">Mon Profil</a></li>
                
                <?php
                if($_SESSION['admin'] == "true")
                {
                ?>
                  	<li><a href="user&admin=true">Liste Users</a></li>  
                  	<li><a href="commentaire">Commentaires</a></li>
                <?php
                }
    ?>
                <?php
                if($_SESSION['redacteur'] == "true")
                {
                ?>
                	<li><a href="newPost">Nouveau Post</a></li>
                	<li><a href="post&admin=true">Liste Posts</a></li>
                <?php  
                }
                ?>
                	<li><a href="connexion&disconnect=true">Déconnexion</a></li>
                <?php
                }
                else
                {
                ?>
                	<li><a href="Connexion">Connexion</a></li>
                	<li><a href="Inscription">Inscription</a></li>
                <?php
                }
                ?>
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
                
                
<div class="col-lg-4 col-md-6">
					<div class="footer-section">

						<h4 class="title"><b>Contactez-Nous</b></h4>
						<form method="post" action="Accueil">
							
								<input class="text-input" name="nom_prenom" type="text" placeholder="NOM et Prénom"><br><br>
							
								<input class="email-input" name="email" type="text" placeholder="E-mail"><br><br>
							
                            <textarea name="message" placeholder="Message..." cols="40"></textarea><br><br>
                            <button class="submit-btn" type="submit" name="form_button">Envoyer</button>
                        </form>

					</div><!-- footer-section -->
				</div><!-- col-lg-4 col-md-6 -->

			</div><!-- row -->
		</div><!-- container -->
	</footer>


	<!-- SCIPTS -->

	<script src="public/common-js/jquery-3.1.1.min.js"></script>

	<script src="public/common-js/tether.min.js"></script>

	<script src="public/common-js/bootstrap.js"></script>

	<script src="public/common-js/scripts.js"></script>

</body>
</html>
