<?php
function amIActive($courant){
    if('/'.$courant == $_SERVER['PHP_SELF']){
        return ' class="active"';
    }
}
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
            <a class="navbar-brand" href="template.php">WtfWeb</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li<?=amIActive("template.php")?>><a href="template.php">Teletubbies</a></li>
                <li<?=amIActive("kittens.php")?>><a href="kittens.php">Kittens</a></li>
                <li<?=amIActive("ironmaiden.php")?>><a href="ironmaiden.php">Iron Maiden</a></li>
                <li<?=amIActive("16horsepower.php")?>><a href="16horsepower.php">16 Horse power</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container theme-showcase" role="main">