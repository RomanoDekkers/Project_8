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
    <form name="Registreren" style="margin: auto; width: 400px;" method="POST" action="registreren.php" autocomplete="off">
        <div class="mb-3">
            <label for="VoorbeeldVoornaam1" class="form-label">Voornaam</label>
            <input type="Text" name="Voornaam" class="form-control" aria-describedby="VoornaamHelp" required>
        </div>
        <div class="mb-3">
            <label for="VoorbeeldAchternaam1" class="form-label">Achternaam</label>
            <input type="Text" name="Achternaam" class="form-control" aria-describedby="AchternaamHelp" required>
        </div>
        <div class="mb-3">
            <label for="VoorbeeldEmail1" class="form-label">E-mail</label>
            <input type="Mail" name="Mail" class="form-control" aria-describedby="EmailHelp" required>
        </div>
        <div class="mb-3">
            <label for="VoorbeeldAdres1" class="form-label">Adres</label>
            <input type="text" name="Adres" class="form-control" aria-describedby="AdresHelp" required>
        </div>
        <div class="mb-3">
            <label for="VoorbeeldTelefoon1" class="form-label">Telefoonnummer</label>
            <input type="phone" name="Telefoonnummer" class="form-control" aria-describedby="TelefoonHelp" required>
        </div>
        <div class="mb-3">
            <label for="VoorbeeldWachtwoord1" class="form-label">Wachtwoord</label>
            <input type="password" class="form-control" id="ZichtbaarWW" name="Wachtwoord" required>
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="exampleWachtwoordZien1" onclick="myFunction()">
            <label class="form-check-label">Bekijk wachtwoord</label>
        </div>
            <button type="submit" name="Registreer" class="btn btn-primary">Registreer</button>
    </form>
</div>
</body>
</html>