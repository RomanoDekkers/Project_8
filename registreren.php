<?php
    include './sjabloon/indeling.php';
    include './connectie/conn.php';
?>

<script>
        function myFunction() {
    var x = document.getElementById("ZichtbaarWW");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
    }
</script>
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registreren</title>
</head>
<body>
    <div class="container">
        <form class="" method="POST">
            <table>
                <tr>
                    <td>Naam: </td>
                    <td><input class="transparent-input" type="text" placeholder="Voornaam" name="Voornaam" required></td>
                    <td><input class="transparent-input" type="text" placeholder="Achternaam" name="Achternaam" required></td>
                </tr>
                <tr>
                    <td>E-mail: </td>
                    <td><input class="transparent-input" type="text" placeholder="E-mail" name="Mail" required></td>
                </tr>
                <tr>
                    <td>Adres: </td>
                    <td><input class="transparent-input" type="text" placeholder="Adres" name="Adres" required></td>
                </tr>
                <tr>
                    <td>Telefoonnummer: </td>
                    <td><input class="transparent-input" type="text" placeholder="Telefoonnummer" name="Telefoonnummer" required></td>
                </tr>
                <tr>
                    <td>Wachtwoord: </td>
                    <td><input class="transparent-input" id="ZichtbaarWW" type="password" placeholder="Wachtwoord" name="Wachtwoord" required></td>
                    <td><input type="checkbox" onclick="myFunction()">Laat Wachtwoord zien</td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>