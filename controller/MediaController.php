<?php

require_once( 'model/media.php' );

/***************************
* ----- LOAD HOME PAGE -----
***************************/

function mediaPage() {
  $medias = Media::allMedias();

  $search = isset( $_GET['title'] ) ? $_GET['title'] : null;
  if($search!=null){
     $medias = Media::filterMedias( $search );
  }
 

  require('view/mediaListView.php');

}
