<link rel="stylesheet" href="../style/style.css">
<link rel="shortcut icon" href="img/favicon.png" type="image/x-icon">
<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

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

$sql = "SELECT Id
              ,nagelKleur
              ,telnr
              ,mail
              ,afspraakDate
              ,soort
              ,AfspraakCreated
        FROM afspraak
        ORDER BY Id";

$statement = $pdo->prepare($sql);
$statement->execute();

$result = $statement->fetchAll(PDO::FETCH_OBJ);

$rows = "";
foreach ($result as $afspraak) {
    $rows .= "<tr>
                <td>$afspraak->Id</td>
                <td>$afspraak->nagelKleur</td>
                <td>$afspraak->telnr</td>
                <td>$afspraak->mail</td>
                <td>$afspraak->afspraakDate</td>
                <td>$afspraak->soort</td>
                <td>$afspraak->AfspraakCreated</td>
                <td>
                    <a href='delete.php?id={$afspraak->Id}'>
                        <i class='bx bxs-error-alt' style='color:#ff0000'  ></i>
                    </a>
                </td>
                <td>
                    <a href='update.php?id={$afspraak->Id}'>
                        <i class='bx bx-edit' style='color:#ff7500'  ></i>
                    </a>
                </td>
             </tr>";
}
?>
<div class="card read">
    <h1>Overzicht van de afspraken</h1>
    <table>
        <th>Id</th>
        <th>nagelKleur</th>
        <th>telnr</th>
        <th>mail</th>
        <th>afspraakDate</th>
        <th>soort</th>
        <th>AfspraakCreated</th>
        <th></th>
        <th></th>
        <tr>
            <?php echo $rows; ?>
        </tr>
    </table>
    <br>
    <div class="buttons">
        <a href="../index.php">
            <input class="button" type="submit" value="Nieuwe afspraak">
        </a>
        <a href="truncate.php">
            <input type="submit" class="truncate" value="Truncate">
        </a>
    </div>
</div>