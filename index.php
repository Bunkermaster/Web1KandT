<?php
// je me connecte
require_once "connect.php";
// je recupere la page demandee
if (isset($_GET['page'])) {
    // j'ai la page demandee dans l'url
    $slug = $_GET['page'];
} else {
    // pas de page demandee, j'affiche la page par defaut
    $slug = 'teletubbies';
}
//$slug = $_GET['page'] ?? 'teletubbies';
// je selectionne les donnees dont j'ai besoin
$sql = "SELECT `H1`, `paragraphe`, `img`, `alt` FROM `page` WHERE `slug` = :slug;";
// preparation de la requete
$prep = $pdo->prepare($sql);
// bind de la value de slug
$prep->bindValue(':slug', $slug, PDO::PARAM_STR);
// execution X_x
$prep->execute();
if ($prep->errorCode() != '00000') {
    die($prep->errorInfo()[2]);
}
// recuperation de l'enregistrement
$row = $prep->fetch(PDO::FETCH_ASSOC);
if ($row === false) {
    header("HTTP/1.0 404 Not Found");
    require_once "404.php";
    exit;
}
// si false, pas de donnees, sinon, j'ai une page!!!1
require_once "template.php";