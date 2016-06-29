<?php

// set up the database connection
$pdo = new PDO('sqlite:travellerct.sqlite3');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// create the tables
$sql = file_get_contents('create_character.sql');
$pdo->exec($sql);
