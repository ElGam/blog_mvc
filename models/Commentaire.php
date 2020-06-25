<?php

/**
 *
 */
class Commentaire
{

  private $_id;
  private $_auteur;
  private $_auteur_id;
  private $_contenu;
  private $_date;
  private $_post_id;
  

  public function __construct(array $data){
    $this->hydrate($data);
  }

  //hdratation
  public function hydrate(array $data){
    foreach ($data as $key => $value) {
      $method = 'set'.ucfirst($key);
      if (method_exists($this, $method)) {
        $this->$method($value);
      }
    }
  }

  //setters

  public function setId($id)
  {
    $id = (int) $id;
    if ($id > 0) {
      $this->_id = $id;
    }
  }

  public function setAuteur($auteur)
  {
    if (is_string($auteur)) {
      $this->_auteur = $auteur;
    }
  }

   public function setAuteur_id($auteur_id)
  {
    if (is_string($auteur_id)) {
      $this->_auteur_id = $auteur_id;
    }
  }

   public function setContenu($contenu)
  {
    if (is_string($contenu)) {
      $this->_contenu = $contenu;
    }
  }

  public function setDate($date)
  {
      $this->_date = $date;

  }
    
      public function setStatut($statut)
  {
      $this->_statut = $statut;

  }
    
         public function setPost_id($post_id)
  {
      $this->_post_id = $post_id;

  }

  //getters
  public function id()
  {
    return $this->_id;
  }

  public function auteur()
  {
    return $this->_auteur;
  }
    
  public function auteur_id()
  {
    return $this->_auteur_id;
  }
    
  public function contenu()
  {
    return $this->_contenu;
  }
    
  public function date()
  {
    return $this->_date;
  }

      public function post_id()
  {
    return $this->_post_id;
  }
    
  public function statut()
  {
    return $this->_statut;
  }



}












 ?>
