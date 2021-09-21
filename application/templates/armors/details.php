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

<h1><?= ($armor_details[0])->name; ?></h1>

<div id="master_container">
	<div id="detail_box">
		<h2>Gobal info</h2>
		<p>Rarity: <?= ' ' . $armor_details[0]->rarity ?></p>
		<p>Defense base: <?= ' ' . $armor_details[0]->def ?></p>
		<p>Defense Max: <?= ' ' . $armor_details[0]->def_max ?></p>
		<p>Defense Mag: <?= ' ' . $armor_details[0]->def_mag ?></p>
		<p>Ailment defense:
			<?= ' ' . $armor_details[0]->def_fire . "<img src='../../public/images/ui/element_fire.svg' width='24px' alt='fire' title='Fire'/>" ?>
			<?= ' ' . $armor_details[0]->def_water . "<img src='../../public/images/ui/element_water.svg' width='24px' alt='water' title='Water'/>" ?>
			<?= ' ' . $armor_details[0]->def_thunder . "<img src='../../public/images/ui/element_thunder.svg' width='24px' alt='thunder' title='Thunder'/>" ?>
			<?= ' ' . $armor_details[0]->def_ice . "<img src='../../public/images/ui/element_ice.svg' width='24px' alt='ice' title='Ice'/>" ?>
			<?= ' ' . $armor_details[0]->def_dragon . "<img src='../../public/images/ui/element_dragon.svg' width='24px' alt='dragon' title='Dragon'/>" ?>
		</p>
		<p>Skill:
			<?= ($armor_details[0]->skill1_name != '' ? $armor_details[0]->skill1_name . '(' . $armor_details[0]->skill1_level . ')' : 'None') ?>
			<?= ($armor_details[0]->skill2_name != '' ? ', ' . $armor_details[0]->skill2_name . '(' . $armor_details[0]->skill2_level . ')' : '') ?>
		</p>
		<p>Gem slot:
			<?= ($armor_details[0]->slot_1 != 0 ? "<img src='../../public/images/ui/gem_" . $armor_details[0]->slot_1 . "_empty.svg' width='25px' alt='gem slot 1' />" : 'None')?>
			<?= ($armor_details[0]->slot_2 != 0 ? "<img src='../../public/images/ui/gem_" . $armor_details[0]->slot_2 . "_empty.svg' width='25px' alt='gem slot 2' />" : '') ?>
			<?= ($armor_details[0]->slot_3 != 0 ? "<img src='../../public/images/ui/gem_" . $armor_details[0]->slot_3 . "_empty.svg' width='25px' alt='gem slot 3' />" : '') ?>
		</p>
	</div>
	<div id="craft_box">
		<h2>To Create</h2>
		<p><?= ($armor_details[0]->item1_name != '' ? $armor_details[0]->item1_name . " (x" . $armor_details[0]->item1_qty . ")" : 'None') ?></p>
		<p><?= ($armor_details[0]->item2_name != '' ? $armor_details[0]->item2_name . " (x" . $armor_details[0]->item2_qty . ")" : 'None') ?></p>
		<p><?= ($armor_details[0]->item3_name != '' ? $armor_details[0]->item3_name . " (x" . $armor_details[0]->item3_qty . ")" : 'None') ?></p>
		<p><?= ($armor_details[0]->item4_name != '' ? $armor_details[0]->item4_name . " (x" . $armor_details[0]->item4_qty . ")" : 'None') ?></p>
	</div>
</div>
<?php
}
?>

<?php
$content = ob_get_clean();
require_once("../template.php");
?>