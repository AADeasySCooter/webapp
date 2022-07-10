<?php
include('db.php');

function getUsers(){
  global $bdd;
  $q = 'SELECT * FROM users ';
  $stmt = $bdd->prepare($q);
  $statuss = $stmt->execute();
  if($statuss){
      $users = $stmt->fetchAll();
  }
  return $users;
}

function updateUser($id, $email, $firstname, $lastname, $role_id , $status){
  global $bdd;
  $q = 'UPDATE users SET email = :email, firstname = :firstname, lastname = :lastname, role_id = :role_id , status = :status  WHERE id = :id';
  $stmt = $bdd->prepare($q);
  $statuss = $stmt->execute(
      array(
          'id'=>$id,
          'email'=>$email,
          'firstname'=>$firstname,
          'lastname'=>$lastname,
          'role_id'=>$role_id,
          'status'=>$status
      ));
  return $statuss;
}


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
};

function addArticle($title, $description, $autor, $image){
  global $bdd;
  $q = 'INSERT INTO articles (title, description , autor , image) VALUES (:title , :description , :autor , :image)';
  $stmt = $bdd->prepare($q);
  $statuss = $stmt->execute(
      array(
          'title'=>$title,
          'description'=>$description,
          'autor'=>$autor,
          'image'=>$image
      ));
  return $statuss;
}

//supprimer un article
function deleteArticle($id){
  global $bdd;
  $q = 'DELETE FROM articles WHERE id = :id';
  $stmt = $bdd->prepare($q);
  $statuss = $stmt->execute(
      array(
          'id'=>$id
      ));
  return $statuss;
}

function getArticles(){
  global $bdd;
  $q = 'SELECT * FROM articles ';
  $stmt = $bdd->prepare($q);
  $statuss = $stmt->execute();
  if($statuss){
      $articles = $stmt->fetchAll();
  }
  return $articles;
}
 

function getArticleById($id){
  global $bdd;
  $q = 'SELECT * FROM articles WHERE id= :id';
  $stmt = $bdd->prepare($q);
  $statuss = $stmt->execute(
      array(
          'id'=>$id
      ));
  if($statuss){
      $article = $stmt->fetch();
  }
  return $article;
}


function updateArticle($id, $title, $description, $autor, $image){
  global $bdd;
  $q = 'UPDATE articles SET title = :title, description = :description, autor = :autor, image = :image WHERE id = :id';
  $stmt = $bdd->prepare($q);
  $statuss = $stmt->execute(
      array(
          'id'=>$id,
          'title'=>$title,
          'description'=>$description,
          'autor'=>$autor,
          'image'=>$image
      ));
  return $statuss;
}


function addProduct($name, $description, $price, $image, $code){
  global $bdd;
  $q = 'INSERT INTO product (product_name, product_description,  product_price , product_image, product_code) VALUES (:product_name , :product_description, :product_price  , :product_image, :product_code)';
  $stmt = $bdd->prepare($q);
  $statuss = $stmt->execute(
      array(
            'product_name'=>$name,
            'product_description'=>$description,
            'product_price'=>$price,
            'product_image'=>$image,
            'product_code'=>$code
      ));
  return $statuss;
}


function updateProduct($id, $name, $description, $price, $image, $code){
  global $bdd;
  $q = 'UPDATE product SET product_name = :product_name, product_description = :product_description, product_price = :product_price, product_image = :product_image, product_code = :product_code WHERE id = :id';
  $stmt = $bdd->prepare($q);
  $statuss = $stmt->execute(
      array(
          'id'=>$id,
          'product_name'=>$name,
          'product_description'=>$description,
          'product_price'=>$price,
          'product_image'=>$image,
          'product_code'=>$code
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


function deleteProduct($id){
  global $bdd;
  $q = 'DELETE FROM product WHERE id = :id';
  $stmt = $bdd->prepare($q);
  $statuss = $stmt->execute(
      array(
          'id'=>$id
      ));
  return $statuss;
}

//creer une fonction pour ajouter un scooter
function addScooter($name, $code, $lat, $long, $image){
  global $bdd;
  $q = 'INSERT INTO scooter (scooter_name,  scooter_code, lat, lon , scooter_image) VALUES (:scooter_name , :scooter_code, :lat  , :lon, :scooter_image)';
  $stmt = $bdd->prepare($q);
  $statuss = $stmt->execute(
      array(
            'scooter_name'=>$name,
            'scooter_code'=>$code,
            'lat'=>$lat,
            'lon'=>$long,
            'scooter_image'=>$image,
      ));
  return $statuss;
}

//creer une fonction pour update un scooter
function updateScooter($id, $name, $status, $code, $lat, $lon, $image){
  global $bdd;
  $q = 'UPDATE scooter SET scooter_name = :scooter_name, scooter_status = :scooter_status , scooter_code = :scooter_code, lat = :lat, lon = :lon, scooter_image = :scooter_image WHERE id = :id';
  $stmt = $bdd->prepare($q);
  $statuss = $stmt->execute(
      array(
          'id'=>$id,
          'scooter_name'=>$name,
          'scooter_status'=>$status,
          'scooter_code'=>$code,
          'lat'=>$lat,
          'lon'=>$lon,
          'scooter_image'=>$image
      ));
  return $statuss;
}

//creer une fonction pour recupere un scooter par son id
function getScooterById($id){
  global $bdd;
  $q = 'SELECT * FROM scooter WHERE id= :id';
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


//creer une fonction pour supprimer un scooter par son id
function deleteScooter($id){
  global $bdd;
  $q = 'DELETE FROM scooter WHERE id = :id';
  $stmt = $bdd->prepare($q);
  $statuss = $stmt->execute(
      array(
          'id'=>$id
      ));
  return $statuss;
}