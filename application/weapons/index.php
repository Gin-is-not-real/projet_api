<?php
if(session_id() == '') {
	session_start();
}
// $weapons = json_decode(file_get_contents("http://localhost/ACS_project/projet_api/api/weapons"));
ob_start();
?>
<link rel="stylesheet" href="../public/style/weapons_home.css" />

<h1>Select a weapon type</h1>
<div id="choose_box">
	<a href='../index.php?action=weapons-type&weapon_type=great-sword'>See Great Sword</a>
	<a href='../index.php?action=weapons-type&weapon_type=long-sword'>See Long Sword</a>
	<a href='../index.php?action=weapons-type&weapon_type=sword-and-shield'>See Sword and Shield</a>
	<a href='../index.php?action=weapons-type&weapon_type=dual-blades'>See Dual Blades</a>
	<a href='../index.php?action=weapons-type&weapon_type=hammer'>See Hammers</a>
	<a href='../index.php?action=weapons-type&weapon_type=hunting-horn'>See Hunting Horn</a>
	<a href='../index.php?action=weapons-type&weapon_type=lance'>See Lances</a>
	<a href='../index.php?action=weapons-type&weapon_type=gunlance'>See Gunlances</a>
	<a href='../index.php?action=weapons-type&weapon_type=switch-axe'>See Switch Axes</a>
	<a href='../index.php?action=weapons-type&weapon_type=charge-blade'>See Charge Blades</a>
	<a href='../index.php?action=weapons-type&weapon_type=insect-glaive'>See Insect Blades</a>
	<a href='../index.php?action=weapons-type&weapon_type=light-bowgun'>See Light Bowguns</a>
	<a href='../index.php?action=weapons-type&weapon_type=heavy-bowgun'>See Heavy Bowguns</a>
	<a href='../index.php?action=weapons-type&weapon_type=bow'>See Bows</a>
	<!-- <form action="display_by_cat.php" method="post">
		<input type="hidden" name="field" value="weapon_type"/>
		<input type="hidden" name="value" value="great-sword"/>
		<input type="submit" value="See Great Sword"/>
	</form> -->
</div>

<?php
$content = ob_get_clean();
require_once("../template.php");
?>