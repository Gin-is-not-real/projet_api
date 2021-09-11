<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php 
    if(session_id() == '') {
        session_start();
    }
    // $base_url = 'http://localhost/FOLDERS/FORM_PROJETS/form_projet_api/projet_api/application/';
?>
<body>
    <header>
        <nav>
            <ul>
                <li>
                    <a href="<?= $_SESSION['base-url'] . 'application/' ?>index.php?action=monsters">monstres</a>
                </li>
                <li>
                    <a href="<?= $_SESSION['base-url'] . 'application/' ?>index.php?action=weapons">armes</a>

                </li>
                <li>
                    <a href="<?= $_SESSION['base-url'] . 'application/' ?>index.php?action=armors">armures</a>

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