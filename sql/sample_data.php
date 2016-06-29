<?php

// set up the database connection
$pdo = new PDO('sqlite:travellerct.sqlite3');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// populate the tables
$sql = file_get_contents('sample_data.sql');
$pdo->exec($sql);
