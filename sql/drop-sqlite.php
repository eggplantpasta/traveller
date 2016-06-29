<?php
$pdo = new PDO('sqlite:travellerct.sqlite3');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// drop our tables
if (! $pdo->exec('drop table character')) { echo 'table character dropped';}
