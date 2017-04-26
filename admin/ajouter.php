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
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <p>
            <label for="slug">Slug</label><br>
            <input type="text" name="slug" id="slug" placeholder="slug" value="<?=$_POST['slug'] ?? ''?>">
        </p>
        <p>
            <label for="h1">h1</label><br>
            <input type="text" name="H1" id="H1" placeholder="h1" value="<?=$_POST['H1'] ?? ''?>">
        </p>
        <p>
            <label for="nav_title">nav_title</label><br>
            <input type="text" name="nav_title" id="nav_title" placeholder="nav_title" value="<?=$_POST['nav_title'] ?? ''?>">
        </p>
        <p>
            <label for="paragraphe">paragraphe</label><br>
            <textarea name="paragraphe" id="" cols="30" rows="10" placeholder="paragraphe"><?=$_POST['paragraphe'] ?? ''?></textarea>
        </p>
        <p>
            <label for="img">img</label><br>
            <input type="text" name="img" id="img" placeholder="img" value="<?=$_POST['img'] ?? ''?>">
        </p>
        <p>
            <label for="alt">alt</label><br>
            <input type="text" name="alt" id="alt" placeholder="alt" value="<?=$_POST['alt'] ?? ''?>">
        </p>
        <p>
            <input type="submit" value="ajouter">
        </p>
    </form>
    </body>
    </html>
<?php
}