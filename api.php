<?php
// $url = 'https://mhw-db.com/monsters';
$pdo = new PDO("mysql:host=localhost;dbname=prj_api;charset=utf8","root","");
if (isset($_GET['get']))
{
	if ($_GET['get'] == 'monsters')
	{
		// $response = file_get_contents('https://mhw-db.com/monsters');
		$json = $pdo->query("SELECT * FROM monsters");
		$json = $json->fetchAll();
		foreach ($json as $elm)
		{
			if ($elm['id'] < 10)
				echo '0';
			echo $elm['id'] . ': ';
			echo $elm['name_en'];
			echo "</br>";
		}
		$json = json_encode($json);
		// var_dump($json);
		// $json = json_decode($json);
		// var_dump($json);
	}
	else if ($_GET['get'] == 'weapons')
	{
		$response2 = file_get_contents('https://mhw-db.com/weapons');
		$json2 = json_decode($response2);
		var_dump ($json2);
		// foreach ($json as $elm)
		// {
		// 	if ($elm->id < 10)
		// 		echo '0';
		// 	echo $elm->id . ': ';
		// 	echo $elm->name;
		// 	echo "</br>";
		// }
		// $json = json_encode($response);
	}
}