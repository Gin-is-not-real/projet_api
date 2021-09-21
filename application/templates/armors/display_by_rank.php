<?php

function display_line($line)
{
	echo "<tr class='table_data'>";
	echo "<td><img src='../../public/images/ui/arm_".$line->type.".svg' width='24px' alt='armor type' ></td>";
	echo "<td><a href='../../index.php?action=armor&id=" . $line->id_item . "'</a>".$line->name_en."</td>";
	echo "<td>" . $line->rarity . "</td>";
	echo "<td>" . $line->defense_base . "</td>";
	echo "<td>" . $line->defense_fire . "</td>";
	echo "<td>" . $line->defense_water . "</td>";
	echo "<td>" . $line->defense_thunder . "</td>";
	echo "<td>" . $line->defense_ice . "</td>";
	echo "<td>" . $line->defense_dragon . "</td>";
	echo "<td class='gem_slot'>";
		echo ($line->slot_1 != 0 ? "<img src='../../public/images/ui/gem_" . $line->slot_1 . "_empty.svg' alt='gem slot 1' width='24px'/>" : 'None');
		echo ($line->slot_2 != 0 ? "<img src='../../public/images/ui/gem_" . $line->slot_2 . "_empty.svg' alt='gem slot 2' width='24px'/>" : '');
		echo ($line->slot_3 != 0 ? "<img src='../../public/images/ui/gem_" . $line->slot_3 . "_empty.svg' alt='gem slot 3' width='24px'/>" : '');
	echo "</td>";
	echo "</tr>";
}

if(session_id() == '') {
    session_start();
}

ob_start();
$route = $_SESSION['base-url'] . 'api/armors';

$armors = json_decode(file_get_contents($route));
?>
<link rel="stylesheet" href="../../public/style/armor_list.css" />

<?= "<h1>All " . $_GET['rank'] . " armors</h1>" ?>
<table>
	<tr id="table_label">
		<td>Type</td>
		<td>Name</td>
		<td>Rarity</td>
		<td>Defense</td>
		<td>Defense<img src="../../public/images/ui/element_fire.svg" width="24px" alt="fire" title="Fire"></td>
		<td>Defense<img src="../../public/images/ui/element_water.svg" width="24px" alt="water" title="Water"></td>
		<td>Defense<img src="../../public/images/ui/element_thunder.svg" width="24px" alt="thunder" title="Thunder"></td>
		<td>Defense<img src="../../public/images/ui/element_ice.svg" width="24px" alt="ice" title="Ice"></td>
		<td>Defense<img src="../../public/images/ui/element_dragon.svg" width="24px" alt="dragon" title="Dragon"></td>
		<td>Decoration</td>
	</tr>
	<?php
	foreach ($armors as $elm)
	{
		if ($_GET['rank'] == "LR" && $elm->rarity <= 4)
			display_line($elm);
		else if ($_GET['rank'] == "HR" && $elm->rarity >= 5 && $elm->rarity <= 8)
			display_line($elm);
		else if ($_GET['rank'] == "MR" && $elm->rarity >= 9)
			display_line($elm);
	}
	?>
</table>

<?php
$content = ob_get_clean();
require_once("../template.php");