<?php
/**
 * Created by PhpStorm.
 * User: Yann Le Scouarnec <bunkermaster@gmail.com>
 * Date: 26/04/2017
 * Time: 17:03
 */
?>
<form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
    <input type="hidden"name="id" value="<?=$data['id'] ?? ''?>">
    <p>
        <label for="slug">Slug</label><br>
        <input type="text" name="slug" id="slug" placeholder="slug" value="<?=$data['slug'] ?? ''?>">
    </p>
    <p>
        <label for="h1">h1</label><br>
        <input type="text" name="H1" id="H1" placeholder="h1" value="<?=$data['H1'] ?? ''?>">
    </p>
    <p>
        <label for="nav_title">nav_title</label><br>
        <input type="text" name="nav_title" id="nav_title" placeholder="nav_title" value="<?=$data['nav_title'] ?? ''?>">
    </p>
    <p>
        <label for="paragraphe">paragraphe</label><br>
        <textarea name="paragraphe" id="" cols="30" rows="10" placeholder="paragraphe"><?=$data['paragraphe'] ?? ''?></textarea>
    </p>
    <p>
        <label for="img">img</label><br>
        <input type="text" name="img" id="img" placeholder="img" value="<?=$data['img'] ?? ''?>">
    </p>
    <p>
        <label for="alt">alt</label><br>
        <input type="text" name="alt" id="alt" placeholder="alt" value="<?=$data['alt'] ?? ''?>">
    </p>
    <p>
        <input type="submit" value="<?=$texteDuBouton ?? 'Ajouter'?>">
    </p>
</form>

