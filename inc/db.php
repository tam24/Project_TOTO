<?php

// DSN = Data Source Name => has all the details to be able to connect to the db
$dsn = 'mysql:dbname='.$config['DB_DATABASE'].';host='.$config['DB_HOST'].';charset=UTF8';

// Try/catch "catches" errors ocurred during "try"
try {
	// Je crée une instance de PDO
	$pdo = new PDO($dsn, $config['DB_USER'], $config['DB_PASSWORD']);
}
catch (Exception $e) {
	echo 'Connection failed : '.$e->getMessage();
}
