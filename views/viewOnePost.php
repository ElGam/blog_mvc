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
        <?= nl2br($post->chapo()); ?>   
    </i><br>  <br>

    <div>

        <?= nl2br($post->content()); ?>
    </div>
</div>    




<section class="comment" style="background-color:whitesmoke">
    <center><br><br>
        <h4><b>Laisser un commentaire</b></h4>
        <form method="post" action="post&id=<?= $_GET['id']?> ">
            <label for="email">Auteur:</label>
            <?php
    if(isset($_SESSION['id']))
    {
        echo '<i>' .$_SESSION['nom'] . ' ' . $_SESSION['prenom']. '</i><br>';
            ?>

            <input type="hidden" name="auteur" value="<?= $_SESSION['nom'] . ' ' . $_SESSION['prenom'] ?>">
            <input type="hidden" name="auteur_id" value="<?= $_SESSION['id']; ?>">

            <?php
    }
        else
        {
            ?>
            <input type="text" class="form-control" placeholder="Auteur" name="auteur" style="width:40%">
            <input type="hidden" name="auteur_id" value="0">
            <?php
        }
            ?>


            <label for="contenu">Message:</label><br>
            <textarea name="contenu" placeholder="Entrez votre commentaire..." cols="40"></textarea><br><br>

            <input type="hidden" name="date" value="<?= date("Y-m-d H:i:s"); ?>">
            <input type="hidden" name="newComm" value="true">
            <input type="hidden" name="post_id" value="<?= $_GET['id']; ?>">

            <input type="submit" name="form_button" value="OK">
        </form><br></center>
        </section>

<section style="background-color:floralsmoke">
    <center>
        <h4><b>Commentaires</b></h4>
        <?php
        foreach ($commentaires as $commentaire):
        ?>

        <u><?= $commentaire->auteur(); ?></u><br>
        <?= $commentaire->contenu(); ?><br>
        Posté le <i><?= $commentaire->date(); ?></i><br><br>

        <?php
        endforeach
        ?>

    </center>
</section>

