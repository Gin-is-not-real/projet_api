<?php
if(session_id() == '') {
	session_start();
}
// $weapons = json_decode(file_get_contents("http://localhost/ACS_project/projet_api/api/weapons"));
ob_start();
?>
<link rel="stylesheet" href="../../public/style/weapons_home.css" />

<h1>Select a weapon type</h1>
<div id="choose_box">
	<a href="../../index.php?action=weapons-type&weapon_type=great-sword">
		<figure>
    	    <figcaption>
				See Great Sword
			</figcaption>
			<img src="../../public/images/ui/weap_greatsword_base.svg" alt="great sword"  alt="great sword" width="80px">
		</figure>
	</a>
	<a href="../../index.php?action=weapons-type&weapon_type=long-sword">
		<figure>
        	<figcaption>
				See Long Sword
			</figcaption>
		<img src="../../public/images/ui/weap_longsword_base.svg"  alt="long sword" width="80px">
		</figure>
	</a>
	<a href="../../index.php?action=weapons-type&weapon_type=sword-and-shield">
		<figure>
    		<figcaption>
				See Sword and Shield
    		</figcaption>
    	<img src="../../public/images/ui/weap_sword_and_shield_base.svg"  alt="sword and shield" width="80px">
		</figure>
	</a>
	<a href="../../index.php?action=weapons-type&weapon_type=dual-blades">
		<figure>
    		<figcaption>
				See Dual Blades
			</figcaption>
        <img src="../../public/images/ui/weap_dual_blades_base.svg"  alt="dual blade" width="80px">
    	</figure>
	</a>
	<a href="../../index.php?action=weapons-type&weapon_type=hammer">
		<figure>
        	<figcaption>
				See Hammers
			</figcaption>
			<img src="../../public/images/ui/weap_hammer_base.svg"  alt="hammer" width="80px">
		</figure>
	</a>
	<a href="../../index.php?action=weapons-type&weapon_type=hunting-horn">
		<figure>
        	<figcaption>
				See Hunting Horn
			</figcaption>
			<img src="../../public/images/ui/weap_hunting_horn_base.svg"  alt="hunting horn" width="80px">
		</figure>
	</a>
	<a href="../../index.php?action=weapons-type&weapon_type=lance">
		<figure>
			<figcaption>
				See Lances
			</figcaption>
			<img src="../../public/images/ui/weap_lance_base.svg"  alt="lances" width="80px">
		</figure>
	</a>
	<a href="../../index.php?action=weapons-type&weapon_type=gunlance">
		<figure>
    		<figcaption>
				See Gunlances
			</figcaption>
			<img src="../../public/images/ui/weap_gunlance_base.svg"  alt="gunlances" width="80px">
		</figure>
	</a>
	<a href="../../index.php?action=weapons-type&weapon_type=switch-axe">
		<figure>
    		<figcaption>
				See Switch Axes
			</figcaption>
        <img src="../../public/images/ui/weap_switch_axe_base.svg"  alt="switch axes" width="80px">
    	</figure>
	</a>
	<a href="../../index.php?action=weapons-type&weapon_type=charge-blade">
		<figure>
        	<figcaption>
				See Charge Blades
			</figcaption>
			<img src="../../public/images/ui/weap_charge_blade_base.svg"  alt="Charge Blades" width="80px">
		</figure>
	</a>
	<a href="../../index.php?action=weapons-type&weapon_type=insect-glaive">
		<figure>
			<figcaption>
				See Insect Blades
			</figcaption>
			<img src="../../public/images/ui/weap_insect_glaive_base.svg"  alt="Insect Blades" width="80px">
		</figure>
	</a>
	<a href="../../index.php?action=weapons-type&weapon_type=light-bowgun">
		<figure>
			<figcaption>
				See Light Bowguns
			</figcaption>
			<img src="../../public/images/ui/weap_light_bowgun_base.svg"  alt="Light Bowguns" width="80px">
		</figure>
	</a>
	<a href="../../index.php?action=weapons-type&weapon_type=heavy-bowgun">
		<figure>
			<figcaption>
				See Heavy Bowguns
			</figcaption>
			<img src="../../public/images/ui/weap_heavy_bowgun_base.svg"  alt="Heavy Bowguns" width="80px">
		</figure>
	</a>
	<a href="../../index.php?action=weapons-type&weapon_type=bow">
		<figure>
			<figcaption>
				See Bow
      		</figcaption>
        	<img src="../../public/images/ui/weap_bow_base.svg"  alt="Bow" width="80px">
    	</figure>
	</a>
</div>

<?php
$content = ob_get_clean();
require_once("../template.php");
?>