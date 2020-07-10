<?php
require_once 'views/View.php';

class ControllerUser

{
    private $_userManager;
    private $_view;
    private $_email;
    private $_prenom;
    private $_nom;
    private $_password;

    public function __construct()
    {
        if (isset($url) && count($url) < 1) {
            throw new \Exception("Page Introuvable");
        }
        //SI ADMIN : PEUT ACCEDER A LA LISTE DES USERS
        else if(isset($_GET['admin']) && $_SESSION['admin'] == "true")
        {
            $this->listUser();
        }
        //SINON : AFFICHAGE DU PROFIL USER (CONNECTE)
        else {
            $this->userPage();
        }
    }


    private function userPage()
    {
        //FORMULAIRE DE CONTACT
        if(isset($_POST['form_button']))
        {
            //VERIFICATION DU CHAMP EMAIL
            if(isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
            {
                $this->_email = htmlspecialchars($_POST['email']);

                //VERIFICATION DU CHAMP NOM
                if(isset($_POST['nom']) && strlen($_POST['nom']) > 2)
                {
                    $this->_nom = htmlspecialchars($_POST['nom']);

                    //VERIFICATION DU CHAMP PRENOM
                    if(isset($_POST['prenom']) && strlen($_POST['prenom']) > 2)
                    {
                        $this->_prenom = $_POST['prenom'];

                        //VERIFICATION DU CHAMP: MOT DE PASSE
                        if(isset($_POST['password']) && strlen($_POST['password']) > 6 && $_POST['password'] == $_POST['password_verif'])
                        {
                            $this->_password = htmlspecialchars($_POST['password']);

                            //INSCRIPTION EN BASE DE DONNEES
                            $return_msg = "Vos modifications ont été validées !";
                            $form = 0;
                            $this->_userManager = new UserManager;
                            $this->_userManager->updateUser($this->_email, $this->_nom, $this->_prenom, $this->_password, $_SESSION['id']);


                        }
                        else
                        {
                            $return_msg = "Le champ mot de passe n'est pas renseigné/valide !";
                            $form = 1;
                        }
                    }
                    else
                    {
                        $return_msg = "Le champ Prénom n'est pas renseigné/valide !";
                        $form = 1;
                    }
                }
                else
                {
                    $return_msg ="Le champ Nom n'est pas renseigné/valide !";
                    $form = 1;
                }
            }
            else
            {
                $return_msg = "Le champ email n'est pas renseigné/valide !";
                $form = 1;
            }
        }
        else
        {
            $return_msg = "";
            $form = 1;
        }
        
        $this->_userManager = new UserManager;
        $infos = $this->_userManager->getInfos($_SESSION['id']);
        $this->_view = new View('User');
        $this->_view->generate(array('infos' => $infos, 'form_msg' => $return_msg, 'form' => $form, 'title' => 'Mon Profil'));
    }

    //AFFICHAGE LISTE DES UTILISATEURS (ADMINS)
    private function listUser()
    {
        $this->_userManager = new UserManager;
        
        if(isset($_GET['id_del']) && $_GET['del'] == 1)
        {
            $this->_userManager->deleteAUser($_GET['id_del']);
        }
        $userInfos = $this->_userManager->getAllUsersInfo();
        $this->_view = new View('User');
        $this->_view->generate(array('userInfos' => $userInfos, 'form_msg' => 'Liste Utilisateurs', 'form' => '0', 'title' => 'Espace Admin')); 
    }
}
?>