<?php

header('Content-type: text/plain'); /* This is just for the pastebin, to control the debug output above */

$pdo = new PDO('sqlite:travellerct.sqlite3');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// create our tables
$result = $pdo->exec('CREATE TABLE books(id int, title varchar(255), author varchar(255))');

// prepare the data and insert it

/* Create our database first */
$books = array(
    array(':id' => 0, ':author' => 'J. R. R. Tolkien', ':title' => 'The Lord of the Rings: The Fellowship of the Ring',),
    array(':id' => 1, ':author' => 'J. R. R. Tolkien', ':title' => 'The Lord of the Rings: The Two Towers',),
    array(':id' => 2, ':author' => 'J. R. R. Tolkien', ':title' => 'The Lord of the Rings: The Return of the King',),
);

$stmt = $pdo->prepare('INSERT INTO books(id, title, author) values(:id, :title, :author)');
try {
    foreach ($books as $book) {
        $stmt->execute($book);
    }
} catch (PDOException $e) {
    echo $e;
}
/* OK, now the database exists and has data, we can query it */

switch ($_POST['searchtype']) {
    case 'title':        /* fall-through */
    case 'author':        /* fall-through */
    case 'id':        /* fall-through */
        $query = $pdo->prepare("select * from books where $_POST[searchtype] LIKE :search");
        break;

    default:
        /* They tried to do something unexpected, and possibly evil. Log it and do something smart about it. */
}

if (! $query->execute(array(':search' => '%'.$_POST['searchterm'].'%'))) {
    /* No matches, do something about it */
}
foreach ($query->fetchAll(PDO::FETCH_BOTH) as $row) {
    var_dump($row);
}
