<?php
if(session_id() == '') {
    session_start();
}
$route = $_SESSION['base-url'] . 'api/armors/id/' . $_GET['id'];
$armor_details = json_decode(file_get_contents($route));
ob_start();
?>
<link rel="stylesheet" href="../../public/style/weapons_details.css" />

<?php if (isset($armor_details[0])) {
?>

<h1><?= ($armor_details[0])->name_en; ?></h1>

<div id="master_container">
    <div id="detail_box">
        <h2>Details</h2>
        <p>Rarity: <?= ' ' . $weap_details[0]->rarity ?></p>
        <p>Defense base: <?= ' ' . $weap_details[0]->defense_base ?></p>
        <p>Defense Max: <?= ' ' . $weap_details[0]->defense_max ?></p>
        <p>Defense Fire: <?= ' ' . $weap_details[0]->defense_fire ?></p>
        <p>Defense water: <?= ' ' . $weap_details[0]->defense_water ?></p>
        <p>Defense thunder: <?= ' ' . $weap_details[0]->defense_thunder ?></p>
        <p>Defense water: <?= ' ' . $weap_details[0]->defense_water ?></p>
        <p>Defense ice: <?= ' ' . $weap_details[0]->defense_ice ?></p>
        <p>Defense dragon: <?= ' ' . $weap_details[0]->defense_dragon ?></p>

    </div>
</div>
<?php
}
?>

<?php
$content = ob_get_clean();
require_once("../template.php");
?>