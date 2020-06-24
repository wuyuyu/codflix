<?php

function contact()
{
    require('view/contactView.php');   

    if (isset($_POST['email']) || isset($_POST['message'])) {
        
        $mail = htmlentities($_POST['email']);
        $message = htmlentities($_POST['message']);
        $headers = "Vous avez une message de : ". $mail;

        
    };
    
    mail('contact@codflix.com', 'Formulaire de contact', $message, $headers);
    
    if(isset($_POST['bouton'])){
        echo '
        <script type="text/javascript">
        alert("votre message a été bien envoyé avec succès! ");
        </script>';
    }

}