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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        require('config/input.php');

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

        $yee = "UPDATE afspraak SET
                                nagelKleur = :nk
                               ,telnr = :tn
                               ,mail = :ml
                               ,afspraakDate = :ad
                               ,soort = :st
                               ,AfspraakCreated = :ac
                WHERE Id = :id;";

        // sql statement preparing + execute
        $yee = $pdo->prepare($yee);
        $yee->bindValue(':id', $_POST['id'], PDO::PARAM_INT);
        $yee->bindValue(':nk', $nagelkleur1, PDO::PARAM_STR);
        $yee->bindValue(':tn', $telnr, PDO::PARAM_STR);
        $yee->bindValue(':ml', $mail, PDO::PARAM_STR);
        $yee->bindValue(':ad', $afspraakDate, PDO::PARAM_STR);
        $yee->bindValue(':st', $soort1, PDO::PARAM_STR);
        $yee->bindValue(':ac', $timeSend, PDO::PARAM_STR);

        $yee->execute();

        echo "Het updaten is gelukt!";
        header('Refresh:3; url=read.php');
    } catch (PDOException $e) {
        // error
        echo "Het updaten is mislukt!";
        console_log($e->getMessage());
        header('Refresh:3; url=read.php');
    }

    exit();
}

$sql = "SELECT Id
              ,nagelKleur AS NK
              ,telnr AS TN
              ,mail AS ML
              ,afspraakDate AS AD
              ,soort AS ST
        FROM afspraak
        WHERE Id = :id";

// SQL Statement preparing + Execute
$statement = $pdo->prepare($sql);
$statement->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
$statement->execute();
$result = $statement->fetch(PDO::FETCH_OBJ);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="app/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="../style/style.css">
    <title>Afspraak Update</title>
</head>

<body>
    <div class="card">
        <h1>Update Afspraak</h1>
        <form action="update.php" method="POST">

        <div class="inputVeld">
                <label for="nagelkleur">
                    Kies 4 basiskleuren voor uw nagels:<br>
                    <input type="color" id="nagelkleur" name="nagelkleur[]" value="#f0b7b7">
                    <input type="color" id="nagelkleur" name="nagelkleur[]" value="#917aff">
                    <input type="color" id="nagelkleur" name="nagelkleur[]" value="#ff00ea">
                    <input type="color" id="nagelkleur" name="nagelkleur[]" value="#fbff00">
                </label>
            </div>

            <div class="inputVeld">
                <label for="telnr">
                    Uw telefoonnummer:
                    <input type="tel" name="telnr" id="telnr" pattern="\+31 \d{1,2} \d{3} \d{2} \d{3}" value="<?= $result->TN ?>" placeholder="+31 6 123 45 678" required>
                </label>
            </div>

            <div class="inputVeld">
                <label for="mail">
                    Uw e-mailadres:
                    <input type="email" name="mail" id="mail" placeholder="example@example.com" value="<?= $result->ML ?>" required>
                </label>
            </div>

            <div class="inputVeld">
                <label for="afspraakDate">
                    Afspraak datum:
                    <input type="datetime-local" name="afspraakDate" id="afspraakDate" value="<?= $result->AD ?> required>
                </label>
            </div>

            <div class="inputVeld">
                <label for="soort">
                    Soort behandeling:<br>
                    <input type="checkbox" id="soort" name="soort[]" value="nagelbijt">
                    <label for="nagelbijt">Nagelbijt arrangement €180,-</label><br>

                    <input type="checkbox" id="soort" name="soort[]" value="luxeMani">
                    <label for="luxeMani">Luxe manicure €30,-</label><br>

                    <input type="checkbox" id="soort" name="soort[]" value="nagelReparatie">
                    <label for="nagelReparatie">Nagelreparatie per nagel €5,-</label><br>
                </label>
            </div>
            <input type="hidden" name="timeSend" id="timeSend" value="">
            <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
            <input type="submit" class="button" value="Updaten" onmouseenter="tijdValue()">
        </form>
    </div>

    <script src="../js/script.js"></script>
</body>

</html>