<?php
function get_db()
{
	$pdo = new PDO("mysql:host=localhost;dbname=prj_api;charset=utf8","root","");
	return $pdo;
}