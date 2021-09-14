<?php
if(session_id() == '') {
    session_start();
}
$route = $_SESSION['base-url'] . 'api/monsters/id/' . $_GET['id'];
$m_details = json_decode(file_get_contents($route));

ob_start();
?>

<h1><?= $m_details[0]->name_en ?></h1>

<div id="m_info_box">
	<div id="pctr">
		<img src="../public/images/monsters/<?= $m_details[0]->main_id ?>.png">
	</div>
</div>

<?php
$content = ob_get_clean();
require_once('../template.php');
?>