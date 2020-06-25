<?php

require_once( 'model/user.php' );

/****************************
* ----- LOAD SIGNUP PAGE -----
****************************/

function signupPage() {

  $user     = new stdClass();
  $user->id = isset( $_SESSION['user_id'] ) ? $_SESSION['user_id'] : false;
  
  if( !$user->id ):
    require('view/auth/signupView.php');
  else:
    require('view/homeView.php');
  endif;

}

/***************************
* ----- SIGNUP FUNCTION -----
 
https://openclassrooms.com/fr/courses/918836-concevez-votre-site-web-avec-php-et-mysql/914508-ecrivez-des-donnees
look at 5:18
***************************/

function signupNewUser(){
  $db   = init_db();
  $hashde_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
  $requete = $db->prepare('INSERT INTO `user`(`email`, `password`) VALUES (?, ?)');
  $requete ->execute(array($_POST['email'], $hashde_password ));

  // Close databse connection
  $db   = null;

  /* 
  if the registration has been successfully registered, the values ​​of the fields requested are not null
  you have to create a function to send an email with an automatically generated link (unique key)
  in the mail, here, creating a table in the database is necessary.
  */
  if(isset( $_POST['email'] ) && isset( $_POST['password'] ) && isset( $_POST['password_confirm'] )){

    $mail = htmlentities($_POST['email']);
    $headers = "Veillez valider votre inscription en cliquant le lien: ";
        
  // when the registration is validated, user id is unique, retrieve user id for sending the email

    $user_id = isset( $_SESSION['user_id'] ) ? $_SESSION['user_id'] : false;
    $validationLink = "http://localhost:800/CodFlix/?user_id=" . $user_id;

    mail('yuyuan.wu@edu.itescia.fr', 'Validation de votre inscription', $validationLink, $headers);
    require('view/auth/loginView.php');
    echo '
    <script type="text/javascript">
    alert("Votre inscription est enregistré, vous allez recevoir un mail, veuillez cliquer le lien de validation dans le mail pour validé votre compte. ");
    </script>';
    echo $user_id;
  }
  
 
}