<?php
require 'config.php';
require 'header.php';


?>
<br>
<div class="container">
    <div class="row">
        <?php foreach (ARTICLES as $k => $article) : ?>
            <div class="col">
                <div class="card" style="width: 18rem;">
                    <img src="/img/<?= $article["img"]?>.jpg " class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5> <?= $article["titre"] ?></h5>
                        <p class="card-text"><?= $article["article"] ?></p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>

        <?php endforeach ?>

    </div>
</div>


<?php require 'footer.php' ?>