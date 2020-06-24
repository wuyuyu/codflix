<?php


require_once( 'model/user.php' );

function profil($user_id){
 
    $user = User::getUserById( $user_id );
    require('view/profilView.php');

    echo "djidshjfoijzio";
    var_dump($user_id);
    
    /* Quand je click sur le button valider la modif, j'appelle la fonction setPassword, setMail
    if(){
        $password = $user["password"];
        $email = $user["email"];
        setPassword( $password, $password_confirm = false ) ;
        setEmail( $email ) ;
    }


    //Quand je click sur le button supprimer, je suprime id(je fais une requette SQL DELETE), 
    */
    
  }