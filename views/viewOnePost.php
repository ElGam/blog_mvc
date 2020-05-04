 <div class="slider">
  <div class="display-table  center-text">
    <h1 class="title display-table-cell"><b><!-- --></b></h1>
  </div>
</div><!-- slider --><br><br>

<center>
                <h1><b><?=$post[0]->title()?></b></h2>
                <h5><?=$post[0]->author()?></h3> 
                <h6>Modifié le <?=$post[0]->date()?></h4><br>
</center>
<div style="text-align: center;">        
<i>
                <?=$post[0]->chapo()?>   
            </i><br>  <br>
              
            <div>
            
                <?=$post[0]->content()?>
            </div>
    </div>    




<section class="comment">
    <center><br><br>
    <h4><b>Commentaires</b></h4>
          <form method="post">
    </form>
</center>
</section>
