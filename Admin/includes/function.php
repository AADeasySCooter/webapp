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

//creer une fonction qui recupere toute les articles
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
