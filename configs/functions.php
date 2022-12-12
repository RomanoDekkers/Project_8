<?php 
include './connectie/conn.php';
function login()
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
                $Voornaam = $row["Voornaam"];
                $Achternaam = $row["Achternaam"];
                $Email = $row["E-mail"];
                $Adres = $row["Adres"];
                $Wachtwoord = $row["Wachtwoord"];
                $Telefoonnummer = $row["Telefoonnummer"];
                $Rechten = $row["Rechten"];
                //vervolgens word een sessie gemaakt met de naam van de gebruiker
                $_SESSION["ID"]= $ID;      
                $_SESSION["Rechten"]= $Rechten;     
                $_SESSION["Voornaam"]= $Voornaam;
                $_SESSION["Achternaam"]= $Achternaam;
                $_SESSION["E-mail"]= $Email;
                $_SESSION["Adres"]= $Adres;
                $_SESSION["Wachtwoord"]= $Wachtwoord;
                $_SESSION["Telefoonnummer"]= $Telefoonnummer;

                $_SESSION["ingelogd"]= "ingelogd";
                echo "<script type='text/javascript'> window.location.href='index.php'</script>";
                echo" ingelogd";
        }
}
}
function admintable(){
        $admin = "";
        // alles word geselecteerd van gebruikers en vervolgens in een tabel gezet
        $query = "SELECT * FROM gebruikers ";
        $result = $conn->query($query);
        echo"<table class='table'>
        <thead class='thead-light'>
          <tr>";
        echo"  <th scope='col'>ID</th>";
        echo" <th scope='col'>Voornaam</th>";
        echo" <th scope='col'>Achternaam</th>";
        echo" <th scope='col'>E-mail</th>";
        echo" <th scope='col'>Adres</th>";
        echo" <th scope='col'>Wachtwoord</th>";
        echo" <th scope='col'>Telefoonnummer</th>";
        echo" <th scope='col'>Rechten</th>";
        echo" <th scope='col'>Wijzig</th>";
        echo" <th scope='col'>Verwijderen</th></tr>";
        echo" </thead>
        <tbody>";
        if ($result->num_rows > 0) 
        {
            //while loop loopt door de resultaten heen en plaatst ze in de tabel        
            while($row = $result->fetch_assoc()) {
                    $ID = $row["ID"];
                    $Voornaam = $row["Voornaam"];
                    $Achternaam = $row["Achternaam"];
                    $Email = $row["E-mail"];
                    $Adres = $row["Adres"];
                    $Wachtwoord = $row["Wachtwoord"];
                    $Telefoonnummer = $row["Telefoonnummer"];
                    $Rechten = $row["Rechten"];
        echo"  <tr>
        <th scope='row'>". $ID . "</th>";
        echo" <td>". $Voornaam . "</td>";
        echo" <td>". $Achternaam . "</td>";
        echo" <td>". $Email . "</td>";
        echo" <td>". $Adres . "</td>";
        echo" <td>". $Wachtwoord . "</td>";
        echo" <td>". $Telefoonnummer . "</td><form action='" .$_SERVER['PHP_SELF']." ?aktie=update' method=POST name='formulier'>";
       //hier zie je een selecter in een switch die laat zien welke waarde er al is volgens de database en dan andere keuzes beschikbaar stelt
        echo" <td><select class='form-select' name='rol'>";
        switch ($Rechten){
            case $admin:
            echo "<option value='". $admin . "' selected>". $admin . "</option>";
            echo "<option value='1'>1</option>";
            echo "<option value='2'>2</option>";
            echo "<option value='3'>3</option>";
            break;
            case 1:
            echo "<option value='". $admin . "'>". $admin . "</option>";
            echo "<option value='1' selected>1</option>";
            echo "<option value='2'>2</option>";
            echo "<option value='3'>3</option>";
            break;
            case 2:
            echo "<option value='". $admin . "'>". $admin . "</option>";
            echo "<option value='1'>1</option>";
            echo "<option value='2' selected>2</option>";
            echo "<option value='3'>3</option>";
            break;
            case 3:
            echo "<option value='". $admin . "'>". $admin . "</option>";
            echo "<option value='1'>1</option>";
            echo "<option value='2'>2</option>";
            echo "<option value='3' selected>3</option>";
            break;
            }
        echo"</select></td>";
        //hier zie je een bewerk en delete knop die gebruik maakt van een hidden input om de waarde van de zojuist geselecteerde rij op te slaan
        echo" <td><input type='hidden' value='". $ID . "' name='ID'> <input type=submit class='btn btn-warning' name='update' value='Wijzig'></td></form>";
        echo" <td>";
        echo '  <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal3" data-bs-whatever="@getbootstrap">Verwijderen</button>';
        echo ' <div class="modal fade" id="exampleModal3" tabindex="-1" aria-labelledby="exampleModal3Label" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModal3Label">Weet je zeker dat je dit wilt verwijderen?</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Nee</button>
              <form action="' .$_SERVER["PHP_SELF"].' ?aktie=delete" method=POST name="formulier">';
        echo "<input type='hidden' value='". $ID . "' name='ID'>";
        echo "<input type=submit class='btn btn-success' name='delete'value='Verwijder' >
            </div>
          </div>
        </div>
      </div>";
        echo "</td></form></tr>";
                }
        }
        echo" </tbody>";
        echo" </table>";
        }
?>