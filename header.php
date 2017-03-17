<?php
function amIActive($courant, $slug){
    if($courant == $slug){
        return ' class="active"';
    }
}
$sql = "SELECT `slug`, `nav_title` FROM `page`;";
$nav = $pdo->prepare($sql);
$nav->execute();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <link href="bootstrap/css/bootstrap-theme.min.css" rel="stylesheet">
</head>
<body role="document">
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">WtfWeb</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <?php while($navRow = $nav->fetch(PDO::FETCH_ASSOC)): ?>
                <li<?=amIActive($navRow['slug'], $slug)?>><a href="index.php?page=<?=$navRow['slug']?>"><?=$navRow['nav_title']?></a></li>
                <?php endwhile;?>
            </ul>
        </div>
    </div>
</nav>
<div class="container theme-showcase" role="main">