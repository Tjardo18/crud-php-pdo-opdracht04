<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="shortcut icon" href="app/img/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="style/style.css">
    <title>Bling Bling Nail Studio Chantal</title>
</head>
</head>

<body>

    <div class="card">
        <h1>Bling Bling Nail Studio Chantal</h1>
        <form action="app/create.php" method="POST">

            <div class="inputVeld">
                <label for="nagelkleur">
                    Kies 4 basiskleuren voor uw nagels:<br>
                    <input type="color" id="nagelkleur" name="nagelkleur" value="#f0b7b7">
                    <input type="color" id="nagelkleur" name="nagelkleur" value="#917aff">
                    <input type="color" id="nagelkleur" name="nagelkleur" value="#ff00ea">
                    <input type="color" id="nagelkleur" name="nagelkleur" value="#fbff00">
                </label>
            </div>

            <div class="inputVeld">
                <label for="telnr">
                    Uw telefoonnummer:
                    <input type="tel" name="telnr" id="telnr" pattern="\+31 \d{1,2} \d{3} \d{2} \d{3}" placeholder="+31 6 123 45 678" required>
                </label>
            </div>

            <div class="inputVeld">
                <label for="mail">
                    Uw e-mailadres:
                    <input type="email" name="mail" id="mail" placeholder="example@example.com" required>
                </label>
            </div>

            <div class="inputVeld">
                <label for="afspraak">
                    Afspraak datum:
                    <input type="datetime-local" name="afspraak" id="afspraak" required>
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

            <input class="button" type="submit" value="Sla op" onmouseenter="tijdValue()">
            <input class="button" type="reset" value="Reset">
        </form>
    </div>

    <script src="script.js"></script>
</body>

</html>