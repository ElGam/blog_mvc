<?php
require_once 'views/View.php';

class ControllerCommentaire

{
    private $_view;
    private $_commentaireManager;

    public function __construct()
    {
        //PAGE RESERVEE AUX ADMINS
        if (isset($_SESSION['admin']) && $_SESSION['admin'] != "true" || !isset($_SESSION['id'])) {
            throw new \Exception("Page Introuvable");
        }
        else{
            $this->commentaire();
        }
    }

    private function commentaire()
    {
        $this->_commentaireManager = new CommentaireManager;
        
        //VALIDATION D'UN COMMENTAIRE
        if(isset($_GET['id']) && $_GET['del'] == 0)
        {
            $this->_commentaireManager->validAComm($_GET['id']);
        }
        //SUPPRESION D'UN COMMENTAIRE
        else if(isset($_GET['id']) && $_GET['del'] == 1)
        {
            $this->_commentaireManager->deleteAComm($_GET['id']);
        }
        $commentaires = $this->_commentaireManager->getAllCommToValid();
        $this->_view = new View('Commentaire');
        $this->_view->generate(array('commentaires' => $commentaires));
    }
}

?>
