<?php

/**
 *
 */
class User
{

  private $_id;
  private $_nom; 
  private $_prenom;
  private $_email;
  private $_password;
  private $_admin;
  private $_redacteur;

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

  public function setNom($nom)
  {
    if (is_string($nom)) {
      $this->_nom = $nom;
    }
  }

   public function setPrenom($prenom)
  {
    if (is_string($prenom)) {
      $this->_prenom = $prenom;
    }
  }

    public function setEmail($email)
  {
    if (is_string($email)) {
      $this->_email = $email;
    }
  }
    
    public function setPassword($password)
  {
    if (is_string($password)) {
      $this->_password = $password;
    }
  }
    
     public function setAdmin($admin)
  {
    if (is_string($admin)) {
      $this->_admin = $admin;
    }
  }
    
         public function setRedacteur($redacteur)
  {
    if (is_string($redacteur)) {
      $this->_redacteur = $redacteur;
    }
  }


  //getters
  public function id()
  {
    return $this->_id;
  }

  public function prenom()
  {
    return $this->_prenom;
  }
    
  public function nom()
  {
    return $this->_nom;
  }
    
    public function email()
  {
    return $this->_email;
  }
    
      public function password()
  {
    return $this->_password;
  }
    
    public function admin()
  {
    return $this->_admin;
  }
    
    public function redacteur()
  {
    return $this->_redacteur;
  }
 
}












 ?>
