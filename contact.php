<?php 
error_reporting(0);
include('includes/head.php');
include('includes/header.php');
include('includes/db.php');
include('includes/function.php');

$user_id = user_id();
$user = getUserById($user_id);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<br><br><br><br><br>
<body>
    <div class="container">
        <div class="row">
            <?php include('includes/message.php');
             ?>
            <div class="course-col">
                <div class="message"> </div>
                <form class ="contact" action="#">
                    <div class=" mb-3 ">
                    <input class="form-control" type="text" name="name" placeholder="name" value="<?= $user['lastname']?>">
                    </div>
                    <div class=" mb-3">
                    <input class="form-control" type="email" name="email" placeholder="email" value="<?= $user['email']?>">
                    </div>
                    <div class="  mb-3">
                    <textarea class="form-control" cols="5" rows="5" name="message" placeholder="message"></textarea>
                    </div>
                    <input class ="btn btn-primary" type="submit" value="envoyer">
                </form>
            </div>

        </div>
        
    </div>

</body>

</html>
       
        <script src="https://smtpjs.com/v3/smtp.js">
</script>
<script>
            const form = document.querySelector('.contact');
    //send mail with js
    function sendMail(e){
        e.preventDefault();
        name = document.querySelector('input[name="name"]');
        email = document.querySelector('input[name="email"]');
        message = document.querySelector('textarea[name="message"]');

            Email.send({
                SecureToken : "8205c39e-b43b-4084-aeee-be8642ef5b0a",
                To : email.value,
                From : 'audesandrine6@gmail.com',
                Subject : "This is the subject",
                Body : message.value
            }).then(
                //afficher message dans la div message
                message => {
                    document.querySelector('.message').innerHTML = '<div class="alert alert-success" role="alert">email send</div>';
                }
            );
                }

                form.addEventListener('submit', sendMail);

</script>