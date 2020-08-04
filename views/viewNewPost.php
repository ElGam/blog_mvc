<div class="slider"></div><!-- slider -->

	<section class="blog-area section">
		<div class="container">
               <center>
                   <h2>Nouveau Post</h2>
                   <div class="form-group">
                       <?= $return_msg. "<br>"; ?>
                       <form method="post" action="NewPost">
                           <?php if($form == 1)
                            {
                                                            
                            ?>
                            <label for="title">Titre:</label>
                            <input type="text" class="form-control" placeholder="Titre du Post" name="title" style="width:40%"><br>
                           
                           <label for="chapo">Chapô:</label>
                           <textarea name="chapo" class="form-control" style="width:65%" rows="15"></textarea><br>
                           
                           <label for="content">Contenu:</label>
                           <textarea name="content" class="form-control" style="width:75%" rows="25"></textarea><br>
                           
                           <input type="hidden" name="date" value="<?= date("Y-m-d H:i:s"); ?>">
                           <input type="hidden" name="create" value="true">

                    <input type="submit" value="OK">
                           <?php
    
}
                           ?>
                    </form>
                </center>
			<!-- <a class="load-more-btn" href="#"><b>LOAD MORE</b></a> -->

		</div><!-- container -->
	</section><!-- section -->