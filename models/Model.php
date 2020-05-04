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

  protected function getAll($table, $obj){
    $this->getBdd();
    $var = [];
    $req = self::$_bdd->prepare('SELECT * FROM '.$table.' ORDER BY id desc');
    $req->execute();

    //on crée la variable data qui
    //va cobntenir les données
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
      // var contiendra les données sous forme d'objets
      $var[] = new $obj($data);
    }

    return $var;
    $req->closeCursor();


  }
    
  protected function getOne($table, $obj, $id)
  {
    $this->getBdd();
    $var = [];
    $req = self::$_bdd->prepare("SELECT id, author, title, chapo, content, DATE_FORMAT(date, '%d/%m/%Y à %Hh%i') AS date FROM " .$table. " WHERE id = ?");
    $req->execute(array($id));
    while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
      $var[] = new $obj($data);
    }

    return $var;
    $req->closeCursor();
  }


    protected function getUserInfo($user_id){
        $this->getBdd();
        $var = [];
        $req = self::$_bdd->prepare("SELECT * FROM users WHERE id='".$user_id."'");
        $req->execute();

        //on crée la variable data qui
        //va cobntenir les données
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            // var contiendra les données sous forme d'objets
            $var[] = new User($data);
        }

        return $var;
        $req->closeCursor();


    }

    //VERIFICATION DE LA CONNEXION
    protected function checkConnexion($email, $password)
    {
        $this->getBdd();
        $var = [];
        $req = self::$_bdd->prepare("SELECT * FROM users WHERE email='".$email."' AND password='".$password."'");
        $req->execute();

        //on crée la variable data qui
        //va cobntenir les données
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            // var contiendra les données sous forme d'objets
            $var[] = new Connexion($data);
        }

        return $var;
        $req->closeCursor();
    }


    //INSCRIPTION
    protected function new_user($email, $nom, $prenom, $password)
    {
        $this->getBdd();
        $var = [];
        $req = self::$_bdd->prepare("INSERT INTO users (email, prenom, nom, password) VALUES ('".$email."', '".$prenom."', '".$nom."', '".$password."')");
        $req->execute();

        return "true";
        $req->closeCursor();
    }




}

?>
