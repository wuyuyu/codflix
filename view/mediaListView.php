<?php ob_start(); ?>

<div class="row">
    <div class="col-md-6 offset-md-6">
        <form method="get">
            <div class="form-group has-btn">
                <select id="critereSelect" name="critereSelect" >

                    <option value="">Filtrer:</option>
                    <option value="genre_id">genre</option>
                    <option value="release_date">date de sortie</option>
                    <option value="type">type</option>
                   
                </select>
                <select id="listCritereSelect" name="listCritereSelect" >



                </select>
                <input type="search" id="search" name="title" value="<?= $search; ?>" class="form-control"
                       placeholder="Rechercher un film ou une série">

                <button type="submit" class="btn btn-block bg-red">Valider</button>
            </div>
        </form>
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




<?php $content = ob_get_clean(); ?>

<?php require('dashboard.php'); ?>
