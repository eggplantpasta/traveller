<?php
// prevent caching
header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");

$pdo = new PDO('sqlite:travellerct.sqlite3');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// drop or delete data from all tables
if (isset($_GET['statement']) && $_GET['statement'] == 'drop') {
    $sql = 'drop table ';
} else{
    $sql = 'delete from ';
}
$tables = $pdo->query("select name from sqlite_master where type='table'")->fetchAll(PDO::FETCH_ASSOC);
if ($tables) {
    // tables exist, deal with them
    foreach($tables as $row) {
        try {
            // delete data or drop the table
            $pdo->exec($sql.$row['name']);
            echo $sql.$row['name'].'<br>'.PHP_EOL;
        } catch (Exception $e) {
            // report error keep dropping
            echo 'Table '.$row['name'].' not processed: '.$e->getMessage().'<br>'.PHP_EOL;
        }
    }
} else {
    echo 'No tables exist to process.<br>'.PHP_EOL;
}
