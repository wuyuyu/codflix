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


    <label><h2><strong>Profil</strong></h2></label>

  <form>
  <div class="form-group">
    <label for="exampleFormControlInput1">Votre email actuel:  <?php echo $user['email'] ; ?></label>
  
    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">
  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Message: </label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-primary mb-2">Envoyer</button>
</form>

  <?php $content = ob_get_clean(); ?>

<?php require('dashboard.php'); ?>