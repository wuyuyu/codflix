<?php

require_once( 'model/media.php' );

/***************************
* ----- LOAD HOME PAGE -----
***************************/

function mediaPage() {
  $search = isset( $_GET['title'] ) ? $_GET['title'] : null;
  $select = isset($_GET['critereSelect']) ? $_GET['critereSelect'] : null;

  $is_ajax = 'xmlhttprequest' == strtolower( $_SERVER['HTTP_X_REQUESTED_WITH'] ?? '' );
  if(!$is_ajax){

      if( $search || $select){

      $medias = Media::filterMedias( $search, $select );
  

    }else{
      $medias = Media::allMedias();
    }
    require('view/mediaListView.php');
  }else{
    echo json_encode(Media::allMedias());
    
  }

}

function mediaDetailPage($media_id){
  $medias = Media::filterMediaSuggest();
 
  $media = Media::filterMediabyID( $media_id );
  require('view/mediaDetails.php');
}

