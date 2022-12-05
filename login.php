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
    <form method=POST action="login.php?aktie=login">
        <br/>
            <input type=text id="naam" placeholder="voornaam" name="naam" class="knop">

            <br/>
            <input type=password placeholder="wachtwoord" name="Wachtwoord" class="knop">
            </table>
            <input type="submit" name="submit" class="knop" value="login">
            <p>Geen account? <a href="register.php" class="text-decoration-none">registreer hier</a></p>
        <br/>
    </form>
</div>
</body>
</html>