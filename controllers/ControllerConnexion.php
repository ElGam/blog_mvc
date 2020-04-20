<?php
require_once 'views/View.php';


class ControllerConnexion

{
  private $_connexionManager;
  private $_view;
  private $_email;
  private $_password;
    
  public function __construct()
  {
    if (isset($url) && count($url) < 1) {
      throw new \Exception("Page Introuvable");
    }
    else {
      $this->connexion();
    }
  }

    
  private function connexion()
  {
    if(isset($_POST['email']) && isset($_POST['password'])) {
          $this->_connexionManager = new ConnexionManager;
          $this->_email = $_POST['email'];
          $this->_password = $_POST['password'];
          $connexion = $this->_connexionManager->check($this->_email, $this->_password);
          
          if(isset($connexion[0]))
          {
              $_SESSION['id'] = $connexion[0]->id(); 
              header("Location: Accueil");
          }
        
          if(!isset($connexion[0])){
            $this->connexionForm("retryForm");
          }
          else {
              $this->_view = new View('Connexion');
              $this->_view->generate(array('connexion' => $connexion));
          }
    }
      else if(isset($_GET['disconnect']))
              {
                  $this->deconnexion();
              }
      else
      {
          $this->connexionForm("firstForm");
      }

  }
    
    
    
    private function connexionForm($firstForm)
    {
      $this->_connexionManager = new ConnexionManager;
      $connexion[0] = $firstForm;
      $this->_view = new View('Connexion');
      $this->_view->generate(array('connexion' => $connexion));
    }
    
    private function deconnexion()
    {
      $this->_connexionManager = new ConnexionManager;
      $connexion[0] = "disconnect";
      session_destroy();
      $this->_view = new View('Deconnexion');
      $this->_view->generate(array('connexion' => $connexion));
    }
    
}

 ?>