<?php 
    /********
     * il faut créer une fonction pour récupérer une liste de historique (avec une table historique dans base de donnée ) 
     * Créer la page pour afficher l’historique (HTML et CSS)
        ● Afficher l’historique avec les informations de chaque stream
        ● Possibilité de supprimer un élément de l’historique
        ● Possibilité de supprimer l’intégralité de l’historique via un bouton “Supprimer mon
        historique”

    étapes:
        1. création d'une table 'history' dans la base de donnée, avec:
            id, 
            id l'utilisateur
            id du media
        2. création d'une fonction historyMedias(),
        2. création d'une fonction lié au bouton "supprimer le média"
        3. création d'une fonction pour la suppression de tous les éléments de la table historique
     */

function history() {

    $user_id = isset( $_SESSION['user_id'] ) ? $_SESSION['user_id'] : false;

    // $historys: tous les éléments historique d'un utilisateur
      $historys = Media::historyMedias($user_id );


    

    /* recuperer chaque media_id dans history 
      foreach($historys as $history): 
        $medias= Media::filterMediabyID($history['media_id']);
        var_dump($history['media_id']);
        //var_dump($media);
      endforeach;

      $media= Media::filterMediabyID($history["media_id"]);
/*
        $mediaID=$mediaIDArray["media_id"];
      echo "c'est quoi?" . $mediaID;
      var_dump($mediaID);
      $media = Media::filterMediabyID($mediaID);
      */
  
    require('view/historyView.php');

}

function deleteOneMediaInHistory($media_id){
    $user_id = isset( $_SESSION['user_id'] ) ? $_SESSION['user_id'] : false;
    $historys = Media::historyMedias($user_id );

    $db   = init_db();

    $req  = $db->prepare( "DELETE FROM history WHERE media_id = ?" );
    $req->execute( array($media_id));
    
        echo '
        <script type="text/javascript">
        alert("votre media est supprimé! ");
        </script>';
    

    require('view/historyView.php');
}