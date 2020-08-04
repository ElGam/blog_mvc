<?php
require_once 'views/View.php';
/**
     *
     */
class ControllerInscription
{
    private $_inscriptionManager;
    private $_view;
    private $_nom;
    private $_prenom;
    private $_email;
    private $_password;

    public function __construct()
    {
        if (isset($url) && count($url) > 1) {
            throw new \Exception("Page introuvable", 1);

        }
        else {


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
                                $this->_password = htmlspecialchars(md5($_POST['password']);

                                //INSCRIPTION EN BASE DE DONNEES
                                $this->_inscriptionManager = new InscriptionManager;
                                $this->_inscriptionManager->inscription($this->_email, $this->_nom, $this->_prenom, $this->_password);
                                $return_msg = "Votre inscription a été validée !";
                                $form = 0;
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
                $return_msg ="<i>Remplissez le Formulaie</i>";
                $form = 1;

            }
            //GENERATION DE LA VUE
            $this->_view = new View('Inscription');
            $this->_view->generate(array('return_msg' => $return_msg, 'form' => $form));

        }
    }
}

?>
