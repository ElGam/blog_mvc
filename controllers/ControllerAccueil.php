<?php
require_once 'views/View.php';
/**
     *
     */
class ControllerAccueil
{
    private $_accueilManager;
    private $_postManager;
    private $_view;

    public function __construct()
    {
        if (isset($url) && count($url) > 1) {
            throw new \Exception("Page introuvable", 1);

        }
        else {

            $this->accueil();

        }
    }
    
    private function accueil()
    {
        
            //FORMULAIRE DE CONTACT
            if(isset($_POST['form_button']))
            {
                if(isset($_POST['nom_prenom']) && strlen($_POST['nom_prenom']) > 5 && strlen($_POST['nom_prenom']) < 100 )
                {
                    $nom_prenom = htmlspecialchars($_POST['nom_prenom']); 

                    if(isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
                    {
                        $email = htmlspecialchars($_POST['email']);

                        if(isset($_POST['message']) && strlen($_POST['message']) > 20 && strlen($_POST['message']) < 2000)
                        {
                            $message = htmlspecialchars($_POST['message']);

                            //ENVOI DU MAIL

                            $return_msg = "Le message a bien été envoyé !";
                        }
                        else
                        {
                            $return_msg = "Le champ Message n'est pas renseigné/valide !";
                        }
                    }
                    else
                    {
                        $return_msg = "Le champ email n'est pas renseigné/valide !";
                    }
                }
                else
                {
                    $return_msg = "Le champ Nom-Prénom n'est pas renseigné/valide !";
                }
            }
            else
            {
                $return_msg = "";
            }


            //VIEW   

            $this->_postManager = new PostManager();
            $posts = $this->_postManager->getPosts();
            $this->_accueilManager = new AccueilManager();
            $accueilInfos = $this->_accueilManager->getAccueilInfos();
            $this->_view = new View('Accueil');
            $this->_view->generate(array('accueilInfos' => $accueilInfos, 'form_msg' => $return_msg, 'posts' => $posts));

    }

}

?>
