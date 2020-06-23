<?php ob_start(); ?>


    <label><h2><strong>Contactez nous</strong></h2></label>

  <form>
  <div class="form-group">
    <label for="exampleFormControlInput1">Votre email: </label>
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