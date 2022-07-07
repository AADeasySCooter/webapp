<?php 

$test = 'gavinapearno@gmail.com';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
<style>
    .contact h3 {
        text-align: center;
        margin-bottom: 20px;
    }
    .contact form {
        width: 100%;
        margin-bottom: 20px;
    }
    .contact form input {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }
    .contact form textarea {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 3px;
        resize: vertical;
    }
    .contact form button {
        width: 100%;
        padding: 10px;
        background-color: #4CAF50;
        border: none;
        border-radius: 3px;
        color: white;
        cursor: pointer;
    }
</style>
</html>
        formulaire d'envoie d'email avec 
        <form class ="contact" action="#">
            <input type="text" name="name" placeholder="name">
            <input type="email" name="email" placeholder="email">
            <textarea cols="5" rows="5" name="message" placeholder="message"></textarea>
            <input type="submit" value="envoyer">
        </form>
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
                To : $test,
                From : email.value,
                Subject : "This is the subject",
                Body : message.value
            }).then(
            message => alert(message)
            );
                }

                form.addEventListener('submit', sendMail);
   
</script>