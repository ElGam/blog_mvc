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
        extract($_POST);
        extract($_GET);
        $return_msg = "Remplissez le formulaire";
        $form = 1;
        
        //VERIFICATION DE LA SOUMISSION DU FORMULAIRE
        if(isset($create))
        {
            
            //VERIFICATION : TITRE
            if(isset($title) && strlen($title) > 5 && strlen($title) < 75)
            {
                $title = htmlspecialchars($title);
                
                //VERIFICATION : CHAPO
                if(isset($chapo) && strlen($chapo) > 20 && strlen($chapo) < 1000)
                {
                    $chapo = htmlspecialchars($chapo);
                    
                    //VERIFICATION : CONTENU
                    if(isset($content) && strlen($content) > 100 && strlen($content) < 50000)
                    {
                        $content = htmlspecialchars($content);
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
                 $content = htmlentities(htmlspecialchars($content));
                 $content = str_replace("'", "\'", $content);
                 $content = str_replace("’", "\'", $content);
                 $content = str_replace('"', '&#34', $content);
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
