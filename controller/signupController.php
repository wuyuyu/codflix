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
regarder le tuto à 5:18
https://openclassrooms.com/fr/courses/918836-concevez-votre-site-web-avec-php-et-mysql/914508-ecrivez-des-donnees

***************************/

function signupNewUser(){
  $db   = init_db();
  $requete = $db->prepare('INSERT INTO `user`(`email`, `password`) VALUES (?, ?)');
  $requete ->execute(array($_POST['email'],$_POST['password']));

  // Close databse connection
  $db   = null;
  require('view/auth/loginView.php');
 
}