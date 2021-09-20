<?php

if(session_id() == '') {
    session_start();
}

ob_start();
// $route = $_SESSION['base-url'] . 'api/armors';

// if(isset($_POST["select-field"]) AND isset($_POST['inp-search'])) {
//     $route .= '/' . $_POST['select-field'] . '/' . $_POST['inp-search'];
// }

// $armors = json_decode(file_get_contents($route));
?>
<link rel="stylesheet" href="../../public/style/armor_home.css" />

<h1>Select a rank</h1>

<div id="master">
	<a href="display_by_rank.php?rank=LR">See low rank armor</a>
	<a href="display_by_rank.php?rank=HR">See hight rank armor</a>
	<a href="display_by_rank.php?rank=MR">See master rank armor</a>
</div>

<!-- <?php
$i = 0;
foreach ($armors as $armor_piece)
{
	if ($i == 0)
		echo "<table>";
	
	echo "<tr>";
	echo "<td>".$armor_piece->type."</td>";
	echo "<td>".$armor_piece->name_en."</td>";
	echo "</tr>";
	$i++;
	if ($i % 5 == 0)
	{
		$i = 0;
		echo "</table>";
	}
}
?> -->

<?php
$content = ob_get_clean();
require_once('../template.php');