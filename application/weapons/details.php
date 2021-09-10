<?php
$url = "http://localhost/ACS_project/projet_api/api/weapons/id/" . $_GET['value'];
$weap_details = json_decode(file_get_contents($url));
// $weap_craft = json_decode(file_get_contents("http://localhost/ACS_project/projet_api/api/weapons/name_en/" . $weapon[0]->name_en));
ob_start();
// var_dump(($weap_craft));
?>

<h1><?= ($weap_details[0])->name_en ;?></h1>

<?php foreach ($weap_details as $elm) { ?>
<div class="upg_box">
	<h2><?= "To " . lcfirst($elm->type) . ($elm->type == "Create" ? '' : " from " . $elm->previous_en)?></h2>
	<p><?= $elm->item1_name . " (x" . $elm->item1_qty . ")" ?></p>
	<p><?= $elm->item2_name . " (x" . $elm->item2_qty . ")" ?></p>
	<p><?= $elm->item3_name . " (x" . $elm->item3_qty . ")" ?></p>
	<p><?= $elm->item4_name . " (x" . $elm->item4_qty . ")" ?></p>
</div>
<?php } ?>
<div id="detail_box">
	<h2>Details</h2>
	<p>Damage: <?= ' ' . $weap_details[0]->attack ?></p>
	<p>Affinity: <?= ' ' . $weap_details[0]->affinity . " %"?></p>
	<p>Element:
		<?= ' ' . $weap_details[0]->element1 .
		($weap_details[0]->element1 != '' ? (" (" . $weap_details[0]->element1_attack . ")" .
		" <img src='../public/images/ui/element_" . $weap_details[0]->element1 . ".svg' width='25px'/>") : 'none' ) ?>
	</p>
	<p>Gem slot:
		<?= ($elm->slot_1 != 0 ? "<img src='../public/images/ui/gem_" . $elm->slot_1 . "_empty.svg' width='25px'/>" : '') ?>
		<?= ($elm->slot_2 != 0 ? "<img src='../public/images/ui/gem_" . $elm->slot_2 . "_empty.svg' width='25px'/>" : '') ?>
		<?= ($elm->slot_3 != 0 ? "<img src='../public/images/ui/gem_" . $elm->slot_3 . "_empty.svg' width='25px'/>" : '') ?>
	</p>
</div>

<?php
$content = ob_get_clean();
require_once("../template.php");
?>