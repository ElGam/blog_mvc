<div class="slider">
    <div class="display-table  center-text">
        <h1 class="title display-table-cell"><b><!-- --></b></h1>
    </div>
</div><!-- slider --><br><br>


<center>
<section style="width:80%">

    <h1><b><?=$post->title()?></b></h2>
    <h5><?=$post->author()?></h3> 
    <h6>Modifié le <?=$post->date()?></h4><br>

<div style="text-align: center;">        
    <i>
        <?= nl2br($post->chapo()); ?>   
    </i><br>  <br>

    <div>

        <?= nl2br($post->content()); ?>
    </div>
</div> 
    
    

                   <h2>Modifier Post</h2>
                   <div class="form-group">
                       <form method="post" action="Post&update=1&id=<?= $_GET['id']?>">
                           <?php if($form == 1)
                            {
                                                            
                            ?>
                            <label for="title">Titre:</label>
                            <input type="text" class="form-control" placeholder="Titre du Post" value="<?=$post->title()?>" name="title" style="width:40%"><br>
                           
                           <label for="chapo">Chapô:</label>
                           <textarea name="chapo" class="form-control" style="width:65%"><?= $post->chapo(); ?></textarea><br>
                           
                           <label for="content">Contenu:</label>
                           <textarea name="content" class="form-control" style="width:75%"><?= $post->content(); ?></textarea><br>
                           
                           <input type="hidden" name="date" value="<?= date("Y-m-d H:i:s"); ?>">
                           <input type="hidden" name="updatePost" value="true">

                           <input type="submit" value="OK">
                           <?php
    
}
                           ?>
                    </form>        
        
</section>
</center>


