<?php
function dump($var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}

function color($serveur, $script, $color)
{
    if ($serveur === $script) {
        echo $color;
    }
}

function creneauxHtml(array $creneaux)
{
    $phrases = [];
    if (empty($creneaux)) {
        return "fermer";
    }
    foreach ($creneaux as $creneau) {

        $phrases[] = " Ouvert de <strong>{$creneau[0]}h</strong>  a <strong>{$creneau[1]}h</strong>";
    }
    $phrase = implode(' et ', $phrases);
    return $phrase;
}

function open(int $heure, array $creneaux): bool
{
    foreach ($creneaux as $k => $creneau) {
        dump($creneau);

        $debutMatin = $creneaux[0][0];
        $finMatin = $creneaux[0][1];
        $debutAprem = $creneaux[1][0];
        $finAprem = $creneaux[1][1];
        if (($heure > $debutMatin) && ($heure < $finMatin) || ($heure > $debutAprem) && ($heure < $finAprem)) {

            return true;
        }
        return false;
    }
}
