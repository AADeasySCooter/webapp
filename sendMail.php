<?php
  require 'vendor/autoload.php';
  use \Mailjet\Resources;
  $mj = new \Mailjet\Client('d4a4efd8e6af3e8b3016299090323ada','3fdba6a84e2d47e03d5dcf3d48d5fe94',true,['version' => 'v3.1']);

  if(isset($_POST['eemail'])){

    $email = htmlspecialchars($_POST['eemail']);


    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
  $body = [
    'Messages' => [
      [
        'From' => [
          'Email' => "audesandrine6@icloud.com",
          'Name' => "GAVIN"
        ],
        'To' => [
          [
            'Email' => "$email",
            'Name' => "GAVIN"
          ]
        ],
        'Subject' => "Greetings from Mailjet.",
        'TextPart' => "My first Mailjet email",
        'HTMLPart' => "<h3>Dear passenger 1, welcome to <a href='https://www.mailjet.com/'>Mailjet</a>!</h3><br />May the delivery force be with you!",
        'CustomID' => "AppGettingStartedTest"
      ]
    ]
  ];
  $response = $mj->post(Resources::$Email, ['body' => $body]);
  $response->success() && var_dump($response->getData());

}else{

    echo "Email non valide";
}

} else {
header('Location: index.php');
die();
}
?>
