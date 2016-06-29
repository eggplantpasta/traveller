<?php
// prevent caching
header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");

$pdo = new PDO('sqlite:travellerct.sqlite3');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// drop all tables
$tables = $pdo->query("select name from sqlite_master where type='table'")->fetchAll(PDO::FETCH_ASSOC);
if ($tables) {
    // tables exist, drop them
    foreach($tables as $row) {
        try {
            // drop the table
            $pdo->exec('drop table '.$row['name']);
            echo 'Table '.$row['name'].' dropped.<br>'.PHP_EOL;
        } catch (Exception $e) {
            // report error keep dropping
            echo 'Table '.$row['name'].' not dropped: '.$e->getMessage().'<br>'.PHP_EOL;
        }
    }
} else {
    echo 'No tables exist to drop.<br>'.PHP_EOL;
}
