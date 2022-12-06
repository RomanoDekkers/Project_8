<?php
    if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
    include './sjabloon/indeling.php';
    include './connectie/conn.php';
    include './configs/functions.php';
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
    <form action="accountbeheer.php">
        <div class="row">
            <div class="col">
                <input type="text" name="Voornaam" class="form-control" value="<?php echo $_SESSION['Voornaam']; ?>">
            </div>
            <div class="col">
                <input type="text" name="Achternaam" class="form-control" value="<?php echo $_SESSION['Achternaam']; ?>">
            </div>
        </div>
        <div class="row">
            
        </div>
    </form>
</div>
</body>
</html>