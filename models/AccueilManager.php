<?php
/**
 *
 */
class AccueilManager extends Model
{
  //FONCTION QUI PERMET DE RECUPERER TOUTES LES INFOS DANS LA BDD
  //tous les articles dans la bdd
  public function getAccueilInfos(){
    return $this->getAccueil('accueil', 'Accueil');
  }
}
 ?>
