<?php
// $url = 'https://mhw-db.com/monsters';
$pdo = new PDO("mysql:host=localhost;dbname=prj_api;charset=utf8","root","");
if (isset($_GET['get']))
{
	if ($_GET['get'] == 'monsters')
	{
		// $response = file_get_contents('https://mhw-db.com/monsters');
		$res = $pdo->query("SELECT * FROM monsters");
		$res = $res->fetchAll();
		foreach ($res as $elm)
		{
			if ($elm['id'] < 10)
				echo '0';
			echo $elm['id'] . ': ';
			echo $elm['name_en'];
			echo "</br>";
		}
		$json = json_encode($res);
		// var_dump($json);
		// $json = json_decode($json);
		// var_dump($json);
	}
	else if ($_GET['get'] == 'weapons')
	{
		$res = $pdo->query("SELECT * FROM weapons");
		$res = $res->fetchAll();
		// var_dump($res);
		foreach ($res as $elm)
		{
			if ($elm['id'] < 10)
				echo '0';
			echo $elm['id'] . ': ';
			echo $elm['name_en'];
			echo ' (' . $elm['weapon_type'] . ') ';
			echo $elm['previous_en'];
		}
		// $json = json_encode($response);
	}
}

function getMonsters()
{
	$res = $pdo->query("SELECT * FROM monsters");
	$res = $res->fetchAll();
	$json = json_encode($res);
}