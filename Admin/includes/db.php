<?php
$currency = '€';
// Connexion à la base de données






try{
    $bdd = new PDO('mysql:host=localhost:8889;dbname=devweb', 'root', 'root', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e){
    die('Erreur : ' . $e->getMessage());
}



$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "devweb";
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

//connexion a la base de données postgresql


$host = 'localhost';
$dbname = 'postgres';
$username = 'postgres';
$password = '';

$dsn = "pgsql:host=$host;port=5432;dbname=$dbname;user=$username;password=$password";

try{
 $connn = new PDO($dsn);
 
 if($connn){
  echo "";
 }
}catch (PDOException $e){
 echo $e->getMessage();
}




/* 
//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["host"];
$cleardb_username = $cleardb_url["user"];
$cleardb_password = $cleardb_url["pass"];
$cleardb_db = substr($cleardb_url["path"],1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$conn = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
 */

?>