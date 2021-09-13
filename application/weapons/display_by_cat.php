<?php
if(session_id() == '') {
	session_start();
}
$weapon_type = $_GET['weapon_type'];

$route = $_SESSION['base-url'] . 'api/weapons/weapon_type/' . $weapon_type;

if(isset($_GET['field']) && isset($_GET['value'])) {
	$route .= "/" . $_GET['field']. "/" . $_GET['value'];
}

$weapons = json_decode(file_get_contents($route));

ob_start();
?>
<link rel="stylesheet" href="../public/style/weapons_list.css" />

<h1>All <?= str_replace('-', ' ', $weapon_type) ?></h1>

<div>
	<form action="../../application/index.php?action=weapons-filtered&weapon_type=<?= $weapon_type; ?>" name="form-filter-weapons" method="post">
		<div id="fil_inputs">
			<div>
				<label for="select-field">field: </label>
				<select name="select-field" id="select-field">
					<option value="rarity">rareté</option>
					<option value="name_en" selected>nom</option>
					<option value="element1">element type</option>
				</select>
			</div>
			<div class="adaptativ-input-container">
                <label for="inp-search">valeur: </label>
                <input type="text" name="inp-search" required>
            </div>
		</div>		
        <div id="fil_sender">
            <input type="submit">
        </div>
</form>
</div>

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
		<?php if ($weapon_type == "insect-glaive")
			echo "<td>Kinsect bonus</td>";
		?>
	</tr>
	<?php foreach ($weapons as $elm) { ?>
		<!-- <tr class="tab-line"> -->
		<tr class="data">

			<?= '<td class="td-name_en"><a href="../index.php?action=weapon&id=' . $elm->id . '"</a>' . $elm->name_en . '</td>'?>

			<td><?= ($elm->previous_en == '' ? "None" : $elm->previous_en); ?></td>
			<td class="td-rarity"><?= $elm->rarity ?></td>
			<td><?= $elm->attack ?></td>
			<td><?= $elm->affinity . " %" ?></td>
			<td class="td-element1"><?= ($elm->element1 == '' ? "None" : "<p>" . $elm->element1 .  ' </p>' . "<img src='../public/images/ui/element_" . $elm->element1 . ".svg' width='20px'/>"); ?></td>
			<td>
				<?= ($elm->element1_attack == '' ? "None" : $elm->element1_attack); ?>
				<?= ($elm->element1 == "Dragon" ? " (".$elm->elderseal.")" : ''); ?>
			</td>
			<td class="gem_slot">
				<?= ($elm->slot_1 != 0 ? "<img src='../public/images/ui/gem_" . $elm->slot_1 . "_empty.svg' width='20px'/>" : 'None') ?>
				<?= ($elm->slot_2 != 0 ? "<img src='../public/images/ui/gem_" . $elm->slot_2 . "_empty.svg' width='20px'/>" : '') ?>
				<?= ($elm->slot_3 != 0 ? "<img src='../public/images/ui/gem_" . $elm->slot_3 . "_empty.svg' width='20px'/>" : '') ?>
			</td>
			<?php if ($weapon_type == "insect-glaive")
				echo "<td>" . str_replace('_', ' ', $elm->kinsect_bonus) . "</td>";
			?>
		</tr>
	<?php } ?>
</table>
<?php
$content = ob_get_clean();
require_once("../template.php");
?>