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

  /* si l'inscription a été bien enregistré, les valeurs des champs demandés sont pas null 
   il faut creer une fonction pour envoyer un mail avec un lien généré automatiquement (clé unique)dans le mail, ici, création une table dans la 
   base de donné est neccessaire.

  */
  if(isset( $_POST['email'] ) && isset( $_POST['password'] ) && isset( $_POST['password_confirm'] )){

        $mail = htmlentities($_POST['email']);
        $headers = "Veillez valider votre inscription en cliquant le lien: ";
        
        // quand l'inscription est validé, user id est unique, récupérer user id pour l'envoie du mail

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