<?php
include('db.php');

function getUserRole(){
  global $bdd;
  $q = 'SELECT * FROM users WHERE email= :email';
  $stmt = $bdd->prepare($q);
  $statuss = $stmt->execute(
      array(
          'email'=>$_SESSION['email']
      ));
  if($statuss){
      $user = $stmt->fetch();
  }
  return $user['role_id'];
}