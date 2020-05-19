<?php

/**
 *
 */
class UserManager extends Model
{

  //gréer la fonction qui va recuperer
  //tous les articles dans la bdd
  public function getPosts($user_id){
    return $this->getAllUsersPost($user_id);
  }

 public function getInfos($user_id){
    return $this->getUserInfo($user_id);
  }
    
public function updateUser($email, $nom, $prenom, $password, $id){
    return $this->updateUserInfos($email, $nom, $prenom, $password, $id);
  }
    
}



 ?>
