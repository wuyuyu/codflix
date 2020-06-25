<?php 
/****************************
* ----- DISPALY HISTORY -----
****************************/

function history() {

    $user_id = isset( $_SESSION['user_id'] ) ? $_SESSION['user_id'] : false;

      $historys = Media::historyMedias($user_id );
        require('view/historyView.php');

}

/****************************
* ----- DELETE ONE MEDIA IN HISTORY -----
****************************/

function deleteOneMediaInHistory($media_id){
    $user_id = isset( $_SESSION['user_id'] ) ? $_SESSION['user_id'] : false;
    $historys = Media::historyMedias($user_id );

    $db   = init_db();

    $req  = $db->prepare( "DELETE FROM history WHERE media_id = ?" );
    $req->execute( array($media_id)); 

    require('view/historyView.php');
}

/****************************
* ----- DELETE ALL MEDIAS IN HISTORY  -----
****************************/

function deleteAllMediaInHistory($user_id){
    $user_id = isset( $_SESSION['user_id'] ) ? $_SESSION['user_id'] : false;
    $historys = Media::historyMedias($user_id );

    $db   = init_db();

    $req  = $db->prepare( "DELETE FROM history WHERE user_id = ?" );
    $req->execute( array($user_id));
    
        echo '
        <script type="text/javascript">
        alert("Votre history est vide! Rafraichisez la page pour voir la liste ");
        </script>';
    

    require('view/historyView.php');
}