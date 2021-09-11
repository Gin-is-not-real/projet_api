<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
		<?php $base_url = "http://localhost/ACS_project/projet_api/application/"; ?>
        <nav>
            <ul>
                <li>
                    <a href=<?= $base_url . "monsters/index.php" ?>>Monsters</a>
                </li>
                <li>
                    <a href=<?= $base_url . "weapons/index.php" ?>>Weapons</a>
                </li>
                <li>
                    <a href="">Armors</a>
                </li>
            </ul>
        </nav>
    </header>

    <hr>

    <main>
        <?= $content ?>
    </main>

    <script src="../public/scripts/js/script.js"></script>
</body>
</html>