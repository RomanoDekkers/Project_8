<?php 
function login()
{
    include './connectie/conn.php';
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
?>