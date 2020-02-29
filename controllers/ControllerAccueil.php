<?php
require_once 'views/View.php';
/**
 *
 */
class ControllerAccueil
{
  private $_accueilManager;
  private $_view;

  public function __construct()
  {
    if (isset($url) && count($url) > 1) {
      throw new \Exception("Page introuvable", 1);

    }
    else {
    $this->_accueilManager = new AccueilManager();
    $accueilInfos = $this->_accueilManager->getAccueilInfos();
    $this->_view = new View('Accueil');
    $this->_view->generate(array('accueilInfos' => $accueilInfos));
    }
  }

  /*private function articles(){
    $this->_postManager = new PostManager();
    $posts = $this->_postManager->getPosts();
    $this->_view = new View('Accueil');
    $this->_view->generate(array('posts' => $posts));
    $this->_view = new View('Accueil');
  }*/
}














 ?>
