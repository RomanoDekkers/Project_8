<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$ID = $Speler1 = $Speler2 = $Stand = $Datum = $Winnaar ="";
$ID_err = $Speler1_err = $Speler2_err = $Stand_err = $Winnaar_err ="";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate ID
    $input_ID = trim($_POST["ID"]);
    if(empty($input_ID)){
        $ID_err = "voer hier het wedstrijdnummer in";
    } elseif(!filter_var($input_ID, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $ID_err = "vul een geldig wedstrijdnummer in";
    } else{
        $ID = $input_ID;
    }
    
    // Validate Speler1
    $input_Speler1 = trim($_POST["Speler1"]);
    if(empty($input_Speler1)){
        $Speler1_err = "Vul speler 1 in.";     
    } else{
        $Speler1 = $input_Speler1;
    }
    
    // Validate Speler2
    $input_Speler2 = trim($_POST["Speler2"]);
    if(empty($input_Speler2)){
        $Speler2_err = "vul speler 2 in";     
    } else{
        $Speler2 = $input_Speler2;
    }

    $Stand = trim($_POST["Stand"]);
    if(empty($input_Stand)){
        $Stand_err = "vul hier de stand in.";     
    }  else{
        $Stand = $input_Stand;
    }

    $Datum = trim($_POST["Datum"]);
    if(empty($input_Datum)){
        $Datum_err = "vul hier de stand in.";     
    }  else{
        $Datum = $input_Datum;
    }

    $Winnaar = trim($_POST["Winnaar"]);
    if(empty($input_Winnaar)){
        $Winnaar_err = "vul hier de stand in.";     
    }  else{
        $Winnaar = $input_Winnaar;
    }
    
    // Check input errors before inserting in database
    if(empty($ID_err) && empty($Speler1_err) && empty($Speler2_err) && empty($Stand_err) && empty($Datum_err) && empty($Winnaar_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO wedstrijden (ID, Speler1, Speler2, Stand, Datum, Winnaar) VALUES (?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sss", $param_ID, $param_Speler1, $param_Speler2, $param_Stand, $param_Datum, $param_Winnaar);
            
            // Set parameters
            $param_ID = $ID;
            $param_Speler1 = $Speler1;
            $param_Speler2 = $Speler2;
            $param_Stand = $Stand;
            $param_Datum = $Datum;
            $param_Winnaar = $Winnaar;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: Wedstrijd.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Invulformulier; wedstrijd aanmaken</h2>
                    <p>voeg een wedstrijd toe</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>wedstrijdnummer</label>
                            <input type="text" name="ID" class="form-control <?php echo (!empty($ID_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $ID; ?>">
                            <span class="invalid-feedback"><?php echo $ID_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Speler1</label>
                            <input type="text" name="Speler1" class="form-control <?php echo (!empty($Speler1_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Speler1; ?>">
                            <span class="invalid-feedback"><?php echo $Speler1_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Speler2</label>
                            <input type="text" name="Speler2" class="form-control <?php echo (!empty($Speler2_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Speler2; ?>">
                            <span class="invalid-feedback"><?php echo $Speler2_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Stand</label>
                            <input type="text" name="Stand" class="form-control <?php echo (!empty($Stand_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Stand; ?>">
                            <span class="invalid-feedback"><?php echo $Stand_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Datum</label>
                            <input type="text" name="Datum" class="form-control <?php echo (!empty($Datum_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $Datum; ?>">
                            <span class="invalid-feedback"><?php echo $Datum_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Winnaar</label>
                            <input type="text" name="Winnaar" class="form-control <?php echo (!empty($Winnaar)) ? 'is-invalid' : ''; ?>" value="<?php echo $Winnaar; ?>">
                            <span class="invalid-feedback"><?php echo $Winnaar_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>