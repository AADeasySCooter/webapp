<?php

// Ouvrir la session utilisateur
session_start();
session_unset();
// Détruire la session utilisateur
session_destroy();



// Redirection vers l'accueil
header('location: index.php');
exit;