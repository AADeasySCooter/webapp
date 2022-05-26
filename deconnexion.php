<?php


/* session_start();


if(isset($_GET['deconnexion.php'])){
   unset($user_id);
   session_destroy();
   header('location:login.php');
}; */

// Ouvrir la session utilisateur
session_start();
unset($_SESSION['email'] );
// Détruire la session utilisateur
session_destroy();



// Redirection vers l'accueil
header('location: index.php');
exit;