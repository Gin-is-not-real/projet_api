<?php
require_once ("get_db.php");
// define("URL", str_replace("index.php","",(isset($_SERVER['HTTPS'])? "https" : "http").
// "://".$_SERVER['HTTP_HOST'].$_SERVER["PHP_SELF"]));

function getMonsters()
{
	$pdo = get_db();
	$query = $pdo->prepare("SELECT * FROM monsters");
	$query->execute();
	$res = $query->fetchAll();
	for ($i=0; $i < count($res); $i++)
	{
		echo $res[$i]['name_en'];
		echo "</br>";
	}
	$query->closeCursor();
	$json = json_encode($res);
}

function getMonstersByField($field, $value)
{
	$pdo = get_db();
	$query = $pdo->prepare("SELECT * FROM monsters WHERE " . $field . "='" . $value ."'");
	$query->execute();
	$res = $query->fetchAll();
	if (empty($res))
		echo "<p>Aucun résultat trouvé</p>";
	for ($i=0; $i < count($res); $i++)
	{
		echo $res[$i]['name_en'];
		echo "</br>";
	}
	$json = json_encode($res);
	$query->closeCursor();
}

function getWeapons()
{
	$pdo = get_db();
	$query = $pdo->query("SELECT * FROM weapons");
	$query->execute();
	$res = $query->fetchAll();
	$query->closeCursor();
	$json = json_encode($res);
}

function getWeaponsByField($field, $value)
{
	$pdo = get_db();
	$query = $pdo->prepare("SELECT * FROM weapons WHERE " . $field . "='" . $value ."'");
	$query->execute();
	$res = $query->fetchAll();
	if (empty($res))
		echo "<p>Aucun résultat trouvé</p>";
	for ($i=0; $i < count($res); $i++)
	{
		if (empty($res[$i]['previous_en']))
			echo $res[$i]['name_en'] . " uprgade of nothing";
		else
			echo $res[$i]['name_en'] . " uprgade of " . $res[$i]['previous_en'];
		echo "</br>";
	}
	$json = json_encode($res);
	$query->closeCursor();
}

function getArmors()
{
	$pdo = get_db();
	$res = $pdo->prepare("SELECT * FROM armors");
	$query->execute();
	$res = $query->fetchAll();
	$query->closeCursor();
	$json = json_encode($res);
}

function getArmorsByField($field, $value)
{
	$pdo = get_db();
	$query = $pdo->prepare("SELECT * FROM armors WHERE " . $field . "='" . $value ."'");
	$query->execute();
	$res = $query->fetchAll();		
	if (empty($res))
		echo "<p>Aucun résultat trouvé</p>";
	for ($i=0; $i < count($res); $i++)
	{
		echo $res[$i]['name_en'] . " (" . $res[$i]['type'] . ")";
		echo "</br>";
	}
	$json = json_encode($res);
	$query->closeCursor();
}

if (isset($_GET['field']))
{
	if ($_GET['field'])
	{
		// $pdo = new PDO("mysql:host=localhost;dbname=prj_api;charset=utf8","root","");
		// $res = $pdo->query("SELECT * FROM armors");
		// $res = $res->fetchAll();
		// foreach ($res as $elm)
		// {
		// 	if ($elm['id'] < 10)
		// 		echo '0';
		// 	echo $elm['id'] . ': ';
		// 	echo $elm['name_en'];
		// 	echo " (" . $elm['type'] . ")";
		// 	echo "</br>";
		// }
		// $json = json_encode($res);
		// getMonsters();
		getMonstersByField($_GET['field'], $_GET['value']);
	}
}