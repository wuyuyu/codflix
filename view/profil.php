<?php ob_start(); ?>

<?php 


  /***************************
  * -------- GET email by user id--------
  ***************************/

 function getUserByID( $user_id ) {

    // Open database connection
    $db   = init_db();

    $req  = $db->prepare( "SELECT * FROM user WHERE id = ? " );
    $req->execute( array($user_id));

    // Close databse connection
    $db   = null;

    return $req->fetch(PDO::FETCH_ASSOC);

  };

  $user = getUserByID($_SESSION["user_id"]);

?>


    <label><h2><strong>Mon Profil</strong></h2></label>

  <form>
  <div class="form-group">
    
    <label for="exampleFormControlInput1"><strong>Modifiez votre mot de passe: </strong></label>
    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Confirmez votre mot de pass actuel"></br>
    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Entrez votre nouveau mot de pass"></br>
    
    <label for="exampleFormControlInput1"><strong>Modifiez votre Email:</strong> ( mail actuel:  <?php echo $user['email'] ; ?> ) </label></br>
  
    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="Entrez votre nouveau email"></br>
  </div>
<button type="submit" class="btn btn-primary mb-2"><small>Confirmer la modification</small></button></br>
<button type="submit" class="btn btn-danger mb-2"><small>!!!Supprimer votre compte</small></button>
  
  
</form>

  <?php $content = ob_get_clean(); ?>

<?php require('dashboard.php'); ?>