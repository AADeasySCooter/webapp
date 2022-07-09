<?php
include('db.php');


function getScooters(){
  global $bdd;
  $q = 'SELECT * FROM scooter ';
  $stmt = $bdd->prepare($q);
  $statuss = $stmt->execute();
  if($statuss){
      $scooter = $stmt->fetchAll();
  }
  return $scooter;
}

function getAllScooters(){
  global $bdd;
  $q = 'SELECT * FROM scooter ORDER BY created_at DESC ';
  $stmt = $bdd->prepare($q);
  $statuss = $stmt->execute();
  if($statuss){
      $scooter = $stmt->fetchAll();
  }
  return $scooter;
}


function getScootersByStatus($status){
  global $bdd;
  $q = 'SELECT * FROM scooter WHERE scooter_status = :status';
  $stmt = $bdd->prepare($q);
  $statuss = $stmt->execute(
      array(
          'status'=>$status
      ));
  if($statuss){
      $scooter = $stmt->fetchAll();
  }
  return $scooter;
}

  function user_id(){
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
    return $user['id'];
  }




  function getCart(){
    global $bdd;
    $user_id = user_id();
    $q = 'SELECT * FROM cart WHERE user_id = :user_id';
    $stmt = $bdd->prepare($q);
    $statuss = $stmt->execute(
        array(
            'user_id'=>$user_id
        ));
    if($statuss){
        $cart = $stmt->fetchAll();
    }
    return $cart;
  }

  //creer un fonction qui récuperer toute les données de la table users avec l'id de l'utilisateur
  function getUserById($id){
    global $bdd;
    $q = 'SELECT * FROM users WHERE id= :id';
    $stmt = $bdd->prepare($q);
    $statuss = $stmt->execute(
        array(
            'id'=>$id
        ));
    if($statuss){
        $user = $stmt->fetch();
    }
    return $user;
  }

  function deleteUser($id){
      global $bdd;
      $q = 'DELETE FROM users WHERE id = :id;';
      $stmt = $bdd->prepare($q);
      $statuss = $stmt->execute(
          array(
              'id'=>$id
          ));
      if($statuss){
          session_destroy();
          echo'User deleted ';
          header('location:deconnexion.php?message=account deleted.&type=danger');
          
      }else{
          echo'User not deleted error id ';
      
      }
  }

  function getWeatherReport(){
    global $connn;
    $q = 'SELECT * FROM weather_report';
    $stmt = $connn->prepare($q);
    $statuss = $stmt->execute();
    if($statuss){
        $weather_report = $stmt->fetch();
    }
    return $weather_report;
  }

  function getProduct(){
    global $bdd;
    $q = 'SELECT * FROM product ORDER BY created_at DESC LIMIT 4';
    $stmt = $bdd->prepare($q);
    $statuss = $stmt->execute();
    if($statuss){
        $product = $stmt->fetchAll();
    }
    return $product;
  }

  function getAllProduct(){
    global $bdd;
    $q = 'SELECT * FROM product';
    $stmt = $bdd->prepare($q);
    $statuss = $stmt->execute();
    if($statuss){
        $product = $stmt->fetchAll();
    }
    return $product;
  }

  function getArticle(){
    global $bdd;
    $q = 'SELECT * FROM articles ORDER BY date_create DESC';
    $stmt = $bdd->prepare($q);
    $statuss = $stmt->execute();
    if($statuss){
        $article = $stmt->fetchAll();
    }
    return $article;
  }






function getAbout(){
  global $bdd;
  $q = 'SELECT * FROM about';
  $stmt = $bdd->prepare($q);
  $statuss = $stmt->execute();
  if($statuss){
      $about = $stmt->fetch();
  }
  return $about;
}

