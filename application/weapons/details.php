<?php
if(session_id() == '') {
    session_start();
}
$route = $_SESSION['base-url'] . 'api/weapons/';
$weapons = json_decode(file_get_contents($route . $_GET['field'] . "/" . $_GET['value']));

// $weapons = json_decode(file_get_contents("http://localhost/ACS_project/projet_api/api/weapons/" . $_GET['field'] . "/" . $_GET['value']));

ob_start();
?>

<h1><?php echo($weapons[0])->name_en ;?></h1>

<?php
$content = ob_get_clean();
require_once("../template.php");
?>