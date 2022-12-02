<?php
    include './sjabloon/indeling.php';
    include './connectie/conn.php';

    if(isset($_POST['Registreer'])){
        if($_SERVER["REQUEST_METHOD"] == "POST"){      
                // Variables linked with form
                $Voornaam = $_POST['Voornaam'];
                $Achternaam = $_POST['Achternaam'];
                $Mail = $_POST['Mail'];
                $Adres = $_POST['Adres'];
                $Telefoon_Nummer = $_POST['Telefoonnummer'];
                $Wachtwoord = ($_POST['Wachtwoord']);
                $Wachtwoord = md5($Wachtwoord);

                $sql = "INSERT INTO `gebruikers`(`Voornaam`, `Achternaam`, `E-mail`, `Adres`, `Telefoonnummer`, `Wachtwoord`, `Rechten`)
                VALUES ('$Voornaam', '$Achternaam','$Mail', '$Adres', '$Telefoon_Nummer', '$Wachtwoord', '1')";
             
             $qry = $conn -> query($sql);
             if($qry)
             {
                echo "<script type='text/javascript'> window.location.href='index.php'</script>";
             }
             else
             {
                echo "Er ging iets fout!<BR>";
                echo "Error Description: ", $conn -> error;
             }
          }
       }
       $conn -> close();

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
        <form class="" method="POST" action="registreren.php" autocomplete="off">
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
                <tr>
                    <td><input type="submit" class="btn knop fw-bold" id="btnSubmit" value="Registreer" name="Registreer"></td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>