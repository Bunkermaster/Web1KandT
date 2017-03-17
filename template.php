<?php require "header.php";?>
        <div class="jumbotron">
            <h1><?=$row['H1']?></h1>
            <p><?=$row['paragraphe']?></p>
        </div>
        <img class="img-thumbnail" alt="<?=$row['alt']?>" src="img/<?=$row['img']?>" data-holder-rendered="true">
<?php require "footer.php";?>
