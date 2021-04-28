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

$pdo->query(
"CREATE TABLE `users` {
    `ID` int (11) NOT NULL,
    `is_admin` tinyint(4) NOT NULL DEFAULT '0',
    `email` varchar(64) DEFAULT NULL,
    `password` varchar(96) DEFAULT NULL,
    `firstname` varchar (48) DEFAULT NULL,
    `lastname` varchar (48) DEFAULT NULL
} ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;");

// ALTER TABLE `users`
//     ADD PRIMARY KEY (`ID`);


// ALTER TABLE `users`
//     MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT 3;
// COMMIT;