<?php
require_once 'config.php';
require_once 'function.php';
date_default_timezone_set('Europe/Paris');
$heures = (int) ($_GET['heure']  ?? date("G"));
$jours = date("N") - 1;
$jour = (int) ($_GET['jour']  ?? $jours);
$ouverture = CRENEAUX[$jours];

$ouvert = open($heures, $ouverture);
$creneaux = creneauxHtml(CRENEAUX);

$color = 'green';
if (!$ouvert) {
    $color = 'red';
}

require 'header.php';
?>

<br>
<div class="container">
    <div class="row">
        <div class="col-6">
            <div id="carouselExample" class="carousel slide">
                <div class="carousel-inner">

                    <?php foreach (ARTICLES as $k => $article) : ?>
                        <div class="carousel-item active">
                            <img src="/img/<?= $article["img"] ?>.jpg " class="d-block w-100" alt="...">
                        </div>
                    <?php endforeach ?>

                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
        </div>

        <div class="col-4">

            <h2>Horaires d'ouverture</h2>

            <form action="/magasin.php" method="GET">

                <?php if ($ouvert) : ?>
                    <div class="alert alert-success"> Magasin ouvert </div>
                <?php else : ?>
                    <div class="alert alert-danger"> Magasin fermer </div>
                <?php endif ?>

                <div class="form-group">
                    <select name="jour" id="" class="form-control">
                        <?php foreach (JOURS as $k => $jour) : ?>
                            <option value="<?= $k ?>"><?= $jour ?></option>
                        <?php endforeach ?>
                    </select>
                    <br>

                    <div class="form-croup">
                        <input class="form-control" type="number" name="heure" value="<?= $heures ?>">
                    </div>
                </div>

                <br> <button type="submit" class="btn btn-success">voir si le magasin est ouvert </button>
            </form>

            <?php foreach (JOURS as $key => $jour) : ?>
                <li <?php if ((int)date('N') === $key + 1) : ?> style="color:<?= $color ?>" <?php endif ?>><?= '<strong>' . $jour . "</strong>" ?> <?= creneauxHtml(CRENEAUX[$key]) ?> </li>
            <?php endforeach ?>

        </div>
    </div>

    <?php require 'footer.php' ?>