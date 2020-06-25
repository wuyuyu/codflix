<?php

require_once( 'database.php' );

class Media {

  protected $id;
  protected $genre_id;
  protected $title;
  protected $type;
  protected $status;
  protected $release_date;
  protected $summary;
  protected $trailer_url;

  public function __construct( $media ) {

    $this->setId( isset( $media->id ) ? $media->id : null );
    $this->setGenreId( $media->genre_id );
    $this->setTitle( $media->title );
  }

  /***************************
  * -------- SETTERS ---------
  ***************************/

  public function setId( $id ) {
    $this->id = $id;
  }

  public function setGenreId( $genre_id ) {
    $this->genre_id = $genre_id;
  }

  public function setTitle( $title ) {
    $this->title = $title;
  }

  public function setType( $type ) {
    $this->type = $type;
  }

  public function setStatus( $status ) {
    $this->status = $status;
  }

  public function setReleaseDate( $release_date ) {
    $this->release_date = $release_date;
  }

  /***************************
  * -------- GETTERS ---------
  ***************************/

  public function getId() {
    return $this->id;
  }

  public function getGenreId() {
    return $this->genre_id;
  }

  public function getTitle() {
    return $this->title;
  }

  public function getType() {
    return $this->type;
  }

  public function getStatus() {
    return $this->status;
  }

  public function getReleaseDate() {
    return $this->release_date;
  }

  public function getSummary() {
    return $this->summary;
  }

  public function getTrailerUrl() {
    return $this->trailer_url;
  }

  /***************************
  * -------- GET LIST by title: searche bar --------
  ***************************/

  public static function filterMedias( $title, $select) {

    // Open database connection
    $db   = init_db();
    switch ($select){
      case "genre_id":
        $req  = $db->prepare( "SELECT * FROM media WHERE title = ? AND genre_id = ? ORDER BY release_date DESC" );
        $req->execute( array($title, $select));
        break;
      case "release_date":
        $req  = $db->prepare( "SELECT * FROM media WHERE title LIKE '$title%' AND release_date ORDER BY release_date DESC" );
        $req->execute( array($title));
        break;
      case "type":
        $req  = $db->prepare( "SELECT * FROM media WHERE title LIKE '$title%' AND 'type' ORDER BY release_date DESC" );
        $req->execute( array($title));
        break;
      default:  
        $req  = $db->prepare( "SELECT * FROM media WHERE title LIKE '$title%' ORDER BY release_date DESC" );
        $req->execute( array($title));
      }    

    // Close databse connection
    $db   = null;

    return $req->fetchAll();

  }
  /***************************
  * -------- GET LIST of all medias --------
  ***************************/

  public static function allMedias() {

    // Open database connection
    $db   = init_db();

    $req  = $db->prepare( "SELECT * FROM media ORDER BY release_date DESC" );
    $req->execute();

    // Close databse connection
    $db   = null;

    return $req->fetchAll();

  }

  /***************************
  * -------- GET one media by media id--------
  ***************************/

  public static function filterMediabyID( $media_id ) {

    // Open database connection
    $db   = init_db();

    $req  = $db->prepare( "SELECT * FROM media WHERE id = ? " );
    $req->execute( array($media_id));

    // Close databse connection
    $db   = null;

    return $req->fetch(PDO::FETCH_ASSOC);

  }

  
    /***************************
  * -------- GET LIST of medias suggest--------
  Vous étudierez les critères suivants :
Regarde t’il plus de série ou de film ?
○ Quel genre regarde t il le plus souvent?

○ Quel genre de film/série a t il regardé mais pas terminé ? Dans ce cas là vous
exclurez ces genre de film et série de vos propositions
  ***************************/

  public static function filterMediaSuggest() {

    // Open database connection
    $db   = init_db();

    $req  = $db->prepare( "SELECT * FROM media LIMIT 4 " );
    $req->execute();

    // Close databse connection
    $db   = null;

    return $req->fetchAll();

  }

}
