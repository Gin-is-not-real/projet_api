<?php

if(session_id() == '') {
    session_start();
}

ob_start();
$route = $_SESSION['base-url'] . 'api/armors/set';

$route .= '/' . $_GET['field'] . '/' . $_GET['value'];

$set = json_decode(file_get_contents($route));
// var_dump($set);
// foreach($set as $elm)
// {
	$route_test = $_SESSION['base-url'] . 'api/armors/name_en/' . $set[0]->head;
	$res_test = json_decode(file_get_contents($route_test));
	var_dump($res_test);
// }
?>



<?php
$content = ob_get_clean();
require_once("../template.php");