 <div class="slider">
  <div class="display-table  center-text">
    <h1 class="title display-table-cell"><b><!-- --></b></h1>
  </div>
</div><!-- slider --><br><br>

<center>
                <h1><b><?=$post->title()?></b></h2>
                <h5><?=$post->author()?></h3> 
                <h6>Modifié le <?=$post->date()?></h4><br>
</center>
<div style="text-align: center;">        
<i>
                <?=$post->chapo()?>   
            </i><br>  <br>
              
            <div>
            
                <?=$post->content()?>
            </div>
    </div>    




<section class="comment">
    <center><br><br>
    <h4><b>Commentaires</b></h4>
          <form method="post">
    </form>
</center>
</section>
