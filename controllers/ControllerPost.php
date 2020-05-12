<?php
require_once 'views/View.php';

class ControllerPost

{
  private $_postManager;
  private $_view;

  public function __construct()
  {
    if (isset($url) && count($url) < 1) {
      throw new \Exception("Page Introuvable");
    }
    else {
      $this->post();
    }
  }

  private function post()
  {
    if (isset($_GET['id'])) {
      $this->_postManager = new PostManager;
      $post = $this->_postManager->getPost($_GET['id']);
      $this->_view = new View('OnePost');
      $this->_view->generate(array('post' => $post));
    }

  }
}

 ?>
