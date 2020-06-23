<?php

require_once( 'model/media.php' );

/***************************
* ----- LOAD HOME PAGE -----
***************************/

function mediaPage() {
  $search = isset( $_GET['title'] ) ? $_GET['title'] : null;
  if($search!=null){
     $medias = Media::filterMedias( $search );
  }else{
    $medias = Media::allMedias();
  }
  require('view/mediaListView.php');
}

function mediaDetailPage($media_id){
 
  $media = Media::filterMediabyID( $media_id );
  require('view/mediaDetails.php');
}
