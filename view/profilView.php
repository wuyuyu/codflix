<?php ob_start(); ?>



    <label><h2><strong>Mon Profil</strong></h2></label></br>
    ( Email actuel:  <?php echo $user['email'] ; ?> )</br></br>

  <form method='post' action="index.php?action=changeProfil" >
  <div class="form-group">
    <input name="paaswordConfirm" class="form-control" id="password"  placeholder="Confirmez votre mot de pass actuel" required></br>
    <label><strong>Modifiez votre Email:</strong> </label></br>
    <input name="newEmail" type="email" class="form-control" id="newEmail" placeholder="Entrez votre nouveau email"></br>

    <label><strong>Modifiez votre mot de passe: </strong></label>
  
    <input name="newPassword" type="password" class="form-control" id="newPassword" placeholder="Entrez votre nouveau mot de pass" required></br>
    
  </div>
<button type="submit" class="btn btn-primary mb-2" id="buttonConfirm"><small>Confirmer la modification</small></button></br>
<button  class="btn btn-danger mb-2"><small>!!!Supprimer votre compte</small></button>
  
  
</form>



<script>
    var formValid = document.getElementById('buttonConfirm');
    var oldPassword = document.getElementById('oldPassword');
    var messagePassword = document.getElementById('messagePassword');

    formValid.addEventListener('click', validation);

    function validation(event){
        //si le champ est vide
        if(oldPassword.validity.valueMissing){
            event.preventDefault();
            messagePassword.textContent = 'mot de pass vide';
            messagePassword.style.color = 'red';
        }
    }

</script>

<?php $content = ob_get_clean(); ?>

<?php require('dashboard.php'); ?>