<?php ob_start(); ?>


    <label><h2><strong>Contactez nous</strong></h2></label>

  <form action="#" method="POST">
  <div class="form-group">
  <?php 
  
  $user_id = isset( $_SESSION['user_id'] ) ? $_SESSION['user_id'] : false;

  
    if(!$user_id){
        echo     '<label for="exampleFormControlInput1">Votre email: </label>
    <input type="email" class="form-control" name="email" placeholder="name@example.com">';

  }else{
    
      echo "Votre email: " . User::getUserById( $user_id )['email'];
  }

  ?>

  </div>

  <div class="form-group">
    <label >Message: </label>
    <textarea class="form-control" name="message" rows="3"></textarea>
  </div>
  <button type="submit" class="btn btn-primary mb-2" name="bouton">Envoyer</button>
  <span id="messageSent"></span>
</form>



  <?php $content = ob_get_clean(); ?>

<?php require('dashboard.php'); ?>