<?php


require_once( 'model/user.php' );

/****************************
* ----- DISPLAY PROFIL PAGE -----
****************************/

function displayProfilPage($user_id){
 
    $user = User::getUserById( $user_id );
    require('view/profilView.php');

    echo "djidshjfoijzio";
    var_dump($user_id);
    

}

/****************************
* ----- CHANGE INFOS IN PROFIL PAGE -----
****************************/
   
function changeProfil(){

    $user = User::getUserById( $_SESSION['user_id']);
    $newEmail = htmlentities($_POST['newEmail']);
    $newPassword = htmlentities($_POST['newPassword']);
    $passWordConfirm = htmlentities($_POST['paaswordConfirm']);

    $db   = init_db();

    if($passWordConfirm == $user['password']){
       
        if($newEmail){

            $requete = $db->prepare("UPDATE user SET email=$newEmail WHERE id = ?");
        };
        if($newPassword){

            $requete = $db->prepare("UPDATE user SET password= $newPassword WHERE id = ?");
        };
          
        $requete ->execute(array($user['id']));

            echo '
            <script type="text/javascript">
            alert("Votre modification a été pris en compte! ");
            </script>';
            
    }
    else{
        
    }
    require('view/profilView.php');

}

/****************************
* ----- DELETE PROFIL -----
****************************/

function deleteProfil(){

    $user = User::getUserById( $_SESSION['user_id']);   
    //$passWordConfirm = htmlentities($_POST['paaswordConfirm']);

    $db   = init_db();
    $requete = $db->prepare("DELETE FROM user WHERE id = ?");
    $requete ->execute(array($user['id']));

    echo '
    <script type="text/javascript">
    alert("Votre compte est supprimé! ");
    </script>';
    header( 'location: index.php' );
}