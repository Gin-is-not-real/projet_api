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
	$query = $pdo->prepare("SELECT * FROM monsters");
	$query->execute();
	$res = $query->fetchAll();
	// for ($i=0; $i < count($res); $i++)
	// {
	// 	echo $res[$i]['name_en'];
	// 	echo "</br>";
	// }
	$query->closeCursor();
	// $json = json_encode($res);
	sendJSON($res);
}

function getMonstersByField($field, $value)
{
	$pdo = get_db();
	$query = $pdo->prepare("SELECT * FROM monsters WHERE " . $field . " LIKE '%" . $value ."%'");
	$query->execute();
	$res = $query->fetchAll();
	// if (empty($res))
	// 	echo "<p>Aucun résultat trouvé</p>";
	// for ($i=0; $i < count($res); $i++)
	// {
	// 	echo $res[$i]['name_en'];
	// 	echo "</br>";
	// }
	$query->closeCursor();
	// $json = json_encode($res);
	sendJSON($res);
}

function getWeapons()
{
	$pdo = get_db();
	$query = $pdo->query("SELECT * FROM weapons");
	$query->execute();
	$res = $query->fetchAll();
	$query->closeCursor();
	// $json = json_encode($res);
	sendJSON($res);
}

function getCategoryWeaponsByField($category, $field, $value) {
	$pdo = get_db();
	$query = $pdo->prepare("SELECT * 
	FROM weapons 
	WHERE category='" . "'" . $category . "'" . $field . " LIKE '" . $value . "%'");
	$query->execute();
	$res = $query->fetchAll();

	$query->closeCursor();
	// $json = json_encode($res);
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