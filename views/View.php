<?php
//RECUPERATION DE LA SESSION
session_start();
/**
 *
 */
class View
{
  //FICHIER DE LA VUE
  private $_file;

  //TITRE DE LA PAGE
  private $_t;

  function __construct($action)
  {
    $this->_file = 'views/view'.$action.'.php';
  }

  //CREATION D'UNE FONCTION QUI VA GENERER ET AFFICHER LA VUE
  public function generate($data){
    //DEFINITION DU CONTENU A ENVOYER
    $content = $this->generateFile($this->_file, $data);

    //TEMPLATE
    $view = $this->generateFile('views/template.php', array('t' => $this->_t, 'content' => $content));
    echo $view;
  }


  private function generateFile($file, $data){
    if (file_exists($file)) {
      extract($data);

      //commencer la temporisation
      ob_start();

      require $file;

      //arreter la temporisation
     return ob_get_clean();
    }
    else {
      throw new \Exception("Fichier ".$file." introuvable", 1);

    }
  }












}









 ?>
