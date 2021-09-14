<?php
require 'session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div style="color: red">
        <div>QUERY_STRING</div>
        <?= $_SERVER['QUERY_STRING'] ?>
    </div>

    <hr>

    <div>
        <div><a href="<?=$_SESSION['base-url']?>/application">HOME</a></div>
        <div><a href="<?=$_SESSION['base-url']?>/application/index.php?action=posts">../api/index.php?action=posts</a></div>
        <div><a href="<?=$_SESSION['base-url']?>/application/index.php?action=post&id=291">../api/index.php?action=post&id=291</a></div>
    </div>

<hr>

    <div>
        <?= $content ?>
    </div>
</body>
</html>