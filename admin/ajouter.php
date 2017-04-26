<?php
/**
 * Created by PhpStorm.
 * User: Yann Le Scouarnec <bunkermaster@gmail.com>
 * Date: 26/04/2017
 * Time: 14:52
 */
require_once dirname(__DIR__)."/connect.php";

if(count($_POST) > 0 && !checkSlug($_POST['slug'], $pdo)){
    // formulaire a ete poste
    $sql = "INSERT INTO 
              `page`
            (`slug`, `nav_title`, `H1`, `paragraphe`, `img`, `alt`) 
            VALUES 
            (:slug, :navtitle, :H1, :paragraphe, :img, :alt)
            ;";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':slug', $_POST['slug']);
    $stmt->bindValue(':navtitle', $_POST['nav_title']);
    $stmt->bindValue(':H1', $_POST['H1']);
    $stmt->bindValue(':paragraphe', $_POST['paragraphe']);
    $stmt->bindValue(':img', $_POST['img']);
    $stmt->bindValue(':alt', $_POST['alt']);
    $stmt->execute();
    if ($stmt->errorCode() !== '00000') {
        die($stmt->errorInfo()[2]);
    }
    header("Location: index.php");
} else {
    // j'affiche le formulaire
?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Document</title>
    </head>
    <body>
<?php
$data = $_POST;
require_once "form-page.php";
?>
    </body>
    </html>
<?php
}