<?php

/**
 *
 */
class Accueil
{
  private $_title; 
  private $_description;
  private $_nom_prenom;

  public function __construct(array $data){
    $this->hydrate($data);
  }

  //HYDRATATION
  public function hydrate(array $data){
    foreach ($data as $key => $value) {
      $method = 'set'.ucfirst($key);
      if (method_exists($this, $method)) {
        $this->$method($value);
      }
    }
  }

    
  //SETTERS
  public function setTitle($title)
  {
    if (is_string($title)) {
      $this->_title = $title;
    }
  }

   public function setDescription($description)
  {
    if (is_string($description)) {
      $this->_description = $description;
    }
  }

   public function setNom_prenom($nom_prenom)
  {
    if (is_string($nom_prenom)) {
      $this->_nom_prenom = $nom_prenom;
    }
  }
    

  //GETTERS
  public function title()
  {
    return $this->_title;
  }
    
  public function description()
  {
    return $this->_description;
  }



  public function nom_prenom()
  {
    return $this->_nom_prenom;
  }
}









 ?>
