<?php
// $weapons = json_decode(file_get_contents("http://localhost/ACS_project/projet_api/api/weapons/" . $_GET['field'] . "/" . $_GET['value']));

$route = "http://localhost/FOLDERS/FORM_PROJETS/form_projet_api/projet_api/api/weapons/";

if(isset($_POST['field']) && isset($_POST['value']))
	$route .= "/" . $_POST['field'] . "/" . $_POST['value'];

if(isset($_POST['select-field']) && isset($_POST['inp-search']))
	$route .= "/" . $_POST['value'] ."/" . $_POST['select-field'] . "/" . $_POST['inp-search'];

$weapons = json_decode(file_get_contents($route));

ob_start();
?>

<h1>All <?= str_replace('-', ' ', $_POST['value']) ?></h1>

<div>
	<form action="" name="form-filter-weapons" method="post">
		<input type="text" name="weapon_type" value="<?= $_POST['value'] ?>">
		<div>
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
		
        <div>
            <input type="submit">
        </div>
	</form>
</div>

<table id="main">
	<tr>
		<td>Name</td>
		<td>Previous upgrade</td>
		<td>Rarity</td>
		<td>Damage</td>
		<td>Affinity</td>
		<td>Element type</td>
		<td>Element damage</td>
		<td>Gem slot</td>
		<?php if ($_POST['value'] == "insect-glaive")
			echo "<td>Kinsect bonus</td>";
		?>
	</tr>
	<?php foreach ($weapons as $elm) { ?>
		<tr>
			<?= '<td><a href="details.php?field=id&value=' . $elm->id . '"</a>' . $elm->name_en . '</td>'?>
			<td><?= ($elm->previous_en == '' ? "None" : $elm->previous_en); ?></td>
			<td><?= $elm->rarity ?></td>
			<td><?= $elm->attack ?></td>
			<td><?= $elm->affinity . " %" ?></td>
			<td><?= ($elm->element1 == '' ? "None" : $elm->element1); ?></td>
			<td>
				<?= ($elm->element1_attack == '' ? "None" : $elm->element1_attack); ?>
				<?= ($elm->element1 == "Dragon" ? " (".$elm->elderseal.")" : ''); ?>
			</td>
			<td><?= "[" . $elm->slot_1 . ' ' . $elm->slot_2 . ' ' . $elm->slot_3 . "]" ?></td>
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