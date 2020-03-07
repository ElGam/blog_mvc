<?php

//RECUPERATION DES VARIABLES
$email = $_GET['email'];
$nom_prenom = $_GET['nom_prenom'];
$message = $_GET['message'];

//PROTECTION CONTRE FAILLE XSS
//CELA EMPECHE D'INSERER DU CODE
$email = htmlspecialchars($email);
$message = htmlspecialchars($message);

//VERIFICATION DE LA TAILLE DE LEMAIL ET DU MESSAGE
if(strlen($email) > 8 && strlen($message) > 20 && strlen($email) < 150 && strlen($message) < 2000)
    {
     $to = 'mederick.delos@gmail.com';
     $subject = 'Contactez-nous';
     $headers = "From: $email" . "\r\n" .
     "Reply-To: mederick.delos@gmail.com" . "\r\n" .
     "X-Mailer: PHP/" . phpversion();
    }


//ENVOI DU MAIL
     mail($to, $subject, $message . "\n Par " . $nom_prenom, $headers);

echo "true";

?>