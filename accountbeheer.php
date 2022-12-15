<?php
    //sessie starten
    if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}

    // include de layout en de database connectie
    include './sjabloon/indeling.php';
    include './connectie/conn.php';
    include './configs/functions.php';

    if (empty($_SESSION["ingelogd"])){
        header("Location: login.php");
    }
    // account verwijderen functie. als er op de delete account knop gedrukt wordt dan wordt je account verwijderd en wordt je naar registreren.php gestuurd
    if (isset($_POST)) {
        if (isset($_POST['AccountVerwijderen'])) {
            $sql = 'DELETE FROM `gebruikers` WHERE `ID` = ' .$_SESSION['ID'];

            $qry = $conn -> query($sql);
            if($qry){
                session_destroy();
                // $_SESSION['Message'] = "Account is succesvol verwijderd!";
                // $_SESSION['MessageType'] = "warning";
                echo "<script type='text/javascript'> window.location.href='registreren.php'</script>";
            }
            else
            {
                echo "Iets ging er mis!<BR>";
                echo "Error Beschrijving: ", $conn -> error;
            }
        }

        // uitlog functie. de sessie wordt verwijderd en je wordt naar login.php gestuurd
        if(isset($_POST['UitlogBevestiging'])) {
            session_destroy();
            echo "<script type='text/javascript'> window.location.href='login.php'</script>";
        }

        // account wijzigen functie. omdat de md5 hash niet te unhashen is wordt er door een if empty fuctie gebruik gemaakt. het wachtwoord veld is automatisch leeg om problemem te voorkomen
        if(isset($_POST['BewerkBevestiging'])) {
            if(empty($_POST['BewerkWachtwoord'])) {
                // variabelen gelinkt aan het formulier
                $Voornaam = $_POST['BewerkVoornaam'];
                $Achternaam = $_POST['BewerkAchternaam'];
                $Mail = $_POST['BewerkE-mail'];
                $Adres = $_POST['BewerkAdres'];
                $Telefoon_Nummer = $_POST['BewerkTelefoonnummer'];
                $ID = $_SESSION['ID'];
                // database query
                $sql = "UPDATE `gebruikers` SET `Voornaam`='$Voornaam', `Achternaam`='$Achternaam', `E-mail`='$Mail', `Adres`='$Adres', `Telefoonnummer`='$Telefoon_Nummer' WHERE `ID` = '$ID'";
                $qry = $conn -> query($sql);
                if($qry)
                {
                    session_destroy();
                    echo "<script type='text/javascript'> window.location.href='login.php'</script>";
                }
                else
                {
                    echo "Iets ging er mis!<BR>";
                    echo "Error Description: ", $conn -> error;
                }
            }
            // deze functie wordt uitgevoerd als er wel iets wordt ingevuld bij het wachtwoord veld
            else {
                // variabelen gelinkt aan het formulier
                $Voornaam = $_POST['BewerkVoornaam'];
                $Achternaam = $_POST['BewerkAchternaam'];
                $Mail = $_POST['BewerkE-mail'];
                $Adres = $_POST['BewerkAdres'];
                $Telefoon_Nummer = $_POST['BewerkTelefoonnummer'];
                $wachtwoord = ($_POST['BewerkWachtwoord']);
                $wachtwoord = md5($wachtwoord);
                $ID = $_SESSION['ID'];
                // database query
                $sql = "UPDATE `gebruikers` SET `Voornaam`='$Voornaam', `Achternaam`='$Achternaam', `E-mail`='$Mail', `Adres`='$Adres', `Telefoonnummer`='$Telefoon_Nummer', `Wachtwoord` = '$wachtwoord' WHERE `ID` = '$ID'";
                $qry = $conn -> query($sql);
                if($qry)
                {
                    session_destroy();
                    echo "<script type='text/javascript'> window.location.href='login.php'</script>";
                }
                else
                {
                    echo "Iets ging er mis!<BR>";
                    echo "Error Description: ", $conn -> error;
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Beheer</title>
</head>
<body>
<!--Als er op account bewerken knop wordt gedrukt wordt dit weergegeven-->
<?php if(isset($_POST['BewerkAccount'])) { ?>
    <div class="container mt-3">
        <form action="accountbeheer.php" method="POST">
            <div class="row">
                <div class="col">
                    <label for="VoorbeeldAchternaam1" class="form-label">Voornaam</label>
                    <input type="text" name="BewerkVoornaam" class="form-control" value="<?php echo $_SESSION['Voornaam']; ?>">
                </div>
                <div class="col">
                    <label for="VoorbeeldAchternaam1" class="form-label">Achternaam</label>
                    <input type="text" name="BewerkAchternaam" class="form-control" value="<?php echo $_SESSION['Achternaam']; ?>">
                </div>
            </div>  <br />
                <div>
                    <label for="VoorbeeldAchternaam1" class="form-label">E-mail</label>
                    <input type="text" name="BewerkE-mail" class="form-control" value="<?php echo $_SESSION['E-mail']; ?>">
            </div>  <br />
                <div>
                    <label for="VoorbeeldAchternaam1" class="form-label">Adres</label>
                    <input type="text" name="BewerkAdres" class="form-control" value="<?php echo $_SESSION['Adres']; ?>">
            </div>  <br />
                <div>
                    <label for="VoorbeeldAchternaam1" class="form-label">Telefoonnummer</label>
                    <input type="text" name="BewerkTelefoonnummer" class="form-control" value="<?php echo $_SESSION['Telefoonnummer']; ?>">
            </div> <br />
                <div>
                    <label for="VoorbeeldAchternaam1" class="form-label">Wachtwoord</label>
                    <input type="password" name="BewerkWachtwoord" class="form-control" value="">
            </div>  <br />
                <div>
                <input type="submit" class="btn btn-warning" id="btnSubmit" value="Bevestigen" name="BewerkBevestiging">
                <a id="Annuleren" href="accountbeheer.php"><input type="submit" class="btn btn-danger" id="btnAnnuleren" value="Annuleer" name="Annuleren"></a>
                </div>
            </div>
        </form>
    </div>
<?php } 
else { ?>
<!--Standaard weergave-->
    <div class="container mt-3">
        <form action="accountbeheer.php" method="POST">
            <div class="row">
                <div class="col">
                    <label for="VoorbeeldAchternaam1" class="form-label">Voornaam</label>
                    <input type="text" name="Voornaam" class="form-control" value="<?php echo $_SESSION['Voornaam']; ?>" disabled>
                </div>
                <div class="col">
                    <label for="VoorbeeldAchternaam1" class="form-label">Achternaam</label>
                    <input type="text" name="Achternaam" class="form-control" value="<?php echo $_SESSION['Achternaam']; ?>" disabled>
                </div>
            </div>  <br />
                <div>
                    <label for="VoorbeeldAchternaam1" class="form-label">E-mail</label>
                    <input type="text" name="E-mail" class="form-control" value="<?php echo $_SESSION['E-mail']; ?>" disabled>
            </div>  <br />
                <div>
                    <label for="VoorbeeldAchternaam1" class="form-label">Adres</label>
                    <input type="text" name="Adres" class="form-control" value="<?php echo $_SESSION['Adres']; ?>" disabled>
            </div>  <br />
                <div>
                    <label for="VoorbeeldAchternaam1" class="form-label">Telefoonnummer</label>
                    <input type="text" name="Telefoonnummer" class="form-control" value="<?php echo $_SESSION['Telefoonnummer']; ?>" disabled>
            </div> <br />
                <div>
                    <label for="VoorbeeldAchternaam1" class="form-label">Wachtwoord</label>
                    <input type="password" name="Wachtwoord" class="form-control" value="<?php echo md5($_SESSION['Wachtwoord']); ?>" disabled>
            </div>  <br />
                <div>
                <input type="submit" class="btn btn-warning" id="btnSubmit" value="Bewerk account" name="BewerkAccount">
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal1" data-bs-whatever="@getbootstrap">Account verwijderen</button>
                <input type="submit" class="btn btn-info" id="btnSubmit" value="Uitloggen" name="UitlogBevestiging">
                </div>
            </div>
        </form>
    </div>
<div class="modal fade" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel1">Weet je zeker dat je je account wilt verwijderen?</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Nee</button>
        <form method='post'>
        <input type="submit" class="btn btn-success" id="btnSubmit" value="Ja" name="AccountVerwijderen">
        </form>
      </div>
    </div>
  </div>
</div>
<?php } ?>

</body>
</html>