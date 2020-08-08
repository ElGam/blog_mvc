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
        if(isset($_GET['admin'])){$admin = $_GET['admin'];}
        if (isset($url) && count($url) < 1) {
            throw new \Exception("Page Introuvable");
        }
        //SI ADMIN : PEUT ACCEDER A LA LISTE DES USERS
        else if(isset($admin) && $_SESSION['admin'] == "true")
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
        extract($_POST);
        extract($_GET);
        //FORMULAIRE DE CONTACT
        if(isset($form_button))
        {
            //VERIFICATION DU CHAMP EMAIL
            if(isset($email) && filter_var($email, FILTER_VALIDATE_EMAIL))
            {
                $this->_email = htmlspecialchars($email);

                //VERIFICATION DU CHAMP NOM
                if(isset($nom) && strlen($nom) > 2)
                {
                    $this->_nom = htmlspecialchars($nom);

                    //VERIFICATION DU CHAMP PRENOM
                    if(isset($prenom) && strlen($prenom) > 2)
                    {
                        $this->_prenom = $prenom;

                        //VERIFICATION DU CHAMP: MOT DE PASSE
                        if(isset($password) && strlen($password) > 6 && $password == $password_verif)
                        {
                            $this->_password = htmlspecialchars($password);

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
        extract($_GET);
        $this->_userManager = new UserManager;
        
        if(isset($id_del) && $del == 1)
        {
            $this->_userManager->deleteAUser($id_del);
        }
        $userInfos = $this->_userManager->getAllUsersInfo();
        $this->_view = new View('User');
        $this->_view->generate(array('userInfos' => $userInfos, 'form_msg' => 'Liste Utilisateurs', 'form' => '0', 'title' => 'Espace Admin')); 
    }
}
?>