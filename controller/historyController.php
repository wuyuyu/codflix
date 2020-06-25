<?php 

function history() {
  $search = isset( $_GET['title'] ) ? $_GET['title'] : null;
  $select = isset($_GET['critereSelect']) ? $_GET['critereSelect'] : null;

  $is_ajax = 'xmlhttprequest' == strtolower( $_SERVER['HTTP_X_REQUESTED_WITH'] ?? '' );
  if(!$is_ajax){

      if( $search || $select){

      $medias = Media::filterMedias( $search, $select );
  

    }else{
      $medias = Media::allMedias();
    }
    require('view/historyView.php');
  }else{
    echo json_encode(Media::allMedias());
    
  }

}