<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="../../public/style/header.css" />
	<link rel="icon" href="../../public/images/pctr/hunter_notes.svg"/>
    <title>MHW Library</title>
</head>
<?php 
    if(session_id() == '') {
        session_start();
    }
?>
<body>
    <header>
		<nav>
			<ul>
				<li id="home">
					<a href="<?= $_SESSION['base-url'] . 'application/' ?>">Accueil</a>
				</li>
				<li>
					<a href="<?= $_SESSION['base-url'] . 'application/' ?>index.php?action=monsters">Monstres</a>
                </li>
                <li>
					<a href="<?= $_SESSION['base-url'] . 'application/' ?>index.php?action=weapons">Armes</a>
                </li>
                <li>
					<a href="<?= $_SESSION['base-url'] . 'application/' ?>index.php?action=armors">Armures</a>
                </li>
            </ul>
        </nav>
    </header>

    <hr>

    <main>
        <?= $content ?>
    </main>

    <script src="../../public/scripts/js/subSelectFields.js"></script>
    <script src="../../public/scripts/js/script.js"></script>
    <!-- <script src="../public/scripts/js/ajax.js"></script> -->
</body>
</html>