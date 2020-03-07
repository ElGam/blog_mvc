	<div class="slider"><br><br><br><br>
        <center>
            <h1><?= $accueilInfos[0]->title(); ?></h1>
            <h4><i>Par <?= $accueilInfos[0]->nom_prenom(); ?>, créateur d'innovations digitales !<br></i></h4>
            <h6><a href="CV_Delos.pdf">Mon CV Téléchargeable</a></h6>
        
        </center>

    </div><!-- slider -->

	<section class="blog-area section">
        <?= $accueilInfos[0]->description(); ?><br>
        <img src="avatar.jpg" style="width:40%">
		<div class="container">

			<div class="row">

        
            </div><!-- row -->

		</div><!-- container -->
	</section><!-- section -->
