<?php
if(session_id() == '') {
	session_start();
}
$route = $_SESSION['base-url'] . 'api/weapons/';
// $route = "http://localhost/ACS_project/projet_api/api/weapons/";

if(isset($_GET['field']) && isset($_GET['value']))
	$route .= "/" . $_GET['field'] . "/" . $_GET['value'];
// $weapons = json_decode(file_get_contents("http://localhost/ACS_project/projet_api/api/weapons/" . $_GET['field'] . "/" . $_GET['value']));
$weapons = json_decode(file_get_contents($route));
ob_start();
?>
<link rel="stylesheet" href="../public/style/weapons_list.css" />

<h1>All <?= str_replace('-', ' ', $_GET['weapon_type']) ?></h1>
<table id="main">
	<tr id="table_label">
		<td>Name</td>
		<td>Previous upgrade</td>
		<td>Rarity</td>
		<td>Damage</td>
		<td>Affinity</td>
		<td>Element type</td>
		<td>Element damage</td>
		<td>Gem slot</td>
		<?php if ($_GET['weapon_type'] == "insect-glaive")
			echo "<td>Kinsect bonus</td>";
		?>
	</tr>
	<?php foreach ($weapons as $elm) { ?>
		<tr class="data">
			<?= '<td><a href="details.php?field=id&value=' . $elm->id . '"</a>' . $elm->name_en . '</td>'?>
			<td><?= ($elm->previous_en == '' ? "None" : $elm->previous_en); ?></td>
			<td><?= $elm->rarity ?></td>
			<td><?= $elm->attack ?></td>
			<td><?= $elm->affinity . " %" ?></td>
			<td><?= ($elm->element1 == '' ? "None" : $elm->element1 . ' ' . "<img src='../public/images/ui/element_" . $elm->element1 . ".svg' width='20px'/>"); ?></td>
			<td>
				<?= ($elm->element1_attack == '' ? "None" : $elm->element1_attack); ?>
				<?= ($elm->element1 == "Dragon" ? " (".$elm->elderseal.")" : ''); ?>
			</td>
			<td>
				<?= ($elm->slot_1 != 0 ? "<img src='../public/images/ui/gem_" . $elm->slot_1 . "_empty.svg' width='20px'/>" : '') ?>
				<?= ($elm->slot_2 != 0 ? "<img src='../public/images/ui/gem_" . $elm->slot_2 . "_empty.svg' width='20px'/>" : '') ?>
				<?= ($elm->slot_3 != 0 ? "<img src='../public/images/ui/gem_" . $elm->slot_3 . "_empty.svg' width='20px'/>" : '') ?>
			</td>
			<?php if ($_POST['value'] == "insect-glaive")
				echo "<td>" . str_replace('_', ' ', $elm->kinsect_bonus) . "</td>";
			?>
		</tr>
	<?php } ?>
</table>
<?php
$content = ob_get_clean();
require_once("../template.php");
?>