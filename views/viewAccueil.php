	<div class="slider" style="color:white"><br>
        <center>
            <img id="imgProfile" src="about.jpg" style="width:13%; border-radius: 8px;"><br>
            <i><?= $accueilInfos[0]->title(); ?>, <?= $accueilInfos[0]->nom_prenom(); ?></i><br>
            <h6><a href="CV_Delos.pdf">Mon CV Téléchargeable</a></h6>  
        </center>
    </div><!-- slider -->


	<section class="blog-area section">
       <center><?= $form_msg ?></center>
		<div class="container">

			<div class="row">
                
                <?php
        foreach ($posts as $post):
         ?>


				<div class="col-lg-4 col-md-6">
					<div class="card h-100">
						<div class="single-post post-style-1">

							<div class="blog-image"><img src="public/images/marion-michele-330691.jpg" alt="Blog Image"></div>

							<a class="avatar" href="#"><img src="public/images/icons8-team-355979.jpg" alt="Profile Image"></a>

							<div class="blog-info">
                                
								<h4 class="title"><a href="post&id=<?= $post->id() ?>"><b><?= $post->title() ?></b></a></h4>

								<h5><?= $post->chapo() ?></h5>
                                <br>
                                <h6><?= $post->author()?></h6>
                                <h6>Modifié le <?= $post->date()?></h6>
							</div><!-- blog-info -->
						</div><!-- single-post -->
					</div><!-- card -->
				</div><!-- col-lg-4 col-md-6 -->

        <?php endforeach ?>
        
            </div><!-- row -->

		</div><!-- container -->
	</section><!-- section -->
