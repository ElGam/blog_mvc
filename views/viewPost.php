	<section class="blog-area section">
		<div class="container">
            

<center>
    <h2><?= $title; ?></h2>
    <br>
    <br>
    
     <div class="form-group">
         <b><i><?= $form_msg; ?></b></i><br>
             
         <?php
         if(isset($postInfos))
         {
        ?>
         
    <br><br><table class="table table-striped">
      <tr>
         <th>Nom</th>
         <th>Auteur</th>
         <th>Date</th>
         <th>Modifier</th>
         <th>Supprimer</th>
      </tr>
      <?php
           foreach ($postInfos as $postInfo):
            ?>
        <tr>
            <td><?= $postInfo->title(); ?></td>
            <td><?= $postInfo->author(); ?></td>
            <td><?= $postInfo->date(); ?></td>
            <td><a href="post&id=<?= $postInfo->id(); ?>&update=true">Modifier</a></td>
            <td><a href="post&id_del=<?= $postInfo->id(); ?>&del=1&admin=true">Supprimer</a></td>
        </tr>
         
         <?php
             endforeach;
         }
         ?>
    </table>
    
     
  </div>
</center>
        </div>
</section>