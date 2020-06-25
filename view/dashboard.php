<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Cod'Flix</title>

    <link href="public/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="public/lib/font-awesome/css/all.min.css" rel="stylesheet" />

    <link href="public/css/partials/partials.css" rel="stylesheet" />
    <link href="public/css/layout/layout.css" rel="stylesheet" />
  </head>


  <body>
    <div class="wrapper d-flex align-items-stretch">
      <nav id="sidebar">
        <h2 class="title">Bienvenue</h2>
        <div class="sidebar-menu">
          <ul>
            <li class="active"><a href="/CodFlix/">Médias</a></li>
            <li><a href="index.php?action=history">Historique</a></li>
            <?php 
             $user_id = isset( $_SESSION['user_id'] ) ? $_SESSION['user_id'] : false;
            if($user_id){?>
            <li><a href="index.php?action=profil">Mon profil</a></li>
            <li><a href="index.php?action=logout">Me déconnecter</a></li>
            <li><a href="index.php?action=contact">Nous contacter</a></li>
            <?php }; ?>

          </ul>
        </div>
      </nav>


        <!-- Page Content  -->
      <div id="content">
        <div class="header">
          <h2 class="title">Cod<span>'Flix</span></h2>
          <div class="toggle-menu d-block d-md-none">
            <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fas fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
          </div>
        </div>
        <div class="content p-4">
          <?= $content; ?>
        </div>
        <footer>Copyright Cod'Flix</footer>
      </div>
    </div>

    <script src="public/lib/jquery/js/jquery-3.5.0.min.js"></script>
    <script src="public/lib/bootstrap/js/bootstrap.min.js"></script>

    <script src="public/js/script.js"></script>
    <script>

// récupérer les données via une requette Ajax depuis une url
/*
$(document).ready(function(){
  alert("11111111");
});
*/
  $(document).on("change", "#critereSelect", function(){

    $.get("http://localhost:800/CodFlix/")
    .done(function(data){
        if(data.error)
        {
            return;
        }
       //console.log(typeof data );
        if($("#critereSelect").val() === "genre_id"){
          $.each(JSON.parse(data), function(i,item){
            $("#listCritereSelect").append("<option>" + item.genre_id + "</option>");

            //console.log(item);
          });
          
        }
        console.log(data);
    })
    .fail(function(xhr){
        if(xhr.status === 0)
        {
            return;
        }

    })
    .always(function(){

    });
  });
    



</script>
  </body>

</html>
