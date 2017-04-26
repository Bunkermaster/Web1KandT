<?php
/**
 * Created by PhpStorm.
 * User: Yann Le Scouarnec <bunkermaster@gmail.com>
 * Date: 25/04/2017
 * Time: 11:36
 */
// @todo rajouter un lien vers les pages du front office dans action
//require_once "../connect.php";
require_once dirname(__DIR__)."/connect.php";
// requete de recuperation du compteur de pages en base
$sql = "SELECT count(*) as compteur FROM `page`;";
// preparation du compteur
$stmt = $pdo->prepare($sql);
// execution
$stmt->execute();
// test
if ($stmt->errorCode() != '00000') {
    die($stmt->errorInfo()[2]);
}
// recuperation de la valeur du compteur
$row = $stmt->fetch(PDO::FETCH_ASSOC);
// $count contient le nombre d'enregistrements en base
$count = $row['compteur'];
// recuperation des pages
$sql = "SELECT `id`, `slug`, `nav_title`, `H1`, `paragraphe`, `img`, `alt` FROM `page`;";
$stmt = $pdo->prepare($sql);
$stmt->execute();
if ($stmt->errorCode() != '00000') {
    die($stmt->errorInfo()[2]);
}

?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Liste des pages</title>
</head>
<body>
<h1>Liste des pages</h1>
<p><a href="ajouter.php">+Ajout</a></p>
<table>
    <tr>
        <th>ID</th>
        <th>Slug</th>
        <th>Action</th>
    </tr>
    <?php if ($count > 0) :?>
    <?php while($row = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
    <tr>
        <td><?= $row['id']?></td>
        <td><?= $row['slug']?></td>
        <td>
            <a href="../index.php?page=<?=$row['slug']?>" target="_blank">Voir</a>
            <a href="modifier.php?id=<?=$row['id']?>">Modifier</a>
            <a href="supprimer.php?id=<?=$row['id']?>">Supprimer</a>
        </td>

    </tr>
    <?php endwhile; ?>
    <?php else:?>
        <td colspan="3">Pas de pages</td>
    <?php endif;?>
</table>
</body>
</html>
