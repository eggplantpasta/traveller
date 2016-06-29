<?php
// prevent caching
header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");

$pdo = new PDO('sqlite:travellerct.sqlite3');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// create our tables and insert data if table empty
$sql = file_get_contents('sql/create_character.sql');
$result = $pdo->exec($sql);

// prepare the data and insert it
if (isset($_GET['sampledata']) && $_GET['sampledata'] == 'yes') {
    print 'Insering sample data.<br>';

    $sql = file_get_contents('sql/insert_character.sql');
    $result = $pdo->exec($sql);
    print $result.' rows inserted into table character.<br>';
}

// display the tables
print 'All tables in database:<br>';
foreach($pdo->query("select name from sqlite_master where type='table'") as $row) {
    print htmlentities($row['name']).'<br>';
}
