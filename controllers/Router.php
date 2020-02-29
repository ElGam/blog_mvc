<?php
require_once 'views/View.php';
/**
 *
 */
class Router
{
  private $ctrl;
  private $view;

  public function routeReq(){
    
      
    try {
      //CHARGEMENT AUTOMATIQUE DES CLASSES DU DOSSIER 'MODELS'
      spl_autoload_register(function($class){
        require_once('models/'.$class.'.php');
      });

      //ON INITIALISE LA VARIABLE 'URL'
      $url = '';

      //SI LE PARAMETRE URL EST RENSEIGNE
      //RECHERCHE DU CONTROLLER EN FONCTION DE LA VARIABLE 'URL'
      if (isset($_GET['url'])) {
        //ON DECOMPOSE L'URL, PUIS ON APPLIQUE UN FILTRE
        $url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));

        //RECUPERATION DU PREMIER PARAMETRE DE L'URL
        //CONVERSION EN MINUSCULE
        //+PREMIERE LETTRE EN MAJUSCULE
        $controller = ucfirst(strtolower($url[0]));

        $controllerClass = "Controller".$controller;

        //DEFINITION DU CHEMIN DU CONTROLLER VOULU
        $controllerFile = "controllers/".$controllerClass.".php";

        //VERIFICATION DE L'EXISTENCE DE CE FICHIER
        if (file_exists($controllerFile)) {
          //ON LANCE LA CLASSE EN QUESTION
          //AVEC TOUS LES PARAMETRES (URL)
          //POUR RESPECTER L'ENCAPSULATION
          require_once($controllerFile);
          $this->ctrl = new $controllerClass($url);
        }
        //SINON ON INDIQUE QUE LA PAGE EST INTROUVABLE
        else {
          throw new \Exception("Page introuvable", 1);

        }
      }
      //SINON ON AFFICHE LA PAGE D'ACCUEIL
      else {
        require_once('controllers/ControllerAccueil.php');
        $this->ctrl = new ControllerAccueil($url);
      }

    } //EN CAS D'ERREUR ON AFFICHE LA PAGE D'ERREUR EN RETOURNANT UN MESSAGE
      catch (\Exception $e) {
      $errorMsg = $e->getMessage();
      $this->_view = new View('Error');
      $this->_view->generate(array('errorMsg' => $errorMsg));
    }
  }
}
 ?>