<?php
// prevent caching
header("Expires: Tue, 03 Jul 2001 06:00:00 GMT");

$pdo = new PDO('sqlite:travellerct.sqlite3');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// create tables based on code in files named create_* in the sql directory
echo 'Creating database objects.<br>';
$filenames = glob ('sql/create_*');
if ($filenames) {
    // scripts exist, execute them
    foreach ($filenames as $filename) {
        try {
            // drop the table
            $sql = file_get_contents($filename);
            $pdo->exec($sql);
            echo 'Script '.$filename.' executed.<br>'.PHP_EOL;
        } catch (Exception $e) {
            // report error keep going
            echo 'Script '.$filename.' not executed: '.$e->getMessage().'<br>'.PHP_EOL;
        }
    }
} else {
    echo 'No create scripts found. No database objects created.<br>'.PHP_EOL;
}

// optionally insert sample data
if (isset($_GET['sampledata']) && $_GET['sampledata'] == 'yes') {
    echo 'Insering sample data.<br>';

    $sql = file_get_contents('sql/insert_character.sql');
    $result = $pdo->exec($sql);
    echo $result.' rows inserted into table character.<br>';
}

// display the tables
echo 'List all tables in database:<br>';
foreach($pdo->query("select name from sqlite_master where type='table'") as $row) {
    echo htmlentities($row['name']).'<br>';
}
