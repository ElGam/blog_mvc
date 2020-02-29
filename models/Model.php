<?php

abstract class Model
{

  private static $_bdd;

  //CONNEXION BDD
  private static function setBdd(){
    self::$_bdd = new PDO('mysql:host=localhost;dbname=blog_mvc;charset=utf8', 'root', '');

    //GESTION DES ERREURS AVEC CONSTANTES PDO
    self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
  }

  //FONCTION DE CONNEXION BDD
  protected function getBdd(){
    if (self::$_bdd == null) {
      self::setBdd();
      return self::$_bdd;
    }
  }

    
  //CREATION DE LA METHODE
  //DE RECUPERATION DES INFOS DE LA PAGE D'ACCUEIL
  protected function getAccueil($table, $obj){
    $this->getBdd();
    $var = [];
    $req = self::$_bdd->prepare('SELECT * FROM '.$table);
    $req->execute();
    //CREATION DE LA VARIABLE
    //QUI VA CONTENIR LES DONNEES
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
      //VAR CONTIENDRA LES DONNEES SOUS FORME D'OBJET
      $var[] = new $obj($data);
    }
    return $var;
    $req->closeCursor();
  } 
   
}










 ?>
