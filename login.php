<?php
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
    include './sjabloon/indeling.php';
    include './connectie/conn.php';
    include './configs/functions.php';
 //checkt of de knop in het form is gedrukt
 if(isset($_GET['aktie']))
 {
     if($_GET['aktie'] == "login"){
         if(isset($_POST['submit']))
         {
            login();
                                     
             }
             else
             {
                 echo "<div class='alert alert-danger' role='alert'>
                 Gegevens zijn incorrect!
               </div>
               ";
             }
         }
     }
  ?>
<html lang="en">
<body>
<div class="table_div d-flex justify-content-center"> 
    <form method=POST action="login.php?aktie=login" class="row g-3">
        <br/>
            <div class="col-md-4">
            <label for="validationDefault01" class="form-label">Voornaam</label>
            <input type="text" class="form-control" id="validationDefault01"  name="naam"  required>
            </div>

            <div class="col-md-4">
            <label for="validationDefault01" class="form-label">Voornaam</label>
            <input type="password" class="form-control" id="validationDefault01"  name="Wachtwoord"  required>
            </div>
            <div class="col-5">
            <input class="btn btn-success" type="submit" name="submit" value="login">
            </div>
            <p>Geen account? <a href="register.php" class="text-decoration-none">registreer hier</a></p>
    </form>
</div>
</body>
</html>