<?php
if(session_id() == '') {
	session_start();
}

$weapon_type = $_GET['weapon_type'];

$route = $_SESSION['base-url'] . 'api/weapons/weapon_type/' . $weapon_type;

if(isset($_GET['field']) && isset($_GET['value'])) {
	$route .= "/filter/" . $_GET['field']. "/" . $_GET['value'];
}
if(isset($_GET['order_by'])) {
	$route .= "/order_by/" . $_GET['order_by'];
}
$query_string = $_SERVER['QUERY_STRING'];

$weapons = json_decode(file_get_contents($route));

ob_start();
?>
<link rel="stylesheet" href="../public/style/weapons_list.css" />

<h1>All <?= str_replace('-', ' ', $weapon_type) ?></h1>

<div>
	<form action="../../application/index.php?action=weapons-filtered&<?= $query_string; ?>" name="form-filter-weapons" id="form-filter-weapons" method="post">
		<div id="fil_inputs">
			<div>
				<label for="select-field">Criteria: </label>
				<select name="select-field" id="select-field">
					<option value="rarity">Rarity</option>
					<option value="name_en" selected>Name</option>
					<option value="element1">Element type</option>
				</select>
			</div>
			<div class="adaptativ-input-container">
                <label for="inp-search">Value: </label>
                <input type="text" name="inp-search" required>
            </div>
		</div>		
        <div id="fil_sender">
            <input type="submit" value="Search">
        </div>
	</form>

	<form action="../../application/index.php?action=weapons-ordered&<?= $query_string ?>" method="post" name="form-order-weapons" id="form-order-weapons" style="visibility: hidden">

		<input type="hidden" name="order_by" id="order_by">
		<input type="submit">
	</form>
</div>

<table id="main">
	<tr id="table_label">
		<td><button class="btn-order" id="name_en">Name</button></td>
		<td><button class="btn-order" id="previous_en">Previous upgrade</button></td>
		<td><button class="btn-order" id="rarity">Rarity</button></td>
		<td><button class="btn-order" id="attack">Damage</button></td>
		<td><button class="btn-order" id="affinity">Affinity</button></td>
		<td><button class="btn-order" id="element1">Element type</button></td>
		<td><button class="btn-order" id="element1_attack">Element damage</button></td>
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