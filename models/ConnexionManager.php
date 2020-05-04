<?php
/**
 *
 */
class ConnexionManager extends Model
{

  //gréer la fonction qui va recuperer
  //tous les articles dans la bdd
  public function check($email, $password){
    return $this->checkConnexion($email, $password);
  }
}
 ?>
