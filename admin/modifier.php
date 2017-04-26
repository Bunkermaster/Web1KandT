<?php
/**
 * Created by PhpStorm.
 * User: Yann Le Scouarnec <bunkermaster@gmail.com>
 * Date: 26/04/2017
 * Time: 17:06
 */
require_once dirname(__DIR__)."/connect.php";
if(count($_POST) > 0){
    // traiter le POST
    $sql = "UPDATE 
              `page` 
            SET 
              `slug`=:slug,
              `nav_title`=:navtitle,
              `img`=:img,
              `alt`=:alt,
              `H1`=:H1,
              `paragraphe`=:paragraphe
            WHERE `id` = :id
            LIMIT 1
            ;";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':slug', $_POST['slug'], PDO::PARAM_STR);
    $stmt->bindValue(':navtitle', $_POST['nav_title'], PDO::PARAM_STR);
    $stmt->bindValue(':H1', $_POST['H1'], PDO::PARAM_STR);
    $stmt->bindValue(':paragraphe', $_POST['paragraphe'], PDO::PARAM_STR);
    $stmt->bindValue(':alt', $_POST['alt'], PDO::PARAM_STR);
    $stmt->bindValue(':img', $_POST['img'], PDO::PARAM_STR);
    $stmt->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
    $stmt->execute();
    if ($stmt->errorCode() !== '00000') {
        die($stmt->errorInfo()[2]);
    }
    header("Location: index.php");
} else {
    if(!isset($_GET['id'])){
        header("Location: index.php");
    }
    // recuperation des donnees
    $sql = "SELECT `id`, `slug`, `nav_title`, `H1`, `paragraphe`, `img`, `alt` FROM `page` WHERE `id` = :id;
";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
    $stmt->execute();
    if ($stmt->errorCode() !== '00000') {
        die($stmt->errorInfo()[2]);
    }
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    if(false === $data){
        header("Location: index.php");
    }
    // afficher le formulaire
    $texteDuBouton = "Modifier";
    require_once "form-page.php";
}
