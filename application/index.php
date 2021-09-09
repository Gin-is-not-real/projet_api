<?php
ob_start();
?>
<h1>Je sais pas quoi mettre</h1>
<div id="div_link">
	<a href="">Voir tout les monstes</a>
</div>
<?php
$content = ob_get_clean();
require_once("template.php");