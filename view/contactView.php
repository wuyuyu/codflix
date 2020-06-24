<?php ob_start(); ?>


    <label><h2><strong>Contactez nous</strong></h2></label>

  <form>
  <div class="form-group">
  <?php 
  
  $user_id = isset( $_SESSION['user_id'] ) ? $_SESSION['user_id'] : false;

  
    if(!$user_id){
        echo     '<label for="exampleFormControlInput1">Votre email: </label>
    <input type="email" class="form-control" id="exampleFormControlInput1" placeholder="name@example.com">';

  }else{
    
      echo "Votre email: " . User::getUserById( $user_id )['email'];
  }

  ?>

  </div>

  <div class="form-group">
    <label for="exampleFormControlTextarea1">Message: </label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-primary mb-2">Envoyer</button>
</form>

  <?php $content = ob_get_clean(); ?>

<?php require('dashboard.php'); ?>