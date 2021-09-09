<?php
define("URL", str_replace("index.php","",(isset($_SERVER['HTTPS'])? "https" : "http").
"://".$_SERVER['HTTP_HOST'].$_SERVER["PHP_SELF"]));

// $url = 'https://mhw-db.com/monsters';
function getConnection() {
	return new PDO("mysql:host=localhost;dbname=prj_api;charset=utf8","admin","admin");
}

function getMonsters()
{
	$pdo = getConnection();
	$res = $pdo->query("SELECT * FROM monsters");
	$res = $res->fetchAll();

	$json = json_encode($res);
}

function getMonstersByField($field, $value) {
	$pdo = getConnection();
	$res = $pdo->query("SELECT * FROM monsters WHERE " . $field . " LIKE '" . $value ."'");
	$res = $res->fetchAll();
	$json = json_encode($res);  
	// die(var_dump($json));         
}

function sendJSON($infos){
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    echo json_encode($infos,JSON_UNESCAPED_UNICODE);
}