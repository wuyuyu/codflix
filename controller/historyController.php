<?php 

function history() {

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
    $user_id = isset( $_SESSION['user_id'] ) ? $_SESSION['user_id'] : false;

      $historys = Media::historyMedias($user_id );
  
    require('view/historyView.php');


}