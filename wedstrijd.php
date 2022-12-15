<?php
    if (session_status() !== PHP_SESSION_ACTIVE) {session_start();}
    include './sjabloon/indeling.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <style>
        .container{
            width: 600px;
            margin: 0 auto;
            border-width:1px;
            border: 1px solid;    
        }

        

        table, th, td {
  border: 1px solid;
}
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
    <div class="container">
            <div class="row">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Wedstrijd gegevens</h2>
                        <a href="Createwedstrijd.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i>Nieuwe stand toevoegen</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM wedstrijden";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>ID</th>";
                                        echo "<th>Speler 1</th>";
                                        echo "<th>Speler 2</th>";
                                        echo "<th>Stand</th>";
                                        echo "<th>Datum</th>";
                                        echo "<th>Winnaar</th>";
                                        echo "<th>Action</th>";
                                        
                                        
                                        

                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['ID'] . "</td>";
                                        echo "<td>" . $row['Speler1'] . "</td>";
                                        echo "<td>" . $row['Speler2'] . "</td>";
                                        echo "<td>" . $row['Stand'] . "</td>";
                                        echo "<td>" . $row['Datum'] . "</td>";
                                        echo "<td>" . $row['Winnaar'] . "</td>";
                                        echo "<td>";
                                            echo '<a href="update.php?ID='. $row['ID'] .'" class="button"> title="Update Record"</a>';
                                            echo '<a href="delete.php?ID='. $row['ID'] .'" class="button"> title="Delete Record"</a>';
                                        echo "</td>";
                                        

                                       
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
                            // Free result set
                            mysqli_free_result($result);
                        } else{
                            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
 
                    // Close connection
                    mysqli_close($link);
                    ?>  
            </div>        
    </div>
</body>
</html>
