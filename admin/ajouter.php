<?php
/**
 * Created by PhpStorm.
 * User: Yann Le Scouarnec <bunkermaster@gmail.com>
 * Date: 26/04/2017
 * Time: 14:52
 */
require_once dirname(__DIR__)."/connect.php";
if(count($_POST) > 0){
    // formulaire a ete poste
    var_dump($_POST);
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
            <label for="slug"></label><br>
            <input type="email" name="slug" id="slug" placeholder="slug">
        </p>
        <p>
            <input type="submit" value="ajouter">
        </p>
    </form>
    </body>
    </html>
<?php
}