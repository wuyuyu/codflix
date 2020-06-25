<?php ob_start(); ?>

<div class="row">
    <div class="col-md-3 offset-md-9">
        <form method="post">
            <div class="form-group has-btn">
                <input type="button" name="deleteAll" class="btn  btn-danger" value="Supprimer tous mon historique"></input>
            </div>
        </form>
    </div>
</div>
<h3>Historique de visionnage:</h3>
<div class="media-list">
    <?php foreach( $historys as $history ): ?>
        <a class="item" href="/CodFlix?media=<?= $history['id']; ?>">
            <div class="video">
                <div>
                    <iframe allowfullscreen="" frameborder="0"
                            src="<?= $media['trailer_url']; ?>" ></iframe>
                </div>
            </div>
            <div class="title"><?= $media['title']; ?></div>
            <div class="title"><small>Date de sortie: <?= $media['release_date']; ?></small></div>
            <button class="btn btn-primary" name="detail">Détails Média</button>
            <button class="btn btn-danger" name="deleteOne">Surprimer cette média</button>
            </a>
            
        
    <?php endforeach; ?>
</div>




<?php $content = ob_get_clean(); ?>

<?php require('dashboard.php'); ?>
