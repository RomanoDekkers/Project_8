<?php
    if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
    include './sjabloon/indeling.php';
    include './connectie/conn.php';
    include './configs/functions.php';

    if (isset($_POST)) {
        if (isset($_POST['AccountVerwijderen'])) {
            $sql = 'DELETE FROM `gebruikers` WHERE `ID` = ' .$_SESSION['ID'];

            $qry = $conn -> query($sql);
            if($qry){
                session_destroy();
                echo "<script type='text/javascript'> window.location.href='registreren.php'</script>";
            }
            else
            {
                echo "Iets ging er mis!<BR>";
                echo "Error Beschrijving: ", $conn -> error;
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
<div class="container mt-3">
    <form action="accountbeheer.php" method="POST">
        <div class="row">
            <div class="col">
                <input type="text" name="Voornaam" class="form-control" value="<?php echo $_SESSION['Voornaam']; ?>" disabled>
            </div>
            <div class="col">
                <input type="text" name="Achternaam" class="form-control" value="<?php echo $_SESSION['Achternaam']; ?>" disabled>
            </div>
        </div>  <br />
            <div>
                <input type="text" name="E-mail" class="form-control" value="<?php echo $_SESSION['E-mail']; ?>" disabled>
        </div>  <br />
            <div>
                <input type="text" name="Adres" class="form-control" value="<?php echo $_SESSION['Adres']; ?>" disabled>
        </div>  <br />
            <div>
                <input type="text" name="Telefoonnummer" class="form-control" value="<?php echo $_SESSION['Telefoonnummer']; ?>" disabled>
         </div> <br />
            <div>
                <input type="password" name="Wachtwoord" class="form-control" value="<?php echo md5($_SESSION['Wachtwoord']); ?>" disabled>
        </div>  <br />
            <div>
            <input type="submit" class="btn btn-warning" id="btnSubmit" value="Edit account" name="EditConfirm" onclick="return confirm('Wilt u definitief uw account bewerken? U zal worden uitgelogd.')">
            <input type="submit" class="btn btn-danger" id="btnSubmit" value="Delete account" name="AccountVerwijderen" onclick="return confirm('Wilt u definitief uw account verwijderen?')">
            <input type="submit" class="btn btn-info" id="btnSubmit" value="Logout" name="LogoutConfirm" onclick="return confirm('Wilt u uitloggen?')">
            </div>
        </div>
    </form>
</div>
</body>
</html>