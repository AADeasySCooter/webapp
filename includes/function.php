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


function getAllScootersByID($id){
  global $bdd;
  $q = 'SELECT * FROM scooter WHERE id = :id';
  $stmt = $bdd->prepare($q);
  $statuss = $stmt->execute(
      array(
          'id'=>$id
      ));
  if($statuss){
      $scooter = $stmt->fetch();
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

  function getCartByUserID($user_id){
    global $bdd;
    $q = 'SELECT * FROM cart WHERE user_id = :user_id';
    $stmt = $bdd->prepare($q);
    $statuss = $stmt->execute(
        array(
            'user_id'=>$user_id
        ));
    if($statuss){
        $cart = $stmt->rowCount();
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

function getPlanById($id){
  global $bdd;
  $q = 'SELECT * FROM plan WHERE id= :id';
  $stmt = $bdd->prepare($q);
  $statuss = $stmt->execute(
      array(
          'id'=>$id
      ));
  if($statuss){
      $plan = $stmt->fetch();
  }
  return $plan;
}


function updateStatus($id){
  global $bdd;
  $q = 'UPDATE scooter SET scooter_status= 1 , user_id= 0 , done_at= NULL, take_at= NULL WHERE id= :id';
  $stmt = $bdd->prepare($q);
  $statuss = $stmt->execute(
      array(
          'id'=>$id
      ));

  return $statuss;

}

function getProductById($id){
  global $bdd;
  $q = 'SELECT * FROM product WHERE id= :id';
  $stmt = $bdd->prepare($q);
  $statuss = $stmt->execute(
      array(
          'id'=>$id
      ));
  if($statuss){
      $product = $stmt->fetch();
  }
  return $product;
}

function getScooterById($id){
  global $bdd;
  $q = 'SELECT * FROM scooter WHERE id= :id';
  $stmt = $bdd->prepare($q);
  $statuss = $stmt->execute(
      array(
          'id'=>$id
      ));
  if($statuss){
      $user = $stmt->fetch();
  }else {
    echo'Scooter not found error id ';
  }
  return $user;
}

//update pour le checkout
function updateUser($id,$address,$number,$code_postal,$ville){
  global $bdd;
  $q = 'UPDATE users SET address = :address , number = :number , code_postal = :code_postal, ville = :ville WHERE id = :id';
  $stmt = $bdd->prepare($q);
  $statuss = $stmt->execute(
      array(
          'id'=>$id,
          'address'=>$address,
          'number'=>$number,
          'code_postal'=>$code_postal,
          'ville'=>$ville
      ));
  if($statuss){
      echo'User updated ';
  }else {
    echo'User not updated error id ';
  }

  return $statuss;
}



//fonction update user  pour  updateUser.php
function updateUser2($id,$firstname,$lastname,$address,$number,$code_postal,$ville){
  global $bdd;
  $q = 'UPDATE users SET firstname = :firstname , lastname = :lastname, address = :address , number = :number , ville = :ville , code_postal = :code_postal WHERE id = :id';
  $stmt = $bdd->prepare($q);
  $statuss = $stmt->execute(
      array(
          'id'=>$id,
          'firstname'=>$firstname,
          'lastname'=>$lastname,
          'address'=>$address,
          'number'=>$number,
          'code_postal'=>$code_postal,
          'ville'=>$ville
      ));
  if($statuss){
      echo'User updated ';
  }else {
    echo'User not updated error id ';
  }

  return $statuss;
}

function addPoint($user_id,$points){
  global $bdd;
  $q = 'UPDATE users SET point = :points WHERE id = :user_id';
  $stmt = $bdd->prepare($q);
  $statuss = $stmt->execute(
      array(
          'user_id'=>$user_id,
          'points'=>$points
      ));
  if($statuss){
      echo' ';
  }else {
    echo' error id ';
  }

  return $statuss;
}

function getPlan(){
  global $bdd;
  $q = 'SELECT * FROM plan ORDER BY created_at DESC';
  $stmt = $bdd->prepare($q);
  $statuss = $stmt->execute();
  if($statuss){
      $plan = $stmt->fetchAll();
  }
  return $plan;
}

function PointUse($id,$points_use){
  global $bdd;
  $q = 'UPDATE users SET point_use = :point_use WHERE id = :id';
  $stmt = $bdd->prepare($q);
  $statuss = $stmt->execute(
      array(
          'id'=>$id,
          'point_use'=>$points_use
      ));

  return $statuss;
}


function getScooterByUserId($id){
  global $bdd;
  $q = 'SELECT * FROM scooter WHERE user_id= :id';
  $stmt = $bdd->prepare($q);
  $statuss = $stmt->execute(
      array(
          'id'=>$id
      ));
  if($statuss){
      $scooter = $stmt->fetchAll();
  }
  return $scooter;
}


/* function getException($exception){
  $message = $exception->getMessage();
  $code = $exception->getCode();
  $file = $exception->getFile();
  $line = $exception->getLine();
  $trace = $exception->getTraceAsString();
  $error = "Message: $message\nCode: $code\nFile: $file\nLine: $line\nTrace: $trace";
  return $error;
} */