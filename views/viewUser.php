<br><br>
<center>
    <h2><?= $title; ?></h2>
    <br>
    <br>
    
     <div class="container">
         <b><i><?= $form_msg; ?></b></i><br>
         
         <?php
         if($form == 1)
         {
        ?>
    <form method="post" action="User">
    <label for="email">Email:</label>
    <input type="email" class="form-control" placeholder="Email" name="email" style="width:40%" value="<?= $infos[0]->email() ?>">
         
    <label for="nom">Nom:</label>
    <input type="text" class="form-control" placeholder="Nom" name="nom" style="width:40%" value="<?= $infos[0]->nom() ?>">
         
    <label for="prenom">Prenom:</label>
    <input type="text" class="form-control" placeholder="Prenom" name="prenom" style="width:40%" value="<?= $infos[0]->prenom() ?>">
    
    <label for="password">Mot de passe:</label>
    <input type="password" class="form-control" placeholder="Mot de passe" name="password" style="width:40%" value="<?= $infos[0]->password() ?>">
    
    <label for="passwordConfirm">Mot de passe (confirmation) :</label>
    <input type="password" class="form-control" placeholder="Mot de passe (confirmation)" name="password_verif" style="width:40%" value="">
         
    <br>
    
    <input type="submit" class="form-control" style="width:40%" name="form_button" value="Sauvegarder">
    </form>
         <?php
         }
         ?>
         
         <?php
         if(isset($userInfos))
         {
        ?>
         
    <br><br>
         
         
           <table class="table table-striped">
      <tr>
         <th>Nom</th>
         <th>Prenom</th>
         <th>Email</th>
        <th>Supprimer</th>
      </tr>
<?php
           foreach ($userInfos as $userInfo):
            ?>
        <tr>
            <td><?= $userInfo->nom(); ?></td>
            <td><?= $userInfo->prenom(); ?></td>
            <td><?= $userInfo->email(); ?></td>
            <td><a href="user&id_del=<?= $userInfo->id(); ?>&del=1&admin=true">Supprimer</a></td>
        </tr>
         
         <?php
             endforeach;
         }
         ?>
    </table>
         
         
         
     
  </div>
</center>