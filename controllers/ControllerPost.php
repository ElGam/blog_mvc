<?php
require_once 'views/View.php';

class ControllerPost

{
    private $_postManager;
    private $_view;
    private $_commentaireManager;

    public function __construct()
    {
        if (!isset($_GET['id']) || isset($url) && count($url) < 1) {
            throw new \Exception("Page Introuvable");
        }
        else{
            $this->post();
        }
    }

    private function post()
    {

        $this->_commentaireManager = new CommentaireManager;
        $this->_postManager = new PostManager;

        if(isset($_POST['newComm']))
        {
            $this->_commentaireManager->newComm($_POST['auteur'], $_POST['post_id'], $_POST['contenu'], $_POST['date'], $_POST['auteur_id'], 'En Attente');
        }

        $commentaires = $this->_commentaireManager->getComm($_GET['id']);
        $post = $this->_postManager->getPost($_GET['id']);
        $this->_view = new View('OnePost');
        $this->_view->generate(array('post' => $post, 'commentaires' => $commentaires));

    }
}

?>
