<br><br>
<center>
    <h2>Mon Profil</h2>
    <br>
    <br>
    
     <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" class="form-control" placeholder="Email" id="email" style="width:40%" value="<?= $infos[0]->email() ?>">
         
    <label for="nom">Nom:</label>
    <input type="text" class="form-control" placeholder="Nom" id="nom" style="width:40%" value="<?= $infos[0]->nom() ?>">
         
    <label for="prenom">Prenom:</label>
    <input type="text" class="form-control" placeholder="Prenom" id="prenom" style="width:40%" value="<?= $infos[0]->prenom() ?>">
    
    <label for="password">Mot de passe:</label>
    <input type="password" class="form-control" placeholder="Mot de passe" id="password" style="width:40%" value="<?= $infos[0]->password() ?>">
    
    <label for="passwordConfirm">Mot de passe (confirmation) :</label>
    <input type="password" class="form-control" placeholder="Mot de passe (confirmation)" id="passwordConfirm" style="width:40%" value="">
         
    <br>
    
    <input type="submit" class="form-control" style="width:40%" value="Sauvegarder">
         
    
     
  </div>
</center>