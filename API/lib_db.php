<?php
$host = 'us-cdbr-east-03.cleardb.com';
$db = 'heroku_acf34b15d28d53a';
$user = 'b4c2f5a86ce435';
$pass = 'a00c758d';
$charset = 'utf8';
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
	PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
	PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
	PDO::ATTR_EMULATE_PREPARES => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);