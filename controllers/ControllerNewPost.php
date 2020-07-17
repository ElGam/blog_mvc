<?php
require_once 'views/View.php';

class ControllerNewPost
{
    private $_postManager;
    private $_view;

    public function __construct()
    {
        if (isset($url) && count($url) < 1 || $_SESSION['redacteur'] != "true") {
            throw new \Exception("Page Introuvable");
        }
        else if($_SESSION['redacteur'] == "true"){
            $this->newPost();
        }
    }

    private function newPost()
    {
        $return_msg = "Remplissez le formulaire";
        $form = 1;
        
        //VERIFICATION DE LA SOUMISSION DU FORMULAIRE
        if(isset($_POST['create']))
        {
            
            //VERIFICATION : TITRE
            if(isset($_POST['title']) && strlen($_POST['title']) > 5 && strlen($_POST['title']) < 75)
            {
                $title = htmlspecialchars($_POST['title']);
                
                //VERIFICATION : CHAPO
                if(isset($_POST['chapo']) && strlen($_POST['chapo']) > 20 && strlen($_POST['chapo']) < 1000)
                {
                    $chapo = htmlspecialchars($_POST['chapo']);
                    
                    //VERIFICATION : CONTENU
                    if(isset($_POST['content']) && strlen($_POST['content']) > 100 && strlen($_POST['content']) < 50000)
                    {
                        $content = htmlspecialchars($_POST['content']);
                        $date = $_POST['date'];
                        $return_msg = "Le nouveau post a bien été envoyé !";
                        $form = 0;
                    }
                    else
                    {
                        $return_msg = "Le contenu n'est pas renseigné/valide !";
                        $form = 1;
                    }
                }
                else
                {
                    $return_msg = "Le chapô n'est pas renseigné/valide !";
                    $form = 1;
                }
            }
            else
            {
                $return_msg = "Le titre n'est pas renseigné/valide !";
                $form = 1;
            }
            
            
            $this->_postManager = new PostManager;
            
            //CREATION DU POST
            if($form == 0)
            {
                 
                 $this->_postManager->newPost($title, $chapo, $content, $date, $_SESSION['id'], $_SESSION['nom'] . ' ' . $_SESSION['prenom']);
                 $this->_view = new View('NewPost');
                 $this->_view->generate(array('return_msg' => $return_msg, 'form' => $form));
            }
            //AFFICHAGE DU FORMULAIRE
            else if($form ==1)
            {
                  $this->_view = new View('NewPost');
                  $this->_view->generate(array('return_msg' => $return_msg, 'form' => $form));
            }
            
        }
        //AFFICHAGE DU FORMULAIRE
        else
        {
            $this->_postManager = new PostManager;
            $this->_view = new View('NewPost');
            $this->_view->generate(array('return_msg' => $return_msg, 'form' => $form));
        }

    }
}

?>
