<?php
include('db.php');

function getScooters(){
  global $bdd;
  $q = 'SELECT * FROM scooter';
  $stmt = $bdd->prepare($q);
  $statuss = $stmt->execute();
  if($statuss){
      $scooter = $stmt->fetchAll();
  }
  return $scooter;
}


//scooter en fonction du status 
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

 //supprime l'utilisateur et le redirige 
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

  //creer une fonction qui recupère toute les donnée de la table  weather_report
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

  //récupère tous les product  (4)  
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

  //recuperer tous les articles   ORDER BY date_create DESC
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






//recuperer tous les informations de la table about 
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