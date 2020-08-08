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
        extract($_POST);
        //FORMULAIRE DE CONTACT ? SOUMIS
        if(isset($form_button))
        {
            //VERIFICATION: PRENOM
            if(isset($nom_prenom) && strlen($nom_prenom) > 5 && strlen($nom_prenom) < 100)
            {
                $nom_prenom = htmlspecialchars($nom_prenom); 
                

                //VERIFICATION: EMAIL
                if(isset($email) && filter_var($email, FILTER_VALIDATE_EMAIL))
                {
                    $email = htmlspecialchars($email);

                    //VERIFICATION: MESSAGE
                    if(isset($message) && strlen($message) > 20 && strlen($message) < 2000)
                    {
                        $message = htmlentities($message) . "\n\n" . $nom_prenom. "\n" . $email;

                        //ENVOI DU MAIL
                        $to      = 'mederick.delos@gmail.com';
                        $subject = 'Contact Blog';
                        $headers = 'From: ' .$nom_prenom . "\r\n";
                   
                        mail($to, $subject, $message, $headers);
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
