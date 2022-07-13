<?php
include('includes/head.php');
include('includes/header.php');
include('includes/db.php');
include('includes/function.php');

//enlever tous les produits de la session
unset($_SESSION["products"]);