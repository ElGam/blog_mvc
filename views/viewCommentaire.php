<div class="slider">
    <div class="display-table  center-text">
        <h1 class="title display-table-cell"><b><!-- --></b></h1>
    </div>
</div><!-- slider --><br><br>


	<section class="blog-area section">
		<div class="container">
            <center>
                
              <h4><b>Commentaires</b></h4><br>
        <table border="1">
        <tr>
         <th>Auteur</th>
         <th>Contenu</th>
         <th>Date</th>
            <th>Id. Post</th>
            <th>Valider</th>
            <th>Refuser</th>
        </tr>
         <?php
           foreach ($commentaires as $commentaire):
            ?>
        <tr>
            <td><?= $commentaire->auteur(); ?></td>
            <td><?= $commentaire->contenu(); ?></td>
            <td><?= $commentaire->date(); ?></td>
            <td align="center"><a href="post&id=<?= $commentaire->post_id(); ?>"><?= $commentaire->post_id(); ?></a></td>
            <td><a href="commentaire&id=<?= $commentaire->id(); ?>&del=0">Valider</a></td>
            <td><a href="commentaire&id=<?= $commentaire->id(); ?>&del=1">Refuser</a></td>
        </tr>
         
         <?php
             endforeach;
         ?>
                </table>
                </center>
		</div><!-- container -->
	</section><!-- section -->
