<?php

require_once( 'controller/homeController.php' );
require_once( 'controller/loginController.php' );
require_once( 'controller/signupController.php' );
require_once( 'controller/mediaController.php' );
require_once( 'controller/contactController.php' );
require_once( 'controller/profilController.php' );
require_once( 'controller/historyController.php');


$user_id = isset( $_SESSION['user_id'] ) ? $_SESSION['user_id'] : false;

/**************************
* ----- HANDLE ACTION -----
***************************/

if ( isset( $_GET['action'] ) ):

  switch( $_GET['action']):

    case 'login':

      if ( !empty( $_POST ) ) login( $_POST );
      else loginPage();

    break;

    case 'signup':

      signupPage();

    break;

    case 'logout':

      logout();

    break;

    case 'signupNewUser':

      signupNewUser();

    break;

    case 'contact':

      contact();

    break;

    case 'profil':
      // si utilisateur est connecté
      if($user_id){
        profil($user_id);
      }

    break;

    case 'history':
      history();
    break;

    case 'deleteOneMedia':
      deleteOneMediaInHistory($_GET["media_id"]);
    break;

  endswitch;

else:

  /**************************
* -----  je vérifie si utilisateur est connecté ou pas 
***************************/



  if( $user_id ):   

    $media_id = isset( $_GET['media'] ) ? $_GET['media'] : false;

    if($media_id):
      mediaDetailPage($media_id);
    else:
      mediaPage();
    endif;
    
  else:
    homePage();
  endif;

endif;