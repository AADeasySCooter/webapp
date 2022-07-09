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

//creer un fonction pour update un article
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
