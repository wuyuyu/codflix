<?php ob_start(); ?>

<div class="row">
    <div class="col-md-3 offset-md-9">
        <a href="/CodFlix?action=deleteAllMedia&user_id=<?= $_SESSION['user_id']; ?>">

            <div class="form-group has-btn">
                <input type="button" name="deleteAll" class="btn  btn-danger" value="Supprimer tous mon historique"></input>
            </div>
        </a>
    </div>
</div>
<h3>Historique de visionnage:</h3>
<div class="media-list">
    <?php foreach( $historys as $history ):  ?>
        <div class="item">
        <a  href="/CodFlix?media=<?= $history['id']; ?>">
            <div class="video">
                <div>
                    <iframe allowfullscreen="" frameborder="0"
                            src="<?= Media::filterMediabyID($history["media_id"])["trailer_url"] ?>" ></iframe>
                </div>
            </div>
            <div class="title"><?= Media::filterMediabyID($history["media_id"])['title']; ?></div>
            <div class="title"><small>Date de sortie: <?= Media::filterMediabyID($history["media_id"])['release_date']; ?></small></div>
            <button class="btn btn-primary" name="detail">Détails</button>

            </a>
            <a  href="/CodFlix?action=deleteOneMedia&media_id=<?= Media::filterMediabyID($history["media_id"])['id'] ?>" class="btn btn-danger"  name="deleteOneMedia" >Surprimer</a>
    </div>
        
    <?php endforeach; ?>
</div>




<?php $content = ob_get_clean(); ?>

<?php require('dashboard.php'); ?>
