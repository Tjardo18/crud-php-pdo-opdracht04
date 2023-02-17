<?php

require('lib/console_log.php');
require('config/config.php');
require('config/input.php');

$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=$dbCharset";

try {
    $pdo = new PDO($dsn, $dbUser, $dbPass);
} catch (PDOException $e) {
    echo "<h1>Er is iets fout gegaan tijdens het verbinden met de database. Neem contact op met de Database Beheerder.</h1>";
    console_log($e->getMessage());
}

// kleur
$color = "";
foreach ($nagelkleur as $nagelkleur1) {
    $color .= $nagelkleur1 . ", ";
}
$nagelkleur1 = rtrim($color, ", ");

// soort
$sort = "";
foreach ($soort as $soort1) {
    $sort .= $soort1 . ", ";
}
$soort1 = rtrim($sort, ", ");

$sql = "INSERT INTO afspraak (Id
                          ,nagelKleur
                          ,telnr
                          ,mail
                          ,afspraakDate
                          ,soort
                          ,AfspraakCreated)
        VALUES            (NULL
                          ,:nk
                          ,:tn
                          ,:ml
                          ,:ad
                          ,:st
                          ,:ac);";

$statement = $pdo->prepare($sql);

$statement->bindValue(':nk', $nagelkleur1, PDO::PARAM_STR);
$statement->bindValue(':tn', $telnr, PDO::PARAM_STR);
$statement->bindValue(':ml', $mail, PDO::PARAM_STR);
$statement->bindValue(':ad', $afspraakDate, PDO::PARAM_STR);
$statement->bindValue(':st', $soort1, PDO::PARAM_STR);
$statement->bindValue(':ac', $timeSend, PDO::PARAM_STR);

$statement->execute();

echo 'Het invoeren is gelukt!';

header('Location: read.php');
