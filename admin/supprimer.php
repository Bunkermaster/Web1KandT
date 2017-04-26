<?php
/**
 * Created by PhpStorm.
 * User: Yann Le Scouarnec <bunkermaster@gmail.com>
 * Date: 26/04/2017
 * Time: 17:48
 */
require_once dirname(__DIR__)."/connect.php";
if(!isset($_GET['id'])){
    header("Location: index.php");
}
$sql = "DELETE FROM `page` WHERE id = :id LIMIT 1";
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
$stmt->execute();
if ($stmt->errorCode() !== '00000') {
    die($stmt->errorInfo()[2]);
}
header("Location: index.php");
