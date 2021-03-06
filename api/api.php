<?php
require_once ("get_db.php");

define("URL", str_replace("index.php","",(isset($_SERVER['HTTPS'])? "https" : "http").
"://".$_SERVER['HTTP_HOST'].$_SERVER["PHP_SELF"])); 

function sendJSON($infos){
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    echo json_encode($infos,JSON_UNESCAPED_UNICODE);
}

function getMonsters()
{
	$pdo = get_db();
	$query = $pdo->prepare("SELECT id, name_en, ecology_en, size, pitfall_trap, shock_trap, vine_trap FROM monsters");
	$query->execute();
	$res = $query->fetchAll();
	$query->closeCursor();
	sendJSON($res);
}

function getMonstersByField($field, $value)
{
	$pdo = get_db();
	$query = $pdo->prepare("SELECT id, name_en, ecology_en, size, pitfall_trap, shock_trap, vine_trap FROM monsters WHERE " . $field . " LIKE '%" . $value ."%'");
	$query->execute();
	$res = $query->fetchAll();
	$query->closeCursor();
	sendJSON($res);
}

function getMonstersDetails($id)
{
	$pdo = get_db();
	$request = "SELECT monsters.id AS main_id, monsters.name_en AS name_en, ecology_en, size, pitfall_trap, shock_trap, vine_trap,
				roar, wind, tremor, defense_down, fireblight, waterblight, thunderblight, iceblight, dragonblight, blastblight,
				monster_ailments.poison AS poisonblight, monster_ailments.sleep AS sleepblight, monster_ailments.paralysis AS paralysisblight, 
				monster_ailments.bleed AS bleedblight, monster_ailments.stun AS stunblight, form, alt_description, monster_weaknesses.fire AS fire_weak,
				monster_weaknesses.water AS water_weak, monster_weaknesses.thunder AS thunder_weak, monster_weaknesses.ice AS ice_weak, monster_weaknesses.dragon AS dragon_weak,
				monster_weaknesses.poison AS poison_weak, monster_weaknesses.sleep AS sleep_weak, monster_weaknesses.paralysis AS paralysis_weak, monster_weaknesses.blast AS blast_weak, monster_weaknesses.stun AS stun_weak
				FROM `monsters`
				INNER JOIN monster_ailments ON monsters.name_en = base_name_en 
				INNER JOIN monster_weaknesses ON monsters.name_en = monster_weaknesses.name_en
				WHERE monsters.id = '".$id."'";
	$query = $pdo->prepare($request);
	$query->execute();
	$res = $query->fetchAll();
	if (empty($res))
	{
		$query = $pdo->prepare("SELECT id AS main_id, name_en, size FROM monsters WHERE id = '".$id."'");
		$query->execute();
		$res = $query->fetchAll();
	}
	$query->closeCursor();
	sendJSON($res);
}

function getMonstersRewards($id)
{
	$pdo = get_db();
	$request = "SELECT monsters.id AS main_id, monsters.name_en AS name_en, rank, condition_en, item_en, stack, percentage
				FROM `monsters` INNER JOIN monster_rewards ON monsters.name_en = monster_rewards.base_name_en
				WHERE monsters.id = '".$id."'";
	$query = $pdo->prepare($request);
	$query->execute();
	$res = $query->fetchAll();
	$query->closeCursor();
	sendJSON($res);
}

function getWeapons()
{
	$pdo = get_db();
	$query = $pdo->query("SELECT * FROM weapons");
	$query->execute();
	$res = $query->fetchAll();
	$query->closeCursor();
	sendJSON($res);
}

function getCategoryWeaponsByField($category, $field, $value, $orderBy = null) {
	$pdo = get_db();
	$strQuery = "SELECT * FROM weapons WHERE weapon_type='" . $category . "' AND " . $field . " LIKE '" . $value . "%'";
	if($orderBy != null) {
		$strQuery .= ' ORDER BY ' . $orderBy;
	}
	$query = $pdo->prepare($strQuery);
	$query->execute();
	$res = $query->fetchAll();
	$query->closeCursor();
	sendJSON($res);
}

function getWeaponsByCategory($weaponType, $orderBy = null) {
	$pdo = get_db();
	$strQuery = "SELECT * 
	FROM weapons 
	WHERE weapon_type='" . $weaponType . "'";

	if($orderBy != null) {
		$strQuery .= ' ORDER BY ' . $orderBy;
	}

	$query = $pdo->prepare($strQuery);
	$query->execute();
	$res = $query->fetchAll();

	$query->closeCursor();
	sendJSON($res);
}

function getWeaponsByField($field, $value)
{
	$pdo = get_db();
	$query = $pdo->prepare("SELECT * 
	FROM weapons 
	WHERE " . $field . " LIKE '" . $value . "%'");
	$query->execute();
	$res = $query->fetchAll();

	$query->closeCursor();
	sendJSON($res);
}

function getWeaponsDetails($id)
{
	$pdo = get_db();
	$query = $pdo->prepare("SELECT * FROM weapons INNER JOIN weapon_craft ON name_en = base_name_en WHERE weapons.id = '".$id."'");
	$query->execute();
	$res = $query->fetchAll();
	$query->closeCursor();
	sendJSON($res);
}

function getArmors()
{
	$pdo = get_db();
	$query = $pdo->prepare("SELECT * FROM armors");
	$query->execute();
	$res = $query->fetchAll();
	$query->closeCursor();
	sendJSON($res);
}

function getArmorsByField($field, $value)
{
	$pdo = get_db();
	$query = $pdo->prepare("SELECT * FROM armors WHERE " . $field . " LIKE '" . $value ."%'");
	$query->execute();
	$res = $query->fetchAll();		
	$query->closeCursor();
	sendJSON($res);
}

function getArmorDetails($id)
{
	$pdo = get_db();
	$query = $pdo->prepare("SELECT name_en AS name, rarity, type, slot_1, slot_2, slot_3, defense_base AS def, defense_max AS def_max,
	defense_augment_max AS def_mag, defense_fire AS def_fire, defense_water AS def_water, defense_thunder AS def_thunder, defense_ice AS def_ice,
	defense_dragon AS def_dragon, item1_name, item1_qty, item2_name, item2_qty, item3_name, item3_qty, item4_name, item4_qty,
	skill1_name, skill1_level, skill2_name, skill2_level FROM armors
	INNER JOIN armor_craft ON armors.id_item = armor_craft.id
	INNER JOIN armor_skills ON armors.id_item = armor_skills.id
	WHERE armors.id_item = '".$id."'");
	$query->execute();
	$res = $query->fetchAll();
	$query->closeCursor();
	sendJSON($res);
}

function getArmorSet()
{
	$pdo = get_db();
	$query = $pdo->prepare("SELECT * FROM armorset_base");
	$query->execute();
	$res = $query->fetchAll();
	$query->closeCursor();
	sendJSON($res);
}

function getArmorSetByField($field, $value)
{
	$pdo = get_db();
	$query = $pdo->prepare("SELECT id, name_en AS name, rank, monster, head, chest, arms, waist, legs
							FROM armorset_base WHERE ".$field." LIKE '".$value."'");
	$query->execute();
	$res = $query->fetchAll();
	$query->closeCursor();
	sendJSON($res);
}