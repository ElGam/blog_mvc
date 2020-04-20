<?php
require_once 'views/View.php';

class ControllerUser

{
   private $_userManager;
   private $_view;
    
  public function __construct()
  {
    if (isset($url) && count($url) < 1) {
      throw new \Exception("Page Introuvable");
    }
    else {
       $this->userPage();
    }
  }
    
    
    private function userPage()
    {
        $this->_userManager = new UserManager;
        $infos = $this->_userManager->getInfos($_SESSION['id']);
        $this->_view = new View('User');
        $this->_view->generate(array('infos' => $infos));
    }


}

 ?>
