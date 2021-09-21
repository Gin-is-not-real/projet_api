<?php
if(session_id() == '') {
    session_start();
}
$route = $_SESSION['base-url'] . 'api/weapons/id/' . $_GET['id'];
$weap_details = json_decode(file_get_contents($route));

ob_start();
?>
<link rel="stylesheet" href="../../public/style/weapons_details.css" />

<?php if (isset($weap_details[0])) {?>
<h1><?= ($weap_details[0])->name_en ;?></h1>

<div id="master_container">
	<div id="detail_box">
		<h2>Details</h2>
		<p>Damage: <?= ' ' . $weap_details[0]->attack ?></p>
		<p>Affinity: <?= ' ' . $weap_details[0]->affinity . " %"?></p>
		<p>Element:
			<?= ' ' . $weap_details[0]->element1 .
			($weap_details[0]->element1 != '' ? (" (" . $weap_details[0]->element1_attack . ")" .
			" <img src='../../public/images/ui/element_" . $weap_details[0]->element1 . ".svg' width='25px'/>") : 'None' ) ?>
		</p>
		<p>Gem slot:
			<?= ($weap_details[0]->slot_1 != 0 ? "<img src='../../public/images/ui/gem_" . $weap_details[0]->slot_1 . "_empty.svg' width='25px'/>" : 'None') ?>
			<?= ($weap_details[0]->slot_2 != 0 ? "<img src='../../public/images/ui/gem_" . $weap_details[0]->slot_2 . "_empty.svg' width='25px'/>" : '') ?>
			<?= ($weap_details[0]->slot_3 != 0 ? "<img src='../../public/images/ui/gem_" . $weap_details[0]->slot_3 . "_empty.svg' width='25px'/>" : '') ?>
		</p>
	</div>
	<?php foreach ($weap_details as $elm) { ?>
	<div class="upg_box">
		<h2><?= "To " . lcfirst($elm->type) . ($elm->type == "Create" ? '' : " from " . $elm->previous_en)?></h2>
		<p><?= ($elm->item1_name != '' ? $elm->item1_name . " (x" . $elm->item1_qty . ")" : 'None') ?></p>
		<p><?= ($elm->item2_name != '' ? $elm->item2_name . " (x" . $elm->item2_qty . ")" : 'None') ?></p>
		<p><?= ($elm->item3_name != '' ? $elm->item3_name . " (x" . $elm->item3_qty . ")" : 'None') ?></p>
		<p><?= ($elm->item4_name != '' ? $elm->item4_name . " (x" . $elm->item4_qty . ")" : 'None') ?></p>
	</div>
	<?php } ?>
</div>
<?php 
	}
	else
	{
		echo "<h1>No where</h1>";
		echo "<div id='special_case'>";
		echo "<p>Gold, Taroth, Kj&aacuterr and Safi weapons cannot be crafted. They are only drop by </br>completing the special quest of Kulve Taroth and Safi'jiiva.</p>";
		echo "</div>";
	}
?>

<?php
$content = ob_get_clean();
require_once("../template.php");
?>