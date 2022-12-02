<?php
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
  include './sjabloon/indeling.php';
        include './connectie/conn.php';
 //checkt of de knop in het form is gedrukt
 if(isset($_GET['aktie']))
 {
     if($_GET['aktie'] == "login"){
         if(isset($_POST['submit']))
         {
             $naam = $_POST['naam'];
             $Wachtwoord = $_POST['Wachtwoord'];
             $Wachtwoord = md5($Wachtwoord);    
             //query checkt of de gegevens ingevult overeen komen met die van de database
             $query = "SELECT * FROM gebruikers where Voornaam='$naam' AND  Wachtwoord='$Wachtwoord'";
             $result = $conn->query($query);
             //checkt of er meer dan 1regels gevonden zijn
             if ($result->num_rows > 0) 
             {
                 //while loop loopt door de resultaten heen en maakt rows            
                 while($row = $result->fetch_assoc()) {
                         $ID = $row["ID"];
                         $naam = $row["Name"];
                         $Achternaam = $row["Lastname"];
                         $Email = $row["Email"];
                         $Wachtwoord = $row["Wachtwoord"];
                         $Phone = $row["Phone"];
                         //vervolgens word een sessie gemaakt met de naam van de gebruiker
                         $_SESSION["ID"]= $ID;       
                         $_SESSION["Name"]= $naam;
                         $_SESSION["Lastname"]= $Achternaam;
                         $_SESSION["Email"]= $Email;
                         $_SESSION["Wachtwoord"]= $Wachtwoord;
                         $_SESSION["Phone"]= $Phone;

                         $_SESSION["ingelogd"]= "ingelogd";
                         echo "<script type='text/javascript'> window.location.href='index.php'</script>";
                         echo" ingelogd";
                 }
                                     
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
 } ?>
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