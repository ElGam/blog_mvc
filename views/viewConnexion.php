<div class="slider"></div><!-- slider -->

	<section class="blog-area section">
		<div class="container">
               <center>
                   <h2>Espace Connexion</h2>
                   <div class="form-group">
                       <form method="post" action="Connexion">
                           <?php if($connexion[0] == "retryForm")
                            {
                                echo "Identifiants introuvables<br>";
                                //Inscrivez vous
                            }
                            ?>
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" placeholder="Email" name="email" style="width:40%">
                           
                           <label for="password">Mot de passe:</label>
                           <input type="password" class="form-control" placeholder="Mot de passe" name="password" style="width:40%">

                    <input type="submit" value="OK">
                    </form>
                </center>
			<!-- <a class="load-more-btn" href="#"><b>LOAD MORE</b></a> -->

		</div><!-- container -->
	</section><!-- section -->
