<?php

// Ouvrir la session utilisateur
session_start();

// Détruire la session utilisateur
session_destroy();

// Redirection vers l'accueil
header('location: index.php');
exit;