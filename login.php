<?php
if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
    include './sjabloon/indeling.php';
    include './connectie/conn.php';
    include './configs/functions.php';
 //checkt of de knop in het form is gedrukt zo ja word de login functie gestard
 if(isset($_GET['aktie']))
 {
     if($_GET['aktie'] == "login"){
         if(isset($_POST['submit']))
         {
            login();
                                     
             }
             else
             {
                //als er verkeerde gegevens worden ingevult komt er een melding
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
            <label for="validationDefault01" class="form-label">Wachtwoord</label>
            <input type="password" class="form-control" id="ZichtbaarWW" name="Wachtwoord"  required>
            </div>
            <div class="col-md-4 form-check">
                <input type="checkbox" class="form-check-input" id="exampleWachtwoordZien1" onclick="myFunction()">
                <label class="form-check-label">Bekijk wachtwoord</label>
            </div>
            <div class="col-5">
            <input class="btn btn-primary" type="submit" name="submit" value="login">
            </div>
            <p>Geen account? <a href="registreren.php" class="text-decoration-none">registreer hier</a></p>
    </form>
</div>
<?php
// if(!empty($_SESSION['Message'])){
//    echo "
//       <div class='row justify-content-center text-center'>
//            <div class='alert alert-".$_SESSION['MessageType']." col-5' role='alert'>".
//                $_SESSION['Message']
//            ."</div>
//        </div>
//        ";
//    unset($_SESSION['Message']);
//    unset($_SESSION['MessageType']);
//}
?>
</body>
</html>
<script>
    // functie die ervoor zorgt dat de klant zijn/haar ingevulde wachtwoord kan laten weergeven als puntjes of de ingevulde tekst 
    //shout out naar Romano voor deze epic code
    function myFunction() {
    var x = document.getElementById("ZichtbaarWW");
        if (x.type == "password") {
            x.type = "text";
        } else {
                x.type = "password";
            }
    }
</script>