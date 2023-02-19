<?php

require('lib/console_log.php');
require('config/config.php');

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=$dbCharset";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);
} catch (PDOException $e) {
    echo "<h1>Er is iets fout gegaan tijdens het verbinden met de database. Neem contact op met de Database Beheerder.</h1>";
    console_log($e->getMessage());
}

$idd = $_GET['id'];

$sql = "DELETE FROM afspraak
        WHERE Id = $idd";

$statement = $pdo->prepare($sql);
$statement->execute();

if ($statement) {
    echo "Het verwijderen van de afspraak met ID: $idd is gelukt!";
    header('Refresh:3; url=read.php');
} else {
    echo "<h1>Interne server-error</h1>
        <p>Het verwijderen van de afspraak met ID: $idd is mislukt.</p>";
}
