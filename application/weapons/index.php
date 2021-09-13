<?php
if(session_id() == '') {
	session_start();
}
// $weapons = json_decode(file_get_contents("http://localhost/ACS_project/projet_api/api/weapons"));
ob_start();
?>

<div id="choose_box">
	<form action="display_by_cat.php" method="post">
		<input type="hidden" name="field" value="weapon_type"/>
		<input type="hidden" name="value" value="great-sword"/>
		<input type="submit" value="See Great Sword"/>
	</form>
	<form action="display_by_cat.php" method="post">
		<input type="hidden" name="field" value="weapon_type"/>
		<input type="hidden" name="value" value="long-sword"/>
		<input type="submit" value="See Long Sword"/>
	</form>
	<form action="display_by_cat.php" method="post">
		<input type="hidden" name="field" value="weapon_type"/>
		<input type="hidden" name="value" value="sword-and-shield"/>
		<input type="submit" value="See Sword and Shield"/>
	</form>
	<form action="display_by_cat.php" method="post">
		<input type="hidden" name="field" value="weapon_type"/>
		<input type="hidden" name="value" value="dual-blades"/>
		<input type="submit" value="See Dual Blades"/>
	</form>
	<form action="display_by_cat.php" method="post">
		<input type="hidden" name="field" value="weapon_type"/>
		<input type="hidden" name="value" value="hammer"/>
		<input type="submit" value="See Hammer"/>
	</form>
	<form action="display_by_cat.php" method="post">
		<input type="hidden" name="field" value="weapon_type"/>
		<input type="hidden" name="value" value="hunting-horn"/>
		<input type="submit" value="See Hunting Horn"/>
	</form>
	<form action="display_by_cat.php" method="post">
		<input type="hidden" name="field" value="weapon_type"/>
		<input type="hidden" name="value" value="lance"/>
		<input type="submit" value="See Lance"/>
	</form>
	<form action="display_by_cat.php" method="post">
		<input type="hidden" name="field" value="weapon_type"/>
		<input type="hidden" name="value" value="gunlance"/>
		<input type="submit" value="See Gunlance"/>
	</form>
	<form action="display_by_cat.php" method="post">
		<input type="hidden" name="field" value="weapon_type"/>
		<input type="hidden" name="value" value="switch-axe"/>
		<input type="submit" value="See Switch Axe"/>
	</form>
	<form action="display_by_cat.php" method="post">
		<input type="hidden" name="field" value="weapon_type"/>
		<input type="hidden" name="value" value="charge-blade"/>
		<input type="submit" value="See Charge Blade"/>
	</form>
	<form action="display_by_cat.php" method="post">
		<input type="hidden" name="field" value="weapon_type"/>
		<input type="hidden" name="value" value="insect-glaive"/>
		<input type="submit" value="See Insect Glaive"/>
	</form>
	<form action="display_by_cat.php" method="post">
		<input type="hidden" name="field" value="weapon_type"/>
		<input type="hidden" name="value" value="light-bowgun"/>
		<input type="submit" value="See Light Bowgun"/>
	</form>
	<form action="display_by_cat.php" method="post">
		<input type="hidden" name="field" value="weapon_type"/>
		<input type="hidden" name="value" value="heavy-bowgun"/>
		<input type="submit" value="See Heavy Bowgun"/>
	</form>
	<form action="display_by_cat.php" method="post">
		<input type="hidden" name="field" value="weapon_type"/>
		<input type="hidden" name="value" value="bow"/>
		<input type="submit" value="See Bow"/>
	</form>
	<!-- <a href="display_by_cat.php?field=weapon_type&value=bow">See bow</a> -->
</div>

<?php
$content = ob_get_clean();
require_once("../template.php");
?>