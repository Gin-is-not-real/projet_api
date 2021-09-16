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
	<!-- <a href='../index.php?action=weapons-type&weapon_type=great-sword'>See Great Sword</a> -->
	<figure>
        <figcaption>
            <a href="../index.php?action=weapons-type&weapon_type=great-sword">See Great Sword</a>
        </figcaption>
        <img src="../public/images/ui/weap_greatsword_base.svg" width="80px">
    </figure>
	<!-- <a href='../index.php?action=weapons-type&weapon_type=long-sword'>See Long Sword</a> -->
	<figure>
        <figcaption>
            <a href="../index.php?action=weapons-type&weapon_type=long-sword">See Long Sword</a>
        </figcaption>
        <img src="../public/images/ui/weap_longsword_base.svg" width="80px">
    </figure>
	<!-- <a href='../index.php?action=weapons-type&weapon_type=sword-and-shield'>See Sword and Shield</a> -->
	<figure>
        <figcaption>
            <a href="../index.php?action=weapons-type&weapon_type=sword-and-shield">See Sword and Shield</a>
        </figcaption>
        <img src="../public/images/ui/weap_sword_and_shield_base.svg" width="80px">
    </figure>
	<!-- <a href='../index.php?action=weapons-type&weapon_type=dual-blades'>See Dual Blades</a> -->
	<figure>
        <figcaption>
            <a href="../index.php?action=weapons-type&weapon_type=dual-blades">See Dual Blades</a>
        </figcaption>
        <img src="../public/images/ui/weap_dual_blades_base.svg" width="80px">
    </figure>
	<!-- <a href='../index.php?action=weapons-type&weapon_type=hammer'>See Hammers</a> -->
	<figure>
        <figcaption>
            <a href="../index.php?action=weapons-type&weapon_type=hammer">See Hammers</a>
        </figcaption>
        <img src="../public/images/ui/weap_hammer_base.svg" width="80px">
    </figure>
	<!-- <a href='../index.php?action=weapons-type&weapon_type=hunting-horn'>See Hunting Horn</a> -->
	<figure>
        <figcaption>
            <a href="../index.php?action=weapons-type&weapon_type=hunting-horn">See Hunting Horn</a>
        </figcaption>
        <img src="../public/images/ui/weap_hunting_horn_base.svg" width="80px">
    </figure>
	<!-- <a href='../index.php?action=weapons-type&weapon_type=lance'>See Lances</a> -->
	<figure>
        <figcaption>
            <a href="../index.php?action=weapons-type&weapon_type=lance">See Lances</a>
        </figcaption>
        <img src="../public/images/ui/weap_lance_base.svg" width="80px">
    </figure>
	<!-- <a href='../index.php?action=weapons-type&weapon_type=gunlance'>See Gunlances</a> -->
	<figure>
        <figcaption>
            <a href="../index.php?action=weapons-type&weapon_type=gunlance">See Gunlances</a>
        </figcaption>
        <img src="../public/images/ui/weap_gunlance_base.svg" width="80px">
    </figure>
	<!-- <a href='../index.php?action=weapons-type&weapon_type=switch-axe'>See Switch Axes</a> -->
	<figure>
        <figcaption>
            <a href="../index.php?action=weapons-type&weapon_type=switch-axe">See Switch Axes</a>
        </figcaption>
        <img src="../public/images/ui/weap_switch_axe_base.svg" width="80px">
    </figure>
	<!-- <a href='../index.php?action=weapons-type&weapon_type=charge-blade'>See Charge Blades</a> -->
	<figure>
        <figcaption>
            <a href="../index.php?action=weapons-type&weapon_type=charge-blade">See Charge Blades</a>
        </figcaption>
        <img src="../public/images/ui/weap_charge_blade_base.svg" width="80px">
    </figure>
	<!-- <a href='../index.php?action=weapons-type&weapon_type=insect-glaive'>See Insect Blades</a> -->
	<figure>
        <figcaption>
            <a href="../index.php?action=weapons-type&weapon_type=insect-glaive">See Insect Blades</a>
        </figcaption>
        <img src="../public/images/ui/weap_insect_glaive_base.svg" width="80px">
    </figure>
	<!-- <a href='../index.php?action=weapons-type&weapon_type=light-bowgun'>See Light Bowguns</a> -->
	<figure>
        <figcaption>
            <a href="../index.php?action=weapons-type&weapon_type=light-bowgun">See Light Bowguns</a>
        </figcaption>
        <img src="../public/images/ui/weap_light_bowgun_base.svg" width="80px">
    </figure>
	<!-- <a href='../index.php?action=weapons-type&weapon_type=heavy-bowgun'>See Heavy Bowguns</a> -->
	<figure>
        <figcaption>
            <a href="../index.php?action=weapons-type&weapon_type=heavy-bowgun">See Heavy Bowguns</a>
        </figcaption>
        <img src="../public/images/ui/weap_heavy_bowgun_base.svg" width="80px">
    </figure>
	<!-- <a href='../index.php?action=weapons-type&weapon_type=bow'>See Bows</a> -->
	<figure>
        <figcaption>
            <a href="../index.php?action=weapons-type&weapon_type=bow">See Bow</a>
        </figcaption>
        <img src="../public/images/ui/weap_bow_base.svg" width="80px">
    </figure>
</div>

<?php
$content = ob_get_clean();
require_once("../template.php");
?>