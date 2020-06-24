<?php ob_start(); ?>


<div>   
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">
	<div class="container">
		<div class="card">
			<div class="container-fliud">
				<div class="wrapper row">
					<div class="preview col-md-6">
                    <iframe allowfullscreen="" frameborder="0"
                            src="<?= $media['trailer_url']; ?>" ></iframe>
						
				
					</div>
					<div class="details col-md-6">
                    <p class="vote"><strong>ID: <?php echo $media['id'];?></strong></p>
						<h3 class="product-title">Titre: <?php echo $media['title'];?></h3>
                        
						<h4 class="price">Type: <span><?php echo $media['type'];?></span></h4>
                        <h4 class="price">Genre: <span><?php echo $media['genre_id'];?></span></h4>
						
            <p class="vote"><strong>Status: <?php echo $media['status'];?></strong></p>
           
            <p class="vote">Date de sortie: <?php echo $media['release_date'];?></p>
           
  					<div class="action">
          
              <p class="product-description"><?php echo $media['summary'];?></p>
						</div>
					</div>
				</div>
			</div>
		</div>
    </div>
    
    <div class="media-list">
    <?php foreach( $medias as $media ): ?>
        <a class="item" href="/CodFlix?media=<?= $media['id']; ?>">
            <div class="video">
                <div>
                    <iframe allowfullscreen="" frameborder="0"
                            src="<?= $media['trailer_url']; ?>" ></iframe>
                </div>
            </div>
            <div class="title"><?= $media['title']; ?></div>
            <div class="title"><small>Date de sortie: <?= $media['release_date']; ?></small></div>
        </a>
    <?php endforeach; ?>
</div>

    </div>

    //var_dump($media);


<?php echo $media['id'];?>
<?php $content = ob_get_clean(); ?>

<?php require('dashboard.php'); ?>