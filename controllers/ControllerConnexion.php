<?php
require_once 'views/View.php';


class ControllerConnexion
{
    private $_connexionManager;
    private $_userManager;
    private $_view;
    private $_email;
    private $_password;

    public function __construct()
    {
        if (isset($url) && count($url) < 1) {
            throw new \Exception("Page Introuvable");
        }
        else {
            $this->connexion();
        }
    }


    private function connexion()
    {
        if(isset($_POST['email']) && isset($_POST['password'])) {
            $this->_connexionManager = new ConnexionManager;
            $this->_email = $_POST['email'];
            $this->_password = md5($_POST['password']);
            $connexion = $this->_connexionManager->check($this->_email, $this->_password);

            //SI: IDENTIFIANTS OK
            //RENVOI VERS PAGE D'ACCUEIL
            if(isset($connexion[0]))
            {
                $_SESSION['id'] = $connexion[0]->id(); 
                $this->_userManager = new UserManager;
                $user = $this->_userManager->getInfos($_SESSION['id']);
                $_SESSION['nom'] = $user[0]->nom();
                $_SESSION['prenom'] = $user[0]->prenom();
                $_SESSION['admin'] = $user[0]->admin();
                $_SESSION['redacteur'] = $user[0]->redacteur();
                header("Location: Accueil");
            }
            //SI: IDENTIFIANTS KO
            //RETOUR VERS FORMULAIRE
            else if(!isset($connexion[0])){
                $this->connexionForm("retryForm");
            }
            else {
                $this->_view = new View('Connexion');
                $this->_view->generate(array('connexion' => $connexion));
            }
        }
        //DECONNEXION
        else if(isset($_GET['disconnect']))
        {
            $this->deconnexion();
        }
        //FORMULAIRE DE CONNEXION
        else
        {
            $this->connexionForm("firstForm");
        }
    }


    //CONNEXION
    private function connexionForm($firstForm)
    {
        $this->_connexionManager = new ConnexionManager;
        $connexion[0] = $firstForm;
        $this->_view = new View('Connexion');
        $this->_view->generate(array('connexion' => $connexion));
    }

    //DECONNEXION
    private function deconnexion()
    {
        $this->_connexionManager = new ConnexionManager;
        $connexion[0] = "disconnect";
        session_destroy();
        $this->_view = new View('Deconnexion');
        $this->_view->generate(array('connexion' => $connexion));
    }

}

?>