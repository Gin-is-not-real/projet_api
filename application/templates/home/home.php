<?php
if(session_id() == '') {
	session_start();
}
ob_start();
?>

<link rel="stylesheet" href="../../public/style/home.css" />
<h1>
	Welcome on the great library
	</br>
	of Monster Hunter World
</h1>
<div id="nav_div">
	<p>Select wich floor do you want to go:</p>
	<div id="link">
		<a href="<?= $_SESSION['base-url'] . 'application/' ?>index.php?action=monsters">Go to monsters</a>
		<a href="<?= $_SESSION['base-url'] . 'application/' ?>index.php?action=weapons">Go to weapons</a>
		<a href="<?= $_SESSION['base-url'] . 'application/' ?>index.php?action=armors">Go to armors</a>
	</div>
</div>


<?php
$content = ob_get_clean();
require_once("../template.php");