<?php
<<<<<<< HEAD
=======
if(session_id() == '') {
	session_start();
}
$route = $_SESSION['base-url'] . 'api/weapons/';
// $route = "http://localhost/ACS_project/projet_api/api/weapons/";

if(isset($_POST['field']) && isset($_POST['value']))
	$route .= "/" . $_POST['field'] . "/" . $_POST['value'];
>>>>>>> nina
// $weapons = json_decode(file_get_contents("http://localhost/ACS_project/projet_api/api/weapons/" . $_GET['field'] . "/" . $_GET['value']));
echo(var_dump($_POST, ' - ' , $_GET));

$route = "http://localhost/FOLDERS/FORM_PROJETS/form_projet_api/projet_api/api/weapons/";

if(isset($_POST['field']) && isset($_POST['value'])) {
	$route .= $_POST['field'] . "/" . $_POST['value'];
}

// $w_cat = isset($_POST['value']) ? $_POST['value'] : $w_cat;

// if(isset($_POST['select-field']) && isset($_POST['inp-search'])) {
// 	$route .= $_POST['select-field'] . "/" . $_POST['inp-search'];
// }

// die($route);

$weapons = json_decode(file_get_contents($route));

ob_start();
?>

<h1>All <?= str_replace('-', ' ', $_POST['value']) ?></h1>

<div>
	<div action="" name="form-filter-weapons" method="post">
		<!-- <input type="" name="weapon_type" id="weapon_type" value="<?= $_POST['value'] ?>"> -->
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
			
			<button id="js-submit" value="<?= $_POST['value'] ?>">soumettre en js</button>

            <!-- <input type="submit"> -->
        </div>
	</div>
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
		<!-- <tr class="tab-line"> -->
		<tr class="tr-name_en-<?= $elm->name_en . ' tr-rarity-' . $elm->rarity . ' tr-element1-' . $elm->element1 ?>">

			<?= '<td class="td-name_en"><a href="details.php?field=id&value=' . $elm->id . '"</a>' . $elm->name_en . '</td>'?>
			<td><?= ($elm->previous_en == '' ? "None" : $elm->previous_en); ?></td>
			<td class="td-rarity"><?= $elm->rarity ?></td>
			<td><?= $elm->attack ?></td>
			<td><?= $elm->affinity . " %" ?></td>
			<td class="td-element1"><?= ($elm->element1 == '' ? "None" : $elm->element1 . ' ' . "<img src='../public/images/ui/element_" . $elm->element1 . ".svg' width='20px'/>"); ?></td>
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