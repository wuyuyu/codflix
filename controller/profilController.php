<?php


require_once( 'model/user.php' );

function profil($user_id){
 
    $user = User::getUserById( $user_id );
    require('view/profilView.php');
  }