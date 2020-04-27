<?php
/**
 *
 */
class InscriptionManager extends Model
{
  //FONCTION D'INSCRIPTION
  public function inscription($email, $nom, $prenom, $password){
    return $this->new_user($email, $nom, $prenom, $password);
  }
}
 ?>
