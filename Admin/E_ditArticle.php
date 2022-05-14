<?php
include('includes/db.php');
include('includes/db.php');
include('includes/head.php');
include('includes/header.php');

if(isset($_GET['id']) AND !empty($_GET['id'])){
   $getid= $_GET['id'];
   $recupArticles =$bdd->prepare('SELECT * FROM  articles WHERE id = ?');
   $recupArticles ->execute(array($getid));
   if($recupArticles ->rowCount()> 0){
        $iarticles=$recupArticles->fetch();

        $titre = $iarticles['title'];
        $description = $iarticles['description'];
        $img = $iarticles['image'];
        str_replace ( '<br />', '',$iarticles['description']);

        if(isset($_POST['valider'])){
        $titre_saisi = htmlspecialchars($_POST['title']);
        $description_saisi = nl2br(htmlspecialchars($_POST['description']));
        $img_saisi = htmlspecialchars($_POST['image']);
        $update = $dbb->prepare('UPDATE articles SET titre = ? , image = ? , description = ? WHERE id = ?');
        $update ->execute(array($titre_saisi, $description_saisi, $img, $getid));
         
        header('Location: articles.php');
        }
   }else{
       echo"Aucun article trouvé";

   }

}else{
    echo"Aucun identifiant trouvé";
}
?>
<!DOCTYPE html>


<main class="mt-5 pt-3">
     <div class="container-fluid">
       <form action="" method="post">
        <input type="text" name="titre" value="<?= $titre; ?>">
        <br>
        <textarea name="description" value="<?= $description; ?>"></textarea>
        <br><br>
        <input type="file" name="img" accept="image/gif,image/png, image/jpeg," value="<?= $img; ?>">
        <br><br><br>
        <input type="submit" name="valider">

     </form>
     </div>
</main>
</body>
</html>
