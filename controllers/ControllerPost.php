<?php
require_once 'views/View.php';

class ControllerPost
{
    private $_postManager;
    private $_view;
    private $_commentaireManager;

    public function __construct()
    {
            if(isset($_GET['admin']) && $_SESSION['redacteur'] == "true")
            {
                $this->listPost();
            }
            else if(isset($_GET['update']) && $_SESSION['redacteur'] == "true")
            {
                $this->updatePost();
            }
            else if(isset($_GET['view']))
            {
                $this->post();
            }
            else
            {
                throw new \Exception("Page Introuvable");
            }
    }

    private function post()
    {
        //AFFICHAGE D'UN POST SEUL
        $this->_commentaireManager = new CommentaireManager;
        $this->_postManager = new PostManager;
        $commPosted = false;

        //SI : POSTER UN COMMENTAIRE
        if(isset($_POST['newComm']))
        {
            $this->_commentaireManager->newComm($_POST['auteur'], $_POST['post_id'], $_POST['contenu'], $_POST['date'], $_POST['auteur_id'], 'En Attente');
            $commPosted = true;
        }

        //RECUPERATION ET AFFICHAGE DU POST ET DE SES COMMENTAIRES
        $commentaires = $this->_commentaireManager->getComm($_GET['id']);
        $post = $this->_postManager->getPost($_GET['id']);
        $this->_view = new View('OnePost');
        $this->_view->generate(array('post' => $post, 'commentaires' => $commentaires, 'commPosted' => $commPosted));
    }


    private function listPost()
    {
        //LISTE DES POSTS : ADMINS
        $this->_postManager = new postManager;

        //SI : SUPPRESSION D'UN POST
        if(isset($_GET['id_del']) && $_GET['del'] == 1)
        {
            $this->_postManager->deleteAPost($_GET['id_del']);
        }

        $postInfos = $this->_postManager->getAllPostsInfo();
        $this->_view = new View('Post');
        $this->_view->generate(array('postInfos' => $postInfos, 'form_msg' => 'Liste Posts', 'form' => '0', 'title' => 'Espace Admin')); 
    }
    
    private function updatePost()
    {
        //AFFICHAGE D'UN POST SEUL
        //$this->_commentaireManager = new CommentaireManager;
        $this->_postManager = new PostManager;
        $form = 1;
        //SI : POSTER UN COMMENTAIRE
        if(isset($_POST['updatePost']))
        {
            $chapo = htmlentities(htmlspecialchars($_POST['chapo']));
            $title = htmlentities(htmlspecialchars($_POST['title']));
            $content = htmlentities(htmlspecialchars($_POST['content']));
            $content = str_replace("'", "&#39", $content);
            $content = str_replace("’", "&#39", $content);
            
            //var_dump($content);
            $date = htmlspecialchars($_POST['date']);
            $this->_postManager->updatePost($_GET['id'], $chapo, $content, $date, $title);
        }

        //RECUPERATION ET AFFICHAGE DU POST ET DE SES COMMENTAIRES
        //$commentaires = $this->_commentaireManager->getComm($_GET['id']);
        $post = $this->_postManager->getPost($_GET['id']);
        $this->_view = new View('UpdatePost');
        $this->_view->generate(array('post' => $post, 'form' => $form)); 
    }
    
}
?>
