<div class="slider"></div><!-- slider -->

<section class="blog-area section">
    <div class="container">
        <center>
            <h2>Espace Inscription</h2>
            <div class="form-group">
                <form method="post" action="Inscription">
                    <?php 

                    //AFFICHAGE DU MESSAGE
                    echo "<br>".$return_msg. "<br>";

                    //AFFICHAGE DU FORMULAIRE SI L'INSCRIPTION N'A PAS ETE ENCORE EFFECTUEE
                    if($form != "0")
                    {
                    ?>

                    <label for="email">Email:</label>
                    <input type="email" class="form-control" placeholder="Email" name="email" style="width:40%">

                    <label for="email">Nom:</label>
                    <input type="text" class="form-control" placeholder="NOM" name="nom" style="width:40%">

                    <label for="email">Prénom:</label>
                    <input type="text" class="form-control" placeholder="Prénom" name="prenom" style="width:40%">

                    <label for="password">Mot de passe:</label>
                    <input type="password" class="form-control" placeholder="Mot de passe" name="password" style="width:40%">

                    <label for="password">Mot de passe (vérification):</label>
                    <input type="password" class="form-control" placeholder="Mot de passe" name="password_verif" style="width:40%">

                    <input type="submit" name="form_button" value="OK">
                </form>
                <?php
                    }
                ?>

                </center>
            <!-- <a class="load-more-btn" href="#"><b>LOAD MORE</b></a> -->

            </div><!-- container -->
        </section><!-- section -->
