<?php
if(session_id() == '') {
	session_start();
}
// $weapons = json_decode(file_get_contents("http://localhost/ACS_project/projet_api/api/weapons"));
ob_start();
?>

<div id="choose_box" style="display: flex; flex-direction: column"> 
	<a href='../index.php?action=weapons-type&weapon_type=great-sword'>See great sword</a>
	<a href='../index.php?action=weapons-type&weapon_type=long-sword'>See long sword</a>
	<a href='../index.php?action=weapons-type&weapon_type=sword-and-shield'>See sword and shield</a>
	<a href='../index.php?action=weapons-type&weapon_type=dual-blades'>See dual blades</a>
	<a href='../index.php?action=weapons-type&weapon_type=hammer'>See hammers</a>
	<a href='../index.php?action=weapons-type&weapon_type=hunting-horn'>See hunting horn</a>
	<a href='../index.php?action=weapons-type&weapon_type=lance'>See lances</a>
	<a href='../index.php?action=weapons-type&weapon_type=gunlance'>See gunlances</a>
	<a href='../index.php?action=weapons-type&weapon_type=switch-axe'>See switch axes</a>
	<a href='../index.php?action=weapons-type&weapon_type=charge-blade'>See charge blades</a>
	<a href='../index.php?action=weapons-type&weapon_type=insect-glaive'>See insect blades</a>
	<a href='../index.php?action=weapons-type&weapon_type=light-bowgun'>See light bowguns</a>
	<a href='../index.php?action=weapons-type&weapon_type=heavy-bowgun'>See heavy-bowguns</a>
	<a href='../index.php?action=weapons-type&weapon_type=bow'>See bows</a>
</div>

<?php
$content = ob_get_clean();
require_once("../template.php");
?>